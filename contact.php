<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check if any required field is empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email configuration
        $to = "exhilaread@gmail.com"; // Replace with your email address
        $subject = "Contact Form Submission from $name";
        $messageBody = "Name: $name\nEmail: $email\nMessage: $message";
        $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

        // Send email
        if (mail($to, $subject, $messageBody, $headers)) {
            // If email sent successfully, redirect with success message
            header('Location: contact.html?status=Thank you for reaching out! We will get back to you soon.');
            exit();
        } else {
            // If email fails, show an error message
            header('Location: contact.html?status=There was an error sending your message. Please try again.');
            exit();
        }
    } else {
        // If form fields are missing
        header('Location: contact.html?status=Please fill in all fields.');
        exit();
    }
}
?>
