CREATE TABLE functions ( FunctionID INT NOT NULL AUTO_INCREMENT,
                         Name VARCHAR(64) NOT NULL,
                         Description TEXT,	 
                         PRIMARY KEY (FunctionID) );


CREATE TABLE roles ( RoleID INT NOT NULL AUTO_INCREMENT,
                     Name VARCHAR(32) NOT NULL,
                     Description TEXT,
                     PRIMARY KEY (RoleID) );


CREATE TABLE users ( UserID INT NOT NULL AUTO_INCREMENT,
                     FirstName VARCHAR(32) NOT NULL,
                     LastName VARCHAR(32) NOT NULL,
                     UserName VARCHAR(32) NOT NULL,
                     Password VARCHAR(40) NOT NULL,
                     Email VARCHAR(32) NOT NULL,
                     PRIMARY KEY (UserID) );

CREATE TABLE rolefunctions ( RoleID INT NOT NULL,
                             FunctionID INT NOT NULL,
                             FOREIGN KEY (RoleID) REFERENCES roles(RoleID) ON DELETE CASCADE,
                             FOREIGN KEY (FunctionID) REFERENCES functions(FunctionID) ON DELETE CASCADE );

CREATE TABLE userroles ( UserID INT NOT NULL,
                         RoleID INT NOT NULL,
                         FOREIGN KEY (UserID) REFERENCES users(UserID) ON DELETE CASCADE,
                         FOREIGN KEY (RoleID) REFERENCES roles(RoleID) ON DELETE CASCADE);
						 
INSERT INTO functions (Name,Description) VALUES ('SecurityManageUsers','Allows for reading users and interface to add, change, and delete.');
INSERT INTO functions (Name,Description) VALUES ('SecurityUserAdd','Allows for adding of users by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityUserEdit','Allows for editing of users by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityUserDelete','Allows for deleting of users by enabling checkbox on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityProcessUserAddEdit','Required to process an add, change, or delete of users.');
INSERT INTO functions (Name,Description) VALUES ('SecurityManageFunctions','Allows for reading functions and interface to add, change, and delete.');
INSERT INTO functions (Name,Description) VALUES ('SecurityFunctionAdd','Allows for adding of functions by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityFunctionEdit','Allows for editing of functions by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityFunctionDelete','Allows for deleting of functions by enabling checkbox on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityProcessFunctionAddEdit','Required to process an add, change, or delete of functions.');
INSERT INTO functions (Name,Description) VALUES ('SecurityManageRoles','Allows for reading roles and interface to add, change, and delete.');
INSERT INTO functions (Name,Description) VALUES ('SecurityRoleAdd','Allows for adding of roles by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityRoleEdit','Allows for editing of roles by enabling link on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityRoleDelete','Allows for deleting of roles by enabling checkbox on manage form.');
INSERT INTO functions (Name,Description) VALUES ('SecurityProcessRoleAddEdit','Required to process an add, change, or delete of roles.');
INSERT INTO functions (Name,Description) VALUES ('SecurityLogin', 'Provide Username and Password');
INSERT INTO functions (Name,Description) VALUES ('SecurityLogOut', 'Exit the application.');
INSERT INTO functions (Name,Description) VALUES ('SecurityProcessLogin', 'Try to authorize a user login.');
INSERT INTO functions (Name,Description) VALUES ('SecurityHome', 'Default security page with login button.');

INSERT INTO roles (Name,Description) VALUES ('admin','Full privileges.');
INSERT INTO roles (Name,Description) VALUES ('updater','Update/Read privileges.');
INSERT INTO roles (Name,Description) VALUES ('reader','Read-only privileges.');
INSERT INTO roles (Name,Description) VALUES ('guest','Features available to all visitors without logging in.');

INSERT INTO users (FirstName,LastName,UserName,Password,Email) VALUES ('Jon','ODonnell','admin',SHA1('admin'),'jodonnell@clarion.edu');
INSERT INTO users (FirstName,LastName,UserName,Password,Email) VALUES ('Bill','Updater','bill',SHA1('bill'),'bill@localhost');
INSERT INTO users (FirstName,LastName,UserName,Password,Email) VALUES ('Joe','Reader','joe',SHA1('joe'),'joe@localhost');
INSERT INTO users (FirstName,LastName,UserName,Password,Email) VALUES ('guest','guest','guest',SHA1('guest'),'guest@localhost');
			
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,1);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,2);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,3);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,4);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,5);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,6);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,7);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,8);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,9);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,10);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,11);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,12);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,13);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,14);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (1,15);

INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,1);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,6);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,7);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,8);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,9);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,10);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,11);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,12);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,13);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,14);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (2,15);

INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (3,1);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (3,6);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (3,11);

INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (4,11);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (4,16);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (4,17);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (4,18);
INSERT INTO rolefunctions (RoleID,FunctionID) VALUES (4,19);

INSERT INTO userroles (UserID,RoleID) VALUES (1,1);
INSERT INTO userroles (UserID,RoleID) VALUES (2,2);
INSERT INTO userroles (UserID,RoleID) VALUES (3,3);
INSERT INTO userroles (UserID,RoleID) VALUES (4,4);