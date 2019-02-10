<?php
$first_name = $_POST['firstname'];
$last_name  = $_POST['lastname'];

$your_email = $_POST['emailaddr'];
$email_expr = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

$your_phone = $_POST['phonenumb'];
$phone_expr = '/^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$/';

$contact_method = $_POST['howtocontact'];

$raw_message = $_POST['message'];
$message_len = '/^.{6,}$/';

$successflag = true;

$email_err = " ";
$email_err_flag = false;
$phone_err = " ";
$phone_err_flag = false;

$email_success = preg_match($email_expr, $your_email);
$phone_success = preg_match($phone_expr, $your_phone);
$message_success  = preg_match($message_len, $raw_message);

echo "Errors in filling out the form: <br><br>";

if($email_success == 0){
    echo "-- Email address invalid<br>";
    $successflag = false;
}

if($phone_success == 0){
    echo "-- Phone number invalid<br>";
    $successflag = false;
}

if($message_success == 0){
    echo "-- message needs to be longer than 6 characters<br>";
    $successflag = false;
}

if($successflag){
    $full_message = "$raw_message \n\n$first_name $last_name\nphone: $phone_num";
    $recipient    = "waynewdata@outlook.com";
    $subject      = "Feedback";
    $mailheader   = "From: $email_addr \r\n";

    @mail($recipient, $subject, $full_message, $mailheader) or die("Error");
    echo "None!<br>";
    echo "Thanks for filling out the form, we will get back to you soon";
}else{
    echo "The form was not sent, sorry buddy, try again.";
}
?>