<?php include("include/conn.php"); ?>
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
    <!-- codemirror css file  -->
    <link rel="stylesheet" href="plugin/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="css/style1.css?v=<?=$version?>">
    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- codemirror js file  -->
    <!-- <script src="plugin/codemirror/lib/codemirror.js"></script>
    <script src="plugin/codemirror/mode/php/php.js"></script>
    <script src="plugin/codemirror/mode/css/css.js"></script>
    <script src="plugin/codemirror/mode/javascript/javascript.js"></script>
    <script src="plugin/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="plugin/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="plugin/codemirror/mode/clike/clike.js"></script> -->
    <!-- divtopdf converter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <!-- js file -->
    <script src="javascript/script.js?v=<?=$version?>"></script>

</head>

<?php include("include/header.php"); ?>
<div class="container-fluid sec-container">
    <div class="row">
        <div class="col-sm-6" id="edit-nav">
            Select Language:
            &nbsp; &nbsp;
            <?php
                if (!isset($_GET['lang'])){
                    $currlang = 1;
                }
                else{
                    $currlang=$_GET['lang'];
                    $sql2 = "SELECT * FROM `languages` where lang_id = $currlang"; 
                    $res2 = mysqli_query($connection,$sql2);
                    $row2 = mysqli_fetch_array($res2);
                    $currlangname = $row2['lang_name'];     
                }
            ?>
            <select id="lang" onchange="change_lang()">
                <?php 
                //  3.perform databse query
                $sql1 = "SELECT * FROM `languages`"; 
                $res1 = mysqli_query($connection,$sql1);
                // 4. return the data from database
                while($row1 = mysqli_fetch_array($res1)){
                    echo "<option ";
                        if($currlang == $row1['lang_id']){
                            echo "selected";
                            $sel_lang_name = $row1["lang_name"];
                        }
                    echo " value ='".$row1["lang_id"]."'>".strtoupper($row1["lang_name"])."</option>";
                    
                }
            ?>
            </select>
        </div>
        <div class=" col-sm-6 button-container">
            
            <button class="btn" onclick="runCode()">Run</button>
            <button class="btn" onclick="copyCode()">Copy Code</button>
            <button class="btn" onclick="getPDF()">.pdf</button>
            <?php 
             if (isset($_SESSION['u_id'])){
                echo'<button class="btn" onclick="saveCode('.$_SESSION['u_id'].','.$currlang.',\''.$currlangname.'\')">Save Code</button>';
             }
            //  else{
            //     echo'<button class="btn" onclick="chkLogin()">Save Code</button>';
            //  }
            ?>

        </div>

    </div>

</div>

<?php
 if($currlang == 5 ||$currlang == 6 || $currlang == 7){
    include("include/editor_2.php");
 }else{
    include("include/editor_1.php");
 }
?>



<script>
$(document).ready(function() {

    // codeEditorCall();
    runCode();

});

function chkLogin() {
    if (window.sessionStorage) {
        sessionStorage.setItem("tempCode", $('#editor').val());
        let tempCode = sessionStorage.getItem("tempCode");
        // alert(tempCode);
        location.replace("http://localhost/CodeOnline/login.php?redirect=editor&lang=" + <?php echo $currlang;?>)
    }

    function chkTempcode() {
        let tempCode = sessionStorage.getItem("tempCode");
        if (tempCode) {
            $('#editor').val() = tempCode;
            sessionStorage.removeItem("tempCode");
        } else {

        }
    }
}
</script>
<?php include("include/footer.php"); ?>

<!-- save code function -->