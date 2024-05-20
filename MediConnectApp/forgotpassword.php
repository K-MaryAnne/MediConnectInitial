<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
    } else {
        // Generate reset token
        $token = bin2hex(random_bytes(16)); // Generate a random 32-character hexadecimal token

        // Save the token and email in the database
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, created_at) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $email, $token);
        
        if ($stmt->execute()) {
            // Send password reset email
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.example.com'; // SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'your_email@example.com'; // SMTP username
                $mail->Password = 'your_password'; // SMTP password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Sender and recipient settings
                $mail->setFrom('your_email@example.com', 'Your Name');
                $mail->addAddress($email);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset';
                $mail->Body = 'Click the link to reset your password: <a href="https://example.com/reset_password?token=' . $token . '">Reset Password</a>';

                $mail->send();
                // Redirect to password reset sent page
                header("Location: message_view.php");
                exit();
            } catch (Exception $e) {
                $error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error_message = "Error saving token in database";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
    <h1>Forgot Password?</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">Enter your email address:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Reset Password</button>
    </form>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
