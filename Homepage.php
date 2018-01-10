<html>
<head>
<title>Data Analytics</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class ="container">
<?php
   
       include("header.php");
   
?>
<hr/>
<div class="maincontainer">
    <?php
        if($_GET['cat']){
            $page=$_GET['cat'];
            if($page==2){
                include("Search.php");
            }else if($page==3){
                include("Add.php");
            }else if($page==1){
                include("show.php");
            }else if($page==4){
                include("Analysis.php");
            }else if($page==5){
                include("Pattern.php");
            }
        }else{
            //include("Analysis.php");
            ?><div class = "banner"><img src = "" alt="" width="999px";/></div>
            			  <?php
        }
   
   ?>

</div>
</div>
<div class="footer">
<?php
//include("footer.php");

?>
</div>

</div>

</body>
</html>