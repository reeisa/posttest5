<?php
require '../functions.php';

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login/login.php");
    exit;
}

$customer = mysqli_query($conn, "SELECT * FROM `customer`");
?>

<!DOCTYPE html>
<html lang=en>

<head>
    <title>read</title>
    <!-- hanya untuk icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="../style/crud.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <img src="../image/logo.png" alt="logo">
        <ul>
            <li><a href="../index.php">log out</a></li>
        </ul>
    </nav>
    <!-- navbar -->

    <div class="read-container">
        <h1>customer data</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>category</th>
                    <th>payment method</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($customer as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['category']; ?></td>
                        <td><?= $row['payment']; ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id']; ?>"><button type="button" class="edit btn"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('are you sure to delete this data? remember : action cannot be undone.')"><button type="button" class="delete btn"><i class="fa-solid fa-trash"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>