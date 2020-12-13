<?php 
    include('class.php');

    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $login = new DBcon();
        $sql = $login->login($username, $password);
        if($sql){
            echo "<script>window.location.href='index.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row w-50 text-center">
            <div class="col">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="form-control" type="text" name="user" placeholder="Username">
                    <input class="form-control" type="password" name="pass" placeholder="Password">
                    <input class="btn btn-success" type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>