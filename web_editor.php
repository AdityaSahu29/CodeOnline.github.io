<script>
    function saveCode(){

    <?php
    if(isset($_SESSION['u_id'])){
        $u_id = $_SESSION['u_id'];
    }
    else{
        // $u_id = "plz login";
        // $_SESSION['temp'] = ;
    }
    ?>

    var u_id= "<?php echo $u_id; ?>";
    if(u_id){
      alert(u_id);   
    }
    else{
        var temp = document.getElementById("editor");
    }
      

    
}
</script>