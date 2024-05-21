<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message</title>
</head>
<body>
    <?php
    if ($message_type === 'activation_success') {
        ?>
        <h1>Account Activated</h1>
        <p>Your account has been activated successfully.</p>
        <a href="<?php echo site_url('auth/completeProfile'); ?>">Complete Your Profile</a>
        <?php
    } elseif ($message_type === 'activation_failed') {
        ?>
        <h1>Account Activation Failed</h1>
        <p>Sorry, we couldn't activate your account. Please try again later.</p>
        <a href="<?php echo site_url('register'); ?>">Register Again</a>
        <?php
    } elseif ($message_type === 'registration_success') {
        ?>
        <h1>Registration Successful</h1>
        <p>Please check your email to activate your account.</p>
        <?php
    } elseif ($message_type === 'request_password_reset') {
        ?>
        <h1>Password Reset Request</h1>
        <form action="/request_password_reset" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <button type="submit">Reset Password</button>
        </form>
        <?php
    } elseif ($message_type === 'password_reset_requested') {
        ?>
        <h1>Password Reset Requested</h1>
        <p>A password reset link has been sent to your email.</p>
        <?php
    } elseif ($message_type === 'reset_password') {
        ?>
        <h1>Reset Password</h1>
        <form action="/reset_password" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="token">Token:</label>
            <input type="text" id="token" name="token" required><br>
            <button type="submit">Reset Password</button>
        </form>
        <?php
    } elseif ($message_type === 'reset_token_invalid') {
        ?>
        <h1>Invalid Token</h1>
        <p>The password reset token is invalid or has expired.</p>
        <?php
    } elseif ($message_type === 'password_reset_success') {
        ?>
        <h1>Password Reset Successful</h1>
        <p>Your password has been reset successfully.</p>
        <?php
    }
    ?>
</body>
</html>
