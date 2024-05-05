<?php
include ("inc/connection.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Payment Form</title>
  <link rel="stylesheet" href="css/payment-portal.css">

</head>

<body>
  <section id="background-container">

    <h2 id="heading">Payment Information</h2>

    <form method="post">

      <label for="payment_method">Payment Method:</label>
      <select id="payment_method" name="payment_method">
        <option value="visa">Visa</option>
        <option value="master">Master</option>
        <option value="paypal">Paypal</option>
      </select>

      <br>

      <label for="card_number">Card Number:</label>
      <input type="text" id="card_number" name="card_number" required>

      <br>

      <label for="exp_date">Expiration Date:</label>
      <input type="date" id="exp_date" name="exp_date" placeholder="MM/YY" required>

      <br>

      <label for="billing_address">Billing Address:</label>
      <textarea id="billing_address" name="billing_address" rows="4" required></textarea>

      <br>

      <label for="remember_me">
        <input type="checkbox" id="remember_me" name="remember_me"> Remember me
      </label>

      <br>

      <div id="submit-container">
        <button id="submit" name="submit" type="submit">Submit</button>
      </div>

    </form>

  </section>

  <script src="js/payment-portal.js"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {

  $paymentMethod = $_POST['payment_method'];
  $cardNumber = $_POST['card_number'];
  $date = $_POST['exp_date'];
  $address = $_POST['billing_address'];

  $sql = "INSERT INTO payment (paymentMethod, cardNumber, expireDate, billingAddress) VALUES ('$paymentMethod', '$cardNumber', '$date', '$address')";

  if (mysqli_query($conn, $sql)) {
    echo "
    <script>
    alert('Successfull');
    </script>
    ";
  } else {
    echo "
    <script>
    alert('Error occured');
    </script>
    ";
    echo mysqli_error($conn);
  }
}