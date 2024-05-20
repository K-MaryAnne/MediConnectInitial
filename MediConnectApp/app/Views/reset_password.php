<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <?= isset($validation) ? $validation->listErrors() : '' ?>
    <?= form_open('auth/resetPassword/' . $token) ?>
    <input type="password" name="Password" placeholder="New Password" required><br>
    <input type="password" name="Confirm Password" placeholder="Confirm Password" required><br>
    <button type="submit">Reset Password</button>
    <?= form_close() ?>
</body>
</html>
