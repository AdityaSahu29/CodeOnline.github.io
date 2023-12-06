<?php include("include/conn.php");?>
<?php include("include/config.php"); ?>
<?php
$redirect = "";
$lang="";
 if(isset($_GET['redirect'])){
    if(!$_GET['redirect']){
    $redirect ="";
 }else{
    $redirect = $_GET['redirect'];
 }
}
 if(isset($_GET['lang'])){
    if(!$_GET['lang']){
    $lang ="";
 }else{
    $lang = $_GET['lang'];
 }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeOnline</title>
    <!--  Bootstrap Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style1.css?v=<?=$version?>">
    <script src="javascript/script.js?v=<?=$version?>"></script>
    
</head>
<?php include("include/header.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <section id="login-form" class="no-mar">
                <form name="RegForm" onsubmit="return formValidation()" action="" method="POST">
                    <h2>Sign In</h2>
                    <?php
                if (isset($_POST['submit']))
                {  
                    $username=$_POST['uname'];
                    $password=$_POST['password'];
                    $emailid=$_POST['uemail'];

                    $sql1 = "SELECT * FROM users where email_id = '".$emailid."'";
                    $res1 = mysqli_query($connection,$sql1);
                    $num1 =  mysqli_num_rows($res1);

                    if( $num1 == 0) {
                        $sql = "INSERT INTO users (u_name, u_password, email_id) VALUES ('".$username."', '".$password."', '".$emailid."');";
                        $result = mysqli_query($connection, $sql);  
                        $u_id = mysqli_insert_id($connection);
                        $_SESSION['u_id'] = $u_id;
                        if($_GET['redirect']==""){
                            header("location:index.php");
                        }else{
                            //  call savecode function here
                            header("location:".$redirect.".php?lang=".$lang);
                        }
                        
                    } 
                    else {
                        echo("<h4 class='error'>$emailid already exists.<h4></br>");
                    }  
                } 
                ?>

                    <label>User Name*</label><span class="error" id="name_warning"></span>
                    <input type="text" name="uname" placeholder="User Name" required><br>

                    <label>Password*</label><span class="error" id="pass_warning"></span>
                    <input type="password" name="password" placeholder="Password" required><br>

                    <label>Email id*</label><span class="error" id="email_warning"></span>
                    <input type="text" name="uemail" placeholder="Email Id" required><br>
                    <label>Already An User? <a href="login.php">Login</a> </label>
                    <button type="submit" name="submit">Register</button>
                </form>

            </section>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <?php include("include/footer.php"); ?>