<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Complete Your Profile</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/roboto-font.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v5">
    <div class="page-content">
        <div class="form-v5-content">
            <form class="form-detail" action="<?php echo site_url('auth/completeProfile'); ?>" method="post">
                <h2>Complete Your Profile</h2>
                <?= \Config\Services::validation()->listErrors(); ?>
                <div class="form-row">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="input-text" placeholder="Your Address" required>
                    <i class="fas fa-home"></i>
                </div>
                <div class="form-row">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="input-text" placeholder="Your Phone" required>
                    <i class="fas fa-phone"></i>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="complete-profile" class="register" value="Complete Profile">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
