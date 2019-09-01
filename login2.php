<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Learning</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        h1 {
            text-align: center;
            font-size: 450%;
            color: rgb(255, 63, 78);
        }

        form {
            margin-top: 10%;
            margin-left: 30%;
            margin-right: 30%;
        }

        .login {
            margin-left: 20%;
        }

        body {
            background-color: #FFFFFF;
        }

        form {
            color: rgb(255, 63, 78);
        }





        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        .textlog {
            font-family: Comic Sans MS;
            color: red;
            text-align: center;
            font-size: 40px;

        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>

        <h2 class="textlog">Login For Staff </h2>

        <form action="login2.php" method="POST">
            <div class="imgcontainer">
                <img src="http://decal.com.vn/vnt_upload/recruitment/icon-18.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>


                <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required>

                <button type="submit" class="btn btn-danger" name="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>

        </div>
        </div>

</body>
<?php
require_once "connect.php";
if (!isset($_POST['login'])) { } else {
    $sql = "SELECT * FROM manage where username = :username and pass = :pass";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        array(
            'username' => $_POST['username'],
            'pass' => $_POST['pass'],

        )
    );
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['username'] = $_POST['username'];
        echo '<script language="javascript">alert("Login sucessfully"); window.location="Store.php";</script>';
    } else {
        echo '<script language="javascript">alert("Uesername or password incorrect");</script>';
    }
}
?>

</html>