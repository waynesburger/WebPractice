<?php
$first_name = $_POST['firstname'];
$last_name  = $_POST['lastname'];
$email_addr = $_POST['emailaddr'];
$phone_num  = $_POST['phonenumb'];
$contact_method = $_POST['howtocontact'];
$raw_message = $_POST['message'];



$full_message = "$raw_message \n\n$first_name $last_name\nphone: $phone_num";
$recipient    = "waynewdata@outlook.com";
$subject      = "Feedback";
$mailheader   = "From: $email_addr \r\n";

mail($recipient, $subject, $full_message, $mailheader) or die("Error");
echo "Thanks for your input! We'll get back to you soon."
?>
