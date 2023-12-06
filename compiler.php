<?php
    include("include/conn.php");
    $language_id = $_POST['language'];

    $sql1 = "SELECT * FROM `languages` where lang_id='".$language_id."'" ;
    $res1 = mysqli_query($connection,$sql1);
    $row1 = mysqli_fetch_array($res1);
    $language = strtolower($row1['lang_exe']);
    
    // session_start();
    $_SESSION['sel_language']= $language;
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);
    $filePath = "temp/" . $random . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);

    if($language == "php") {
        $output = shell_exec("C:\wamp64\bin\php\php8.1.0\php.exe $filePath 2>&1");
        echo $output;
    }
    if($language == "py") {
        $output = shell_exec("C:\Users\sahua\AppData\Local\Programs\Python\Python310\python.exe $filePath 2>&1");
        echo $output;
    }

    if($language == "c") {
        $outputExe ="temp/" .   $random . ".exe";
        // $outputExe ="temp/" .   $random ;
        shell_exec("gcc $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    if($language == "cpp") {
        $outputExe ="temp/" .   $random . ".exe";
        shell_exec("g++ $filePath -o $outputExe");
        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }

    
    // function delfile(){
    //     unlink("temp/".$random.".".$language);
    //     if($language == "cpp" || $language == "c"  ) {
    //         unlink("temp/".$random.".exe");
    //     }
    // }
    
    unlink("temp/".$random.".".$language);
    if($language == "cpp" || $language == "c"  ) {
        unlink("temp/".$random.".exe");
    }
?>