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
            <section id="login-form" class="">
                <form action="" method="POST">
                    <h2>Login</h2>
                    <?php     
               if(isset($_POST['submit'])){
                    $username = $_POST['uname'];
                    $password = $_POST['password'];
                

                    $username = stripcslashes($username);  
                    $password = stripcslashes($password);  

                    $username = mysqli_real_escape_string($connection, $username);  
                    $password = mysqli_real_escape_string($connection, $password);  
                
                    $sql = "select * from users where u_name = '".$username."' and u_password = '".$password."'";  
                    $result = mysqli_query($connection, $sql) or die("ERORR");  
                    $row = mysqli_fetch_array($result);  
                    $count = mysqli_num_rows($result);  
                    
                    if($count == 1){  
                        $_SESSION['u_id'] = $row['u_id'];
                        if($_GET['redirect']==""){
                            header("location:index.php");
                        }else{
                            //  call savecode function here
                            header("location:".$redirect.".php?lang=".$lang);
                        }
                          
                    }  
                    else{  
                        echo ('<h4 class="error">Login failed. Invalid username or password.</h4><br>');  
                    }  
                }    
            ?>
                    <label>User Name*</label>
                    <input type="text" name="uname" placeholder="User Name"><br>

                    <label>Password*</label>
                    <input type="password" name="password" placeholder="Password"><br>
                    <label>New User? <a href="signin.php?redirect=<?php echo $redirect."&lang=".$lang?>">Sign In</a> </label>
                    <button type="submit" name="submit">Login</button>
                </form>

            </section>
        </div>
        <div class="col-sm-4"></div>
    </div>

</div>
<?php include("include/footer.php"); ?>