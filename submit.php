<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "matrolindia@gmail.com"; // <-- Replace with your Gmail address
    $email_subject = "New Query from Website: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>
            alert('Thank you, $name! Your message has been sent.');
            window.location.href = '../index.html';
        </script>";
    } else {
        echo "<script>
            alert('Sorry, message could not be sent. Please try again later.');
            window.location.href = '../index.html';
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request.');
        window.location.href = '../index.html';
    </script>";
}
?>
