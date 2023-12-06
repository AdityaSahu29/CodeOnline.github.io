<?php include("include/conn.php");?>
<?php include("include/config.php"); ?>
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
<?php include("include/header.php");?>
<div class="container-fluid box-1">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1 class="h1-mar">Hello, What Do You Want To Learn Today?</h1>
            <div class="row bt-box">
                <div class="col-sm-4"><a class="lang-btn" href="http://localhost/CodeOnline/tutorial.php?lang=1">PHP</a>
                </div>
                <div class="col-sm-4"><a class="lang-btn"
                        href="http://localhost/CodeOnline/tutorial.php?lang=2">PYTHON</a></div>
                <div class="col-sm-4"><a class="lang-btn" href="http://localhost/CodeOnline/tutorial.php?lang=3">C</a>
                </div>
            </div>
            <div class="row bt-box">
                <div class="col-sm-4 offset-sm-2"><a class="lang-btn"
                        href="http://localhost/CodeOnline/tutorial.php?lang=4">C++</a></div>
                <div class="col-sm-4"><a class="lang-btn"
                        href="http://localhost/CodeOnline/tutorial.php?lang=5">HTML</a></div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<div class="container-fluid box-2" >
    <div class="row">
        <!-- <div class="col-sm-12"> -->
            <div class="col-sm-6 center-align">
                <div class="lang_heading">PHP</div>
                <div class="lang_info">A popular general-purpose scripting language <br>that is especially suited to web
                    development.<br>Fast, flexible and pragmatic,
                </div>
                <div><a class="btn" href="tutorial.php?lang=1">Learn PHP</a></div><br>

                <div>
                    <a class="btn" href="editor.php?lang=1">Try PHP</a>
                </div>
            </div>
            <div class="col-sm-6 center-align ">
                <img class="img" src="images\phplogo.webp" alt="">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid box-2">
    <div class="row">
        <div class="col-sm-6 center-align ">
            <img class="img" src="images\pythonlogo.png" alt="">
        </div>
        <div class="col-sm-6 center-align">
            <div class="lang_heading">PYTHON</div>
            <div class="lang_info">Python is a popular programming language.</br>Python can be used on a server to create web applications.
              </br>
            </div>
            <div><a class="btn" href="tutorial.php?lang=2">Learn PYTHON</a></div><br>
            <div><a class="btn" href="editor.php?lang=2">Try PYTHON</a></div>
        </div>
    </div>
</div>

<div class="container-fluid box-2">
    <div class="row">
        <div class="col-sm-6 center-align">
            <div class="lang_heading">HTML</div>
            <div class="lang_info">HTML is the standard markup language for Web pages.<br>With HTML you can create your
                own Website.<br>HTML is easy to learn - You will enjoy it!

            </div>
            <div><a class="btn" href="tutorial.php?lang=5">Learn HTML</a></div><br>
            <div><a class="btn" href="editor.php?lang=5">Try HTML</a></div>
        </div>
        <div class="col-sm-6 center-align ">
            <img src="images\HTML5_1Color_Black.svg" alt="">
        </div>
    </div>
</div>
<!-- <div class="container-fluid box-5">
    <div class="row">
        <div class="col-sm-6 center-align ">
            <img src="images\HTML5_1Color_Black.svg" alt="">
        </div>
        <div class="col-sm-6 center-align">
            <div class="lang_heading">HTML</div>
            <div class="lang_info">HTML is the standard markup language for Web pages.<br>With HTML you can create your
                own Website.<br>HTML is easy to learn - You will enjoy it!

            </div>
            <div><a class="btn" href="#">Learn HTML</a></div><br>
            <div><a class="btn" href="#">Try HTML</a></div>
        </div>
    </div>
</div>  -->
<?php include("include/footer.php"); ?>