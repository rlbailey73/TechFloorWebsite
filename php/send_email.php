<?php
require_once "Mail.php";

$from = "TechFloor<techfloortemp@gmail.com>";
$to = "Breanna Greggs <anna41mei@gmail.com>";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = 'ssl://smtp.gmail.com';
$username = "techfloortemp"; //change later for real one (permission are open rn hich is unsafe)
$password = "techfloor99";

$headers = array('From' =>$from,
    'To'=>$to,
    'Subject'=>$subject);
$smtp = Mail::factory('smtp', array('host'=>$host,
        'auth'=>true,
        'username'=>$username,
        'password'=>$password));
$mail = $smtp->send($to, $headers, $body);

if(PEAR::isError($mail))
{
    echo("<p>" .$mail->getMessage() . "</p>");
}
else
{
    echo("<p>Message successfully sent!</p>");
}
?>

