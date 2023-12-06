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
    <link rel="stylesheet" href="css/xmlstyle.css?v=<?=$version?>">
    <!-- jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- codemirror js file  -->
    <script src="plugin/codemirror/lib/codemirror.js"></script>
    <script src="plugin/codemirror/mode/php/php.js"></script>
    <script src="plugin/codemirror/mode/css/css.js"></script>
    <script src="plugin/codemirror/mode/javascript/javascript.js"></script>
    <script src="plugin/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script src="plugin/codemirror/addon/edit/matchbrackets.js"></script>
    <script src="plugin/codemirror/mode/clike/clike.js"></script>
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
                
                if (!isset($_GET['chp'])){
                    $currchp = "01_home";
                }
                else{
                    $currchp=$_GET['chp'];
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
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2  side-navbar">
            <!-- how to read file names from direcotry -->
            <h3><?php echo strtoupper($currlangname);?> Tutorial</h3>
            <?php
                // $dir = 'tutorials/css';
                $dir = 'tutorials/'.$currlangname;
                $files = scandir($dir);
                $files = array_splice($files,2);
                
                // print_r($files);
                $fileslength  = count($files);
                
                for($i = 0; $i < 10; $i++){
                    $filename = $files[$i];
                    $url_chp = explode(".",$filename)[0];
                    $filename = explode("_",$filename)[1];
                    $filename = explode(".",$filename)[0];

                    // $trimedfilename = trim($filename,"0123456789_.xml");
                    echo '<a class="side-navitem" href="tutorial.php?lang='.$currlang.'&chp='.$url_chp.'">'.strtoupper($filename).'</a>';
                    echo "<br>";
                }
            ?>
        </div>
        <div class="col-sm-10 tut-content">
            <?php
            $xml=simplexml_load_file("tutorials/".$currlangname."/".$currchp.".xml") or die("Error: Cannot create object");
            if($xml->heading1 !=""){
                echo '<h1 id="xml_heading1">'.$xml->heading1 . "</h1><hr>";
            }
            if($xml->text->heading2 !=""){
                echo '<h3 id="xml_heading2">'.$xml->text->heading2 . "</h3>";
            }
            if($xml->text->para[0]!=""){
                echo '<p id="xml_para">'.$xml->text->para[0] . "</p>";
            }
            $num_items = $xml->text->list->item->count();
            if($xml->text->list->li_title !=""){
                echo '<ul id="xml_li_head">'.$xml->text->list->li_title . "<br>";
                for($a = 0; $a < $num_items; $a++){
                    echo '<li id="xml_listitem">'.$xml->text->list->item[$a] . "</li>";
                }
                echo'</ul>';
            }
            if($xml->text->para[1]!=""){
                echo '<p id="xml_para">'.$xml->text->para[1] . "</p>";
            }
            if($xml->editor!=""){
                echo '<hr><p id="xml_editorTitle">'.$xml->editor->title."</p>";
                echo '<p id="xml_editorDis">'.$xml->editor->dis."</p>";
                // echo '<p id="xml_editorSyntax">'.$xml->editor->syntax."</p>";
                echo' <div class="container-fluid xml_edit-Mcontainer no-padding">
                        <div class="row " style=" height:100%; width:100%;margin:0px;">
                        <div class="col-sm-6" style="padding:0px">
                        <textarea id="editor" cols="" rows="">'.$xml->editor->syntax.'</textarea></div>
                        <div class="col-sm-6" style="padding:0px">
                        <div id="output"></div>
                        </div>
                        </div>
                        </div>
                        <div class="button-container">
                        <button class="btn" onclick="runCode()">Run</button>
                        </div>';
            }
        ?>
</div>
</div>
</div>