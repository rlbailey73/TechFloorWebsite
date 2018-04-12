<?php
/*This file will essentially be a functions library
There will be no html in here it will all be just PHP
*/

    //function names are global

//this functions job is to do the saving of the entered member in the
//newsletter sign up page for now
function beckysaveMemberInfo($firstName, $lastName, $email){
    //this creates the file initially if it doesn't exits allowing for appending at the end and reading
    $file = fopen('../datafiles/email_list.csv', 'ab');
    //adds the details to the file
    fputcsv($file, array($firstName, $lastName, $email));
    //closes the file
    fclose($file);
}

//job to return back the array of members currently registered
//it will result from reading in all entries in the csv file
function beckygetMembers(){
    //this creates the file initially if it doesn't exits allowing for reading at the start and reading
    $file = fopen('../datafiles/email_list.csv', 'rb');
    //this cycles through to output the members
    while(($data = fgetcsv($file))!=FALSE)
    {
        //gets all parts of the signup and will output it
        $signupsheet[]=array($data[0], $data[1], $data[2]);
    }
    //closes the file
    fclose($file);
    return $signupsheet;
}
?>