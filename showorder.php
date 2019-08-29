<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Store</title>
    <style>
        .table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .tr:nth-child(even) {
            background-color: #dddddd;
        }

        .body {
            background-color: white;
        }

        .icon {

            height: 100px;
            width: 100px;


        }

        .img {
            height: 100px;
            width: 100px;

        }

        .logo {
            display: flex;

        }
    </style>
</head>

<body>
    <header class="container">
        <div class="logo">
            <div class="icon"><img class="img" src="https://image.flaticon.com/icons/png/512/16/16480.png" alt="#"></div>
            <p style="color:black; font-size:30px; font-family:Comic Sans MS">Wellcome <?php echo ($_SESSION['username']); ?></p>
        </div>
        <a href="logout.php"><button class="btn btn-outline-primary">LogOut</button></a>
        <a href="showorder.php"><button class="btn btn-outline-primary">Showorder</button></a>
    </header><br>
    <section class="container">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Product</th>
                <th>Price</th>
                <th>Date</th>
                <th>Store</th>
                <td><a href="createoder.php"><button class="btn btn-outline-primary">Create Order</button></a></td>
            </tr>
            <?php require_once "connect.php";
            $sql = "select * from orderpr";
            $result = $pdo->query($sql);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['customer'] . "</td>";
                echo "<td>" . $row['csphone'] . "</td>";
                echo "<td>" . $row['product'] . "</td>";
                echo "<td>" . $row['price'] . "</td>"; 
                echo "<td>" . $row['dateb'] . "</td>";
                echo "<td>" . $row['store'] . "</td>";
            }
            ?>
        </table>
    </section>

</body>

</html>