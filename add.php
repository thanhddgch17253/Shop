<?php 
    session_start();
    if(!isset($_SESSION['username']))
    {
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
        
        .nhap {
            margin-left: 20%;
        }
        body{
            background-color:rgb(183, 195, 206);
        }
    </style>
</head>

<body>
    <header>
        <p style="color:red; font-size:30px;">Hi <?php echo ($_SESSION['username']); ?></p>
        <a href="logout.php"><button class="btn btn-success">LogOut</button></a>
        <a href="Store.php"><button class="btn btn-success">Back</button></a>
    </header>
    <div class="container bg-info">
        <form action="add.php" class="needs-validation" method = "POST">
            <h1 style="text-align: center">Add Product</h1>
            <div>
                <label>Id of product</label>
                <input type="number" class="form-control nhap"  placeholder="Enter id of product" name="id" required>
            </div>

            <div>
                <label>Name of product</label>
                <input type="text" class="form-control nhap"  placeholder="Enter name of product" name="name" required>
            </div>
            <div>
                <label>Price</label>
                <input type="number" class="form-control nhap"  placeholder="Enter price of product" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary" name ="submit">Submit</button>
        </form>
    </div>
    //cho t xem cai database
   <?php
   include_once "connect.php"; 
    if(!isset($_POST['submit']))
    {
    }
    else
    {
        $namepr = $_POST['name'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $sql = "SELECT * FROM product where namepr = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute
        (
            array(
                'name' => $namepr,
            )
        );
        $count = $stmt->rowCount();
        if($count > 0)
        {   
           echo'<script language="javascript">alert("Product already exists");</script>';
            
        }
        else
        {
            $sql = "insert into product(id,namepr, price) values (:id,
            :name, :price)";
            $query = $pdo->prepare($sql);
            $query->bindparam(':id', $id);
            $query->bindparam(':name', $namepr);
            $query->bindparam(':price', $price);
            $query->execute();
            echo'<script language="javascript">alert("Add product successfully");</script>';
        }
    }
   ?>
</body>
</html>
