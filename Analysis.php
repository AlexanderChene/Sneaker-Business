<?php
echo "<b>Let's do this</b><br/>";
?>
<a href="http://localhost/DA/Homepage.php?cat=4&f=1">VIP Customer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=4&f=2">Best Seller</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=4&f=3">On sale</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=4&f=4">Reginal Total</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://localhost/DA/Homepage.php?cat=4&f=5">Customer Distance</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php 
    if(isset($_GET['f'])){
        $fun=$_GET['f'];
        if($fun==1){
            include("vip.php");
        }else if($fun==2){
            include("bestseller.php");
        }else if($fun==3){
            include("onsale.php");
        }else if($fun==4){
            include("RegTotal.php");
        }else if($fun==5){
            include("Cust_distance.php");
        }
        
        
    }else{
        echo "Welcome!";
    }


?>
