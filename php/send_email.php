<?php
require_once "Mail.php";

$from = "TechFloor<anna41mei@gmail.com>";
$to = "Becky Bailey <;laskjdfoiwkj";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "mail.gmail.com";
$username = "anna41mei";
$password = "blueDreamer";

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

