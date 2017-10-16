<?php
if(isset($_POST['email'])) {
    $email_to = "robin.corey@gmail.com";
    $email_subject = "Email from webpage";
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    } 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required  
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
 
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
Thanks for contacting me. Will get back to you shortly.
<?php
 
}
?>
