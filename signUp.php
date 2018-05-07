<?php require_once 'functions.php'?>


<?php
if($_POST){
    registerUser($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php viewtitle()?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.css" rel="stylesheet">
</head>
<body>

<?php require_once 'nav.php'?>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <div class="wrap-login100">
<!--                        <div  class="login100-form-title" style="background-image: url(img/bg-01.jpg)">-->
<!--					<span class="login100-form-title-1">-->
<!--						Sign Up-->
<!--					</span>-->
<!--                        </div>-->
                        <?php if (getErrorMessage()):?>
                            <div style="margin-top: 30px" class="text-danger">
                                <?php echo getErrorMessage();?>
                            </div>
                        <?php endif; ?>

                        <form  class="login100-form validate-form" method="post" action="" >
                            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                                <span class="label-input100" >Username*:</span>
                                <input class="input100" type="text" autofocus required name="name" value="<?= $_POST['name']??''?>" placeholder="Enter name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-26" data-validate="Last_name is required">
                                <span class="label-input100" >Last name:</span>
                                <input class="input100" type="text" name="last_name" value="<?= $_POST['last_name']??''?>" placeholder="Enter last_name">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-26" data-validate="Login is required">
                                <span class="label-input100" >Login*:</span>
                                <input class="input100" type="text" name="login" value="<?= $_POST['login']??''?>" placeholder="Enter login">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                                <span class="label-input100" >Email*:</span>
                                <input class="input100" type="email" name="email" value="<?= $_POST['email']??''?>" placeholder="Enter email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                                <span class="label-input100">Password*:</span>
                                <input class="input100" type="password" name="password" placeholder="Enter password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                                <span class="label-input100">Password*:</span>
                                <input class="input100" type="password" name="passwordConfirm" placeholder="confirm password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" name="submit"  >
                                    Registr
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php require_once 'footer.php' ?>
