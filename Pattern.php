<?php
echo "<b>This is Our DataBase patterns!!</b><br/>";
?>
<a href="http://localhost/DA/Homepage.php?cat=5&f=1">Pattern1</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=5&f=2">Pattern2</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=5&f=3">Pattern3</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=5&f=4">Pattern4</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=5&f=5">Pattern5</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php 
    if(isset($_GET['f'])){
        $fun=$_GET['f'];
        if($fun==1){
            include("pattern1.php");
        }else if($fun==2){
            include("Cust_distance.php");
        }else if($fun==3){
            include("Pattern3.php");
        }else if($fun==4){
             include("Pattern4.php");
        }else if($fun==5){
           // include("Cust_distance.php");
        }
        
        
    }else{
        echo "Welcome!";
    }


?>
