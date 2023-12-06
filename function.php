<?php
 include("include/conn.php");
 $ftn = $_POST["funct"];
 if($ftn == "saveCode"){
    $code = $_POST["code"];
    $uid = $_POST["uid"];
    $time = $_POST["time"];
    $language_id = $_POST["lang"];
    $language = $_POST["langname"]; 
    $filename = $_POST["filename"];
    $date= $today = date("Y-m-d");
    $filePath = "savecode/" . $uid."_". $time  . "." . $language;
    $programFile = fopen($filePath, "w");
    fwrite($programFile, $code);
    fclose($programFile);
   
    if(!$filename){
      echo "Enter file name!!,code did'nt saved";
    }else{
      $sql2 = "INSERT INTO `saved files`(`u_id`, `lang_id`, `filename`, `fileurl`, `date`) VALUES ('$uid','".$language_id."','".$filename."','".$filePath."','".$date."');"; 
      $res2 = mysqli_query($connection,$sql2);
      //echo $filePath;
      echo "Code saved successfully";
    }
    
 }
?>