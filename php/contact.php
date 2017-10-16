<?php
if(isset($_POST['email'])) {
    $email_to = "robin.corey@gmail.com";
    $email_subject = "Email from webpage";
    
    function died($error) {
        echo $error."<br /><br />";
        die();
    }
    
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject'])) {
        died('Erro in input');       
    } 
    
    $name = $_POST['name']; 
    $email_from = $_POST['email']; 
    $subject = $_POST['subject']; 
    
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
