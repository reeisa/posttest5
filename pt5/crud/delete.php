<?php
require '../functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE id = '$id'");

    if (mysqli_num_rows($customer) > 0) {
        $sql = "DELETE FROM `customer` WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('data successfully deleted.');window.location='read.php';</script>";
        } else {
            echo "error deleting data: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('data not found.');window.location='read.php';</script>";
    }
} else {
    header('Location: read.php');
}
?>
