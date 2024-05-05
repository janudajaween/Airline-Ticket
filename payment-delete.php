<?php
include("inc/connection.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    
    $sql = "DELETE FROM payment WHERE `payment`.`paymentId` = $id";

    if (mysqli_query($conn, $sql)) {
        echo "
        <script>
            alert('Successfully Deleted');
            window.location.href = 'payment-admin.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Error Occured!');
        </script>
        ";
    }
}