<?php
require_once 'Mail.php';
?>
<h1>Sending The Emails</h1>
<?php
$options = array();
$options['host'] = 'ssl://smtp.gmail.com';
$options['port'] = 465;
$options['auth'] = true;
$options['username'] = 'clariontechfloor@gmail.com';
$options['password'] = 'TheAdminPassword99';
$mailer = Mail::factory('smtp', $options);

$headers = array ();
$headers['From'] = '<clariontechfloor@gmail.com>';
$headers['Subject'] = 'TechFloorStats';
$headers['Content-type'] = 'text/html';

//hard coded message
$message = "<html><head></head><body><h1>Beer of the Month is at Sailfish Brewery<h1>  </body></html>";
$recipients = array('b.m.greggs@eagle.clarion.edu');
//this adds mltiple recipients
echo "<h3>Sending Email To:</h3><ol>";
$file = fopen('../DataFiles/email_list.txt', 'rb');
while (($data = fgetcsv($file)) !== FALSE) {
    echo "<li>$data[0] $data[1] ($data[3])</li>" ;
    $recipients[] = $data[3];
}
echo "</ol>";
fclose($file);

$result = $mailer->send($recipients, $headers, $message);

if (PEAR::isError($result)) {
    echo 'Error sending email.';
    echo $result->getMessage();
} else {
    echo 'Email Sent Successfully.';
}

/*

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
*/

?>

