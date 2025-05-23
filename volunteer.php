<?php
require 'vendor/autoload.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'] ?? '';
    $email = $data['email'] ?? '';
    $phone = $data['phone'] ?? '';
    $interest = $data['interest'] ?? '';
    $message = $data['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contactinfo353@gmail.com';
        $mail->Password = 'iujp qspl vqww uvke'; // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('contactinfo353@gmail.com', 'SRF Get Involved');
        $mail->addAddress("akhileshdasgupta124@gmail.com", "Shree Ramnath Foundation");
        $mail->Subject = "New Volunteer Form Submission from $name";
        $mail->Body = "Name: $name\nEmail: $email\nPhone: $phone\nInterest: $interest\nMessage:\n$message";

        $mail->send();
        echo json_encode(["message" => "Thank you! Your interest has been submitted."]);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["message" => "There was an error sending your submission."]);
    }
}
?>
