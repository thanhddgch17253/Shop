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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Store</title>
    <style>
        body {
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

        .table1 {
            background-image: url('http://www.widewallpapershd.info/file/3695/728x408/16:9/avengers-logo_1596949322.jpg');
            background-size: cover;
            width: 1800px;

        }
    </style>
</head>

<body>
    <header class="container">
        <div class="logo">
            <div class="icon"><img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcYwd0mC0erPKHEWbbudsaN6CqiH363_o2qUFB3MXk-55qeubgBw" alt="#">
            </div>
            <p style="color:blue; font-size:30px; font-family:Comic Sans MS">Wellcome
                <?php echo ($_SESSION['username']); ?></p>
        </div>
        <a href="logout.php"><button class="btn btn-warning">LogOut</button></a>
        <a href="Store.php"><button class="btn btn-warning">Back</button></a>
    </header>
    <?php
    include_once "connect.php";
    if (!isset($_POST['submit'])) { } else {
        $namepr = $_POST['nameprd'];
        $pay = $_POST['pay'];
        $namect = $_POST['customer'];
        $store = $_POST['store'];
        $date = $_POST['date'];
        $phone = $_POST['csphone'];
        $id = $_POST['id'];
        $sql = "insert into orderpr (customer, csphone, product, price, dateb, store,id) values (:customer, :phone, :namepr, :pay, :date, :store,:id)";
        $query = $pdo->prepare($sql);
        $query->bindparam(':customer', $namect);
        $query->bindparam(':phone', $phone);
        $query->bindparam(':namepr', $namepr);
        $query->bindparam(':pay', $pay);
        $query->bindparam(':date', $date);
        $query->bindparam(':store', $store);
        $query->bindparam(':id', $id);

        $query->execute();
        echo '<script language="javascript">alert("Create order successfully");</script>';
    }
    ?>
    <div class="container table1">
        <form action="createoder.php" class="needs-validation" method="POST">
            <h1 style="color:white;font-size:50px;font-family:Comic Sans MS;text-align: center">Create Order</h1>
            <div class=>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="color:white;font-size:30px;font-family:Comic Sans MS">Information of customer</th>
                            <th style="color:white;font-size:30px;font-family:Comic Sans MS">Information of product</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">Name of Customer</label>
                                    <input type="text" class="form-control nhap" placeholder="Enter name of Customer" name="customer" required>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">Name of product</label>
                                    <input type="text" class="form-control nhap" placeholder="Enter name of product" name="nameprd" required>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label style="color:white   ;font-size:30px;font-family:Comic Sans MS;text-align: center">Customer's Phone</label>
                                    <input type="text" class="form-control nhap" placeholder="Enter Customer's Phone" name="csphone" required>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">Pay</label>
                                    <input type="number" name="pay" placeholder="Enter pay" required class="form-control nhap">
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">Date</label>
                                    <input type="date" class="form-control nhap" name="date" required>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">ID</label>
                                    <input type="number" class="form-control nhap" name="id" required>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <label style="color:white;font-size:30px;font-family:Comic Sans MS;text-align: center">Store</label>
                                    <select name="store" class="nhap">
                                        <option value="store1">Store 1</option>
                                        <option value="store2">Store 2</option>
                                        <option value="store3">Store 3</option>
                                    </select>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-danger" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>