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
    <title>Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        form {
            margin-left: 30%;
            margin-top: 10%;
            margin-right: 30%;
            font-size: 30px;
        }




        body {
            background-color: white;
        }

        .img {
            height: 100px;
            width: 100px;

        }
    </style>
</head>

<body>
    <header class="container">
        <div class="logo">
            <div class="icon"><img class="img" src="https://image.flaticon.com/icons/png/512/16/16480.png" alt="#"></div>
            <p style="color:black; font-size:30px; font-family:Comic Sans MS">Wellcome <?php echo ($_SESSION['username']); ?></p>
        </div>
        <a href="Store.php"><button class="btn btn-outline-primary">Back</button></a>
    </header>
    <?php
    include_once "connect.php";
    $id = $_GET['id'];
    $sql1 = "Select * from product where id = :id";
    $query = $pdo->prepare($sql1);
    $query->execute(array(':id' => $id));
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $id1 = $row['id'];
        $namepr = $row['namepr'];
        $price = $row['price'];
    }
    ?>
    <form action="edit1.php" class="needs-validation" method="POST">
        <input type="hidden" name="id" value="<?php echo $id1; ?>">

        <h1 style="text-align: center">Edit Product</h1>
        <table class="table table-dark table-hover">

            <tr>
                <td>Name of product</td>
                <th><input type="text" class="form-control nhap" placeholder="Enter name of product" name="namep" value="<?php echo $namepr; ?>" required></th>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Price</td>
                    <td> <input type="number" class="form-control nhap" placeholder="Enter price of product" value="<?php echo $price; ?>" name="price" required>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary" name="edit">Submit</button></td>
                    <td></td>
                </tr>


        </table>

    </form>

</body>

</html>