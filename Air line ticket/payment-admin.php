<html>

<head>
    <title> Payment Admin </title>
    <link rel="stylesheet" href="css/payment-admin.css?v=1.1">
</head>

<body>
    <section id="main-container">

    <div id="change-box-container">
        <form method="post" id="change-box">
            <label id="select-id-text">Select payment id</label>
            <input id="" type="text" name="payment_id" list="show-id">

            <label id="change-number-text">Set new date</label>
            <input type="date" name="newDate" id="new-number">
            
            <div id="change-box-button-container">
                <div id="cancel" onclick='closePopup()'>Cancel</div>
                <button name="submit" id="change" type="submit">Update</button>
            </div>
        </form>
    </div>

    <?php
    include ("inc/connection.php");


    $getDetailsQuery = "SELECT * FROM payment";
    $result_1 = mysqli_query($conn, $getDetailsQuery);

    echo "<table>";
    echo "<tr id='table-heading'> <th>Payment Id</th> <th>Payment Method</th> <th>Card Number</th> <th>Expiery Date</th> <th> Billing Address </th>";

    while ($row_1 = mysqli_fetch_assoc($result_1)) {
        echo "<tr>";
        foreach ($row_1 as $key => $value) {
            echo "<td class = 'table-data'>";
            echo $value;
            echo "</td>";
        }

        echo "<td class='background-color'>";
        echo "<button class='change-expired-button' onclick='openPopup()'>Update Date</button>";
        echo "</td>";

        echo "<td class='background-color'>";
        echo "<a href='payment-delete.php?id=" . $row_1['paymentId'] . "'>Delete</a>";
        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>
    </section>

    <script src="js/payment-admin.js"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])){
    $payId = $_POST['payment_id'];
    $newDate = $_POST['newDate'];

    $updateDateQuery = "UPDATE payment SET expireDate = '$newDate' where paymentId = '$payId'";

    if (mysqli_query($conn, $updateDateQuery)) {
        echo "
        <script>
            alert('Successfully Updated');
            window.location.href = 'payment-admin.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Error Occured');
        </script>
        ";

        echo mysqli_error($conn);
    }
}