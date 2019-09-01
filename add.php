<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Store</title>
    <style>
        form {
            margin-left: 30%;
            margin-top: 10%;
            margin-right: 30%;
            font-size: 30px;
        }



        body {
            background-color: rgb(183, 195, 206);
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
        <a href="logout.php"><button class="btn btn-outline-primary">LogOut</button></a>
        <a href="Store.php"><button class="btn btn-outline-primary">Back</button></a>
    </header>



    <form action="add.php" class="needs-validation" method="POST">

        <table class="table table-dark table-hover">

            <h1 style="text-align: center">Add Product</h1>
            <tr>
                <th>Id of product</th>
                <th><input type="number" class="form-control nhap" placeholder="Enter id of product" name="id" required></th>
            </tr>


            <tr>
                <td>Name of product</td>
                <td><input type="text" class="form-control " placeholder="Enter name of product" name="name" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" class="form-control " placeholder="Enter price of product" name="price" required></td>

            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary" name="submit">Submit</button></td>
                <td></td>
            </tr>

        </table>
    </form>


    <?php
    include_once "connect.php";
    if (!isset($_POST['submit'])) { } else {
        $namepr = $_POST['name'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $sql = "SELECT * FROM product where namepr = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                'name' => $namepr,
            )
        );
        $count = $stmt->rowCount();
        if ($count > 0) {
            echo '<script language="javascript">alert("Product already exists");</script>';
        } else {
            $sql = "insert into product(id,namepr, price) values (:id,
            :name, :price)";
            $query = $pdo->prepare($sql);
            $query->bindparam(':id', $id);
            $query->bindparam(':name', $namepr);
            $query->bindparam(':price', $price);
            $query->execute();
            echo '<script language="javascript">alert("Add product successfully");</script>';
        }
    }
    ?>
</body>

</html>