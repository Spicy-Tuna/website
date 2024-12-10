<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .checkout-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .checkout-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .checkout-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .checkout-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        .checkout-container button:hover {
            background-color: #0056b3;
        }
        .status {
            margin-top: 10px;
            font-size: 14px;
        }
        .status.success {
            color: green;
        }
        .status.error {
            color: red;
        }
    </style>
</head>
<body>
<script>
        // Retrieve the total price
        const totalPriceCart = localStorage.getItem('totalPriceCart');
    </script>
    <div class="checkout-container">
        <h1>Checkout Page</h1>
        <p id="total-price">Total Price: <script type="text/javascript">
            document.write(cart=totalPriceCart)
          </script></p>
        <input type="text" id="payment-details" placeholder="Card Number">
        <button onclick="confirmPurchase()">Confirm Purchase</button>
        <a href="index.php"> <button>Home</button></a>
        <p id="status" class="status"></p>
    </div>
    <script>
        function confirmPurchase() {
            const paymentDetails = document.getElementById('payment-details').value;
            const status = document.getElementById('status');

            if (paymentDetails) {
                status.textContent = 'Payment Successful!';
                status.className = 'status success';
            } else {
                status.textContent = 'Please enter valid payment details.';
                status.className = 'status error';
            }
        }
    </script>
    <script src="app.js"></script>
</body>
</html>
