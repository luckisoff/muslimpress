<?php

if(isset($_POST['subscribe']) && ($_POST['subscribe'] == "mp") && isset($_POST['email'])){

    $email = $_POST['email'];
    
    $email_to = "muslimpress.net@gmail.com";

    $message = "New subscriber.\n".$email;

    $subject = "New Subscriber.";

    $headers = "From:".$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();

    mail($email_to, $subject, $message, $headers);

    echo "Thank you for subscribing";

} else {
    echo "Something went wrong";
}