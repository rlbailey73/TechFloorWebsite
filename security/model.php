<?php
    require_once('../model/model.php');

    function connectToMySQL() {

        $db = getDBConnection( );	// Should be provided in other model.php file for your project
        return $db;
    }

    function userIsAuthorized($function) {
        $authorized = false;
        if (guestAccess($function)) {
            $authorized = true;                   // all Users have access even if not logged in. 
        } else if(!isset($_SESSION["UserID"])) {  // If no current user and don't have access as a guest
                $authorized = false;
        } else {                  
            $userID = $_SESSION["UserID"];       // Get current userid from session variable to check access.

            try {
                $db = connectToMySQL();
                $query = "select functions.Name
                    from users inner join userroles on users.UserID = userroles.UserID
                    inner join roles on userroles.RoleID = roles.RoleID
                    inner join rolefunctions on roles.RoleID = rolefunctions.RoleID
                    inner join functions on rolefunctions.FunctionID = functions.FunctionID
                    where users.UserID = :userID and functions.Name = :function";
                $statement = $db->prepare($query);
                $statement->bindValue(':userID', $userID);
                $statement->bindValue(':function', $function);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                if (count($results) > 0) {  // This means we explicitly gave current user access to that function.
                    $authorized = true;
                }
            } catch (PDOException $e) {
                displayError($e->getMessage());
            }
        }

        return $authorized;
    }

    function guestAccess($function) {
        $authorized = false;
        try {
            $db = connectToMySQL();
            $query = "select functions.Name
                from roles inner join rolefunctions on roles.RoleID = rolefunctions.RoleID
                inner join functions on rolefunctions.FunctionID = functions.FunctionID
                where roles.Name = 'guest' and functions.Name = :function";
            $statement = $db->prepare($query);
            $statement->bindValue(':function', $function);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            
            if (count($results) > 0) {  // This means we explicitly gave guest access to that function.
                $authorized = true;
            } else {
                // Here we could check to see if the function was not listed at all and default to all access
               $query = "select functions.Name
                    from functions 
                    where functions.Name = :function";
                $statement = $db->prepare($query);
                $statement->bindValue(':function', $function);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();

                if (count($results) == 0) {  // This means we don't know anything about that function.
                    $authorized = false;		 // Set this to true if you want unknown functions to default to accessible
                }
            }
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }

        return $authorized;
    }

    function validateUser($username,$password) {
        try {
            $db = connectToMySQL();
            $query = "SELECT UserID, UserName FROM users where UserName = :Username AND Password = :Password";
            $statement = $db->prepare($query);
            $statement->bindValue(':Username', $username);
            $statement->bindValue(':Password', sha1($password));
            $statement->execute();
            $result = $statement->fetch();  // Should be zero or one row
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            displayError($query . "\n" . $e->getMessage());
        }
    }

    function login($username,$password) {
        $result = validateUser($username,$password);
        if($result['UserName'] === $username) // Make sure a User row was returned
        {
            $_SESSION["UserName"] = $result['UserName'];
            $_SESSION["UserID"] = $result['UserID'];
            return true;
        }
        return false;
    }

    function loggedIn() {
        return isset($_SESSION["UserID"]);
    }

    function logOut() {
		$_SESSION = array();
        session_destroy();
    }
    function displayError($error) {	// $error here is the actual text of the error message.
		$errorMessage = $error;
		include '../view/errorPage.php';
		die;

    }

    function getUserRoles($ID) {
        try {
            $db = connectToMySQL();
            $query = "SELECT roles.RoleID, roles.Name
		   FROM roles, userroles
		   WHERE userroles.UserID = :ID AND roles.RoleID = userroles.RoleID
                   ORDER BY roles.Name";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getNotUserRoles($ID) {
        try {
            $db = connectToMySQL();
            $query = "SELECT RoleID, Name
		   FROM roles WHERE RoleID NOT IN
			(SELECT roles.RoleID
			 FROM roles, userroles
			 WHERE userroles.UserID = :ID AND roles.RoleID = userroles.RoleID)
                   ORDER BY roles.Name";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getAllUsers() {
        try {
            $db = connectToMySQL();
            $query = "SELECT FirstName, LastName, UserName, Password, Email, UserID FROM users order by LastName";
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getUser($UserID){
        try {
            $db = getDBConnection();
            $query = 'select * from users where UserID = :UserID';
            $statement = $db->prepare($query);
            $statement->bindValue(':UserID', $UserID);
            $statement->execute();
            $result = $statement->fetch();  // Should be zero or one row
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function addUser($firstName, $lastName, $userName, $password, $email){
        try {
            $db = connectToMySQL();
            $query = 'INSERT INTO users (FirstName, LastName, UserName, Password, Email)
                      VALUES (:FirstName, :LastName, :UserName, :Password, :Email)';
            $statement = $db->prepare($query);

            $statement->bindValue(':FirstName', $firstName);
            $statement->bindValue(':LastName', $lastName);
            $statement->bindValue(':UserName', $userName);
            $statement->bindValue(':Password', sha1($password));
            $statement->bindValue(':Email', $email);

			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $db->lastInsertId(); // Get generated ID
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function updateUser($userID, $firstName, $lastName, $userName, $password, $email, $hasAttributes){
        try {
            $db = connectToMySQL();
            $query = 'UPDATE users SET FirstName = :FirstName,
                                       LastName = :LastName,
                                       UserName = :UserName,
                                       Email = :Email
                                   WHERE UserID = :UserID';
            $statement = $db->prepare($query);
            $statement->bindValue(':UserID', $userID);
            $statement->bindValue(':FirstName', $firstName);
            $statement->bindValue(':LastName', $lastName);
            $statement->bindValue(':UserName', $userName);
            $statement->bindValue(':Email', $email);
            $row_count = $statement->execute();

            if (!empty($password)) {    // Only change password if one is provided
                $query = 'UPDATE users SET Password = :Password
                                       WHERE UserID = :UserID';
                $statement = $db->prepare($query);
                $statement->bindValue(':Password',  sha1($password));
                $statement->bindValue(':UserID', $userID);
                $success = $statement->execute();
            }

            // Now we must remove all old Roles and add in the new ones.
            $query = "DELETE FROM userroles WHERE UserID = :UserID";
            $statement = $db->prepare($query);
            $statement->bindValue(':UserID', $userID);
            $row_count = $statement->execute();

            for($i = 0; $i < count($hasAttributes); ++$i) {
                $attribute = $hasAttributes[$i];
                $query = "INSERT INTO userroles (UserID, RoleID) VALUES (:UserID, :RoleID)";
                $statement = $db->prepare($query);
                $statement->bindValue(':UserID', $userID);
                $statement->bindValue(':RoleID', $attribute);
                $success = $statement->execute();
            }

            $statement->closeCursor();
			if ($success) {
				return $statement->rowCount();         // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function deleteUser($UserID) {
        try{
            $db = getDBConnection();
            $query = "DELETE FROM users WHERE UserID = :UserID";
            $statement = $db->prepare($query);
            $statement->bindValue(':UserID', $UserID);
			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $statement->rowCount(); // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error 
			}		
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }

    function getAllFunctions() {
        try {
            $db = connectToMySQL();
            $query = "SELECT FunctionID, Name, Description FROM functions ORDER BY Name";
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getFunction($FunctionID){
        try {
            $db = getDBConnection();
            $query = 'select * from functions where FunctionID = :FunctionID';
            $statement = $db->prepare($query);
            $statement->bindValue(':FunctionID', $FunctionID);
            $statement->execute();
            $result = $statement->fetch();  // Should be zero or one row
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function addFunction($name, $desc){
        try {
            $db = connectToMySQL();
            $query = 'INSERT INTO functions (Name, Description)
                      VALUES (:Name, :Description)';
            $statement = $db->prepare($query);
            $statement->bindValue(':Name', $name);
            $statement->bindValue(':Description', $desc);

			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $db->lastInsertId(); // Get generated ID
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function updateFunction($functionID, $name, $desc){
        try {
            $db = connectToMySQL();
            $query = 'UPDATE functions SET Name = :Name,
                                       Description = :Description
                                   WHERE FunctionID = :FunctionID';
            $statement = $db->prepare($query);
            $statement->bindValue(':FunctionID', $functionID);
            $statement->bindValue(':Description', $desc);
            $statement->bindValue(':Name', $name);
            $success = $statement->execute();
            $statement->closeCursor();
			if ($success) {
				return $statement->rowCount();         // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function deleteFunction($FunctionID) {
        try{
            $db = getDBConnection();
            $query = "DELETE FROM functions WHERE FunctionID = :FunctionID";
            $statement = $db->prepare($query);
            $statement->bindValue(':FunctionID', $FunctionID);
			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $statement->rowCount(); // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error 
			}		
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }

    function getAllRoles() {
        try {
            $db = connectToMySQL();
            $query = "SELECT RoleID, Name, Description FROM roles ORDER BY Name";
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getRole($RoleID){
        try {
            $db = getDBConnection();
            $query = 'select * from roles where RoleID = :RoleID';
            $statement = $db->prepare($query);
            $statement->bindValue(':RoleID', $RoleID);
            $statement->execute();
            $result = $statement->fetch();  // Should be zero or one row
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function addRole($name, $desc){
        try {
            $db = connectToMySQL();
            $query = 'INSERT INTO roles (Name, Description)
                      VALUES (:Name, :Description)';
            $statement = $db->prepare($query);
            $statement->bindValue(':Name', $name);
            $statement->bindValue(':Description', $desc);
			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $db->lastInsertId(); // Get generated ID
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function updateRole($roleID, $name, $desc, $hasAttributes){
        try {
            $db = connectToMySQL();
            $query = 'UPDATE roles SET Name = :Name,
                                       Description = :Description
                                   WHERE RoleID = :RoleID';
            $statement = $db->prepare($query);
            $statement->bindValue(':RoleID', $roleID);
            $statement->bindValue(':Description', $desc);
            $statement->bindValue(':Name', $name);
            $row_count = $statement->execute();

            // Now we must remove all old role_Functions and add in the new ones.
            $query = "DELETE FROM rolefunctions WHERE RoleID = :RoleID";
            $statement = $db->prepare($query);
            $statement->bindValue(':RoleID', $roleID);
            $row_count = $statement->execute();

            for($i = 0; $i < count($hasAttributes); ++$i) {
                $attribute = $hasAttributes[$i];
                $query = "INSERT INTO rolefunctions (RoleID, FunctionID) VALUES (:RoleID, :FunctionID)";
                $statement = $db->prepare($query);
                $statement->bindValue(':RoleID', $roleID);
                $statement->bindValue(':FunctionID', $attribute);
                $success = $statement->execute();
            }

            $statement->closeCursor();
			if ($success) {
				return $statement->rowCount();         // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error to debug
			}		
        } catch (PDOException $e) {
            displayError($e->getMessage());
        }
    }
    function deleteRole($RoleID) {
        try{
            $db = getDBConnection();
            $query = "DELETE FROM roles WHERE RoleID = :RoleID";
            $statement = $db->prepare($query);
            $statement->bindValue(':RoleID', $RoleID);
			$success = $statement->execute();
			$statement->closeCursor();

			if ($success) {
				return $statement->rowCount(); // Number of rows affected
			} else {
				logSQLError($statement->errorInfo());  // Log error 
			}		
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getRoleFunctions($ID) {
        try {
            $db = connectToMySQL();
            $query = "SELECT functions.FunctionID, functions.Name
		 FROM functions, rolefunctions
		 WHERE rolefunctions.RoleID = :ID AND functions.FunctionID = rolefunctions.FunctionID
                 ORDER BY functions.Name";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }
    function getNotRoleFunctions($ID) {
        try {
            $db = connectToMySQL();
            $query = "SELECT FunctionID, Name
		   FROM functions WHERE FunctionID NOT IN
		   (SELECT functions.FunctionID
		   FROM functions, rolefunctions
		   WHERE rolefunctions.RoleID = :ID AND functions.FunctionID = rolefunctions.FunctionID)
                   ORDER BY functions.Name";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        } catch (PDOException $e) {
            displayDBError($e->getMessage());
        }
    }

?>
