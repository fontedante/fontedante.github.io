<?php 
    $title = "Login Admin";
    require "includes/head.php";
    $err ="";
    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = MD5($_POST['pass']);

        $query = mysql_query("select * from admin where user_admin = '$user' and pass_admin = '$pass'");
        $row = mysql_num_rows($query);

        if($row > 0){
            //Berhasil
            $_SESSION['admin'] = true;
            echo "<meta http-equiv='refresh' content='0,url=".BASE_URL."admin/index.php'/>";
        }else{
            //Gagal
            $err = "Login Gagal";
        }
    }

?>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="user" required="required" autofocus="autofocus">
                            <label for="inputEmail">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-block" value="login" name="login">
                </form>
                <p><?=$err;?></p>
            </div>
        </div>
    </div>

    <script src="<?=BASE_URL;?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASE_URL;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASE_URL;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>