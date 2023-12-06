<?php

    if (!isset($_GET['lang'])){
        $currlang = 1;
    }
    else{
        $currlang=$_GET['lang'];
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
        }
    echo " value ='".$row1["lang_name"]."'>".$row1["lang_name"]."</option>";
}
?>
</select>
