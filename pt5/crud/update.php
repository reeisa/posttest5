<?php
require '../functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $customer = mysqli_query($conn, "SELECT * FROM `customer` WHERE id = '$id'");

    if (mysqli_num_rows($customer) > 0) {
        $row = mysqli_fetch_assoc($customer);
    } else {
        echo "<script>alert('data not found.');window.location='read.php';</script>";
        exit;
    }
} else {
    header('Location: read.php');
    exit;
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $payment = $_POST['payment'];

    $sql = "UPDATE `customer` SET name = '$name', email = '$email', category = '$category', payment = '$payment' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('data successfully updated.');window.location='read.php';</script>";
    } else {
        echo "error updating data: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="../style/crud.css">
</head>

<body>
    <div class="form-container">
        <form action="" method="POST">
            <h2>edit data</h2>
            <div class="form-element">
                name:
                <input type="text" id="name" name="name" placeholder="enter your name" value="<?= $row['name']; ?>" required>
            </div>
            <div class="form-element">
                id number:
                <input type="text" id="id" name="id" placeholder="enter your id" value="<?= $row['id']; ?>" required>
            </div>
            <div class="form-element">
                email:
                <input type="email" id="email" name="email" placeholder="enter your email" value="<?= $row['email']; ?>" required>
            </div>
            <div class="form-element">
                ticket category: <br>
                <input type="radio" id="vip" name="category" value="vip" <?php if ($row['category'] == 'vip') echo 'checked'; ?>> vip
                <input type="radio" id="general" name="category" value="general" <?php if ($row['category'] == 'general') echo 'checked'; ?>> general
            </div>
            <div class="form-element">
                payment method: <br>
                <input type="radio" id="debit" name="payment" value="debit" <?php if ($row['payment'] == 'debit') echo 'checked'; ?>> debit card
                <input type="radio" id="credit" name="payment" value="credit" <?php if ($row['payment'] == 'credit') echo 'checked'; ?>> credit card
            </div>
            <button type="submit" class="btn" name="update" value="update">update</button>
        </form>
    </div>
</body>

</html>