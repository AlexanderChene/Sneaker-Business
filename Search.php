<link rel="stylesheet" href="jpage.css">
<script type="text/javascript" src="jquery.js"></script> 
<script src="jpage.js"></script>
 <script>
  $(function(){
    $("div.holder").jPages({
      containerID : "movies", 
      previous : "Previous", 
      next : "Next",
      perPage : 20,
      delay : 20
    });
  });
  </script>
<script>

function CheckRes(){
	
    var e1 = document.getElementById("store");
    var strUser1 = e1.options[e1.selectedIndex].text;

    var e2 = document.getElementById("sku");
    var strUser2 = e2.options[e2.selectedIndex].text;

    var e3 = document.getElementById("month");
    var strUser3 = e3.options[e3.selectedIndex].text;

    
	     if(strUser1=='N/A' && strUser2=='N/A' && strUser3=='N/A'){
	        alert("At leaset use one filter!!");
	         Kong();
         }
}
</script>
  <script>
function Kong(){
	
	
	document.getElementById("store").value="N/A";
	document.getElementById("sku").value="N/A";
	document.getElementById("month").value="N/A";
	
	
}


</script>
<?php
require_once 'DataService.class.php';
$dataservice=new DataService();

if(isset($_POST['store'])){
    $store = $_POST['store'];
}else{
    $store="";
}
if(isset($_POST['sku'])){
    $sku=$_POST['sku'];

}else{
    $sku="";
}

if(isset($_POST['month'])){
    $month=$_POST['month'];
}else{
    $month="";
}



?>

<html>
<h1>Search Transactions</h1>
<form action="" method="post">
<table>
<!-- <tr><td>Customer ID:</td><td><input type="text" name="customer"></td></tr>-->
<tr><td>Store ID:</td><td>
        <select name="store" id="store" size=1>
        <?php
            $arr=$dataservice->getID(2);
            for($i=0; $i<count($arr);$i++){
                $id=$arr[$i];
                if($id==0){
                    $id='N/A';
                }
        ?>
        <option value=<?php echo $id?> <?php if($id==$store){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php 
            }
        ?>
        </select>



</td></tr>
<tr><td>SKU ID:</td><td>
        <select name="sku" id="sku">
        <?php 
        $arr=$dataservice->getID(3);
        for($i=0; $i<count($arr);$i++){
            $id=$arr[$i];
            if($id==0){
                $id='N/A';
            }
        ?>
        <option value=<?php echo $id;?> <?php if($id==$sku){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php         
        }
        ?>
        </select>




</td></tr>
<tr>
        
        <td>Select Month:</td><td><select name="month" id="month" size=1>
              <?php 
                $arr=$dataservice->getID(4);
                for($i=0; $i<count($arr);$i++){
                    $id=$arr[$i];
                    if($id==0){
                        $id='N/A';
                    }
               ?>
        <option value=<?php echo $id;?> <?php if($id==$month){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php         
        }
        ?>
              
              
              </select>
        
        </td>
       

        
</tr>
<tr> 
<td><input type = "Submit" name ="Submit" value="Submit" onclick ="CheckRes()"/></input></td>
<td> <input type = "Button" value="Reset" onclick="Kong()"/></td>
</tr>
</table>
</form>
</html>
<?php 
$col=$dataservice->showCol(1);
$dataservice=new DataService();
//$arr=$dataservice->getstoreid($store);
//$store=$arr[0]['STORE'];

$dataservice=new DataService();
$arr=$dataservice->dataFilter($store, $sku, $month);
if(count($arr)==0){
 if($store!='' || $sku!='' || $month!=''){
    echo "<b><font color=red>0 RESULTS!! PLEASE TRY SOME OTHER COMBINATIONS</font></b>";
    }
    //echo "<b><font color=red>0 RESULTS!! PLEASE TRY SOME OTHER COMBINATIONS</font></b>";
}


?>



<div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">

<?php 
    for($i=0; $i<count($col); $i++){
        echo "<th>";
        echo $col[$i];
        echo "</th>";
    }
    
    

?>
</tr></thead>
<?php 

?>
<tbody id="movies">
<script>
    <?php
    //$dataservice=new DataService();
    //$arr=$dataservice->dataFilter($store, $sku);//get table data
    
    //$sql="select * from DA_Project.transact where STORE='$store'";
    //$sqlhelper= new SQLhelper();
    //$arr=$sqlhelper->execute_dql($sql);
    $count=count($arr);
  
	for($j=0; $j<count($arr); $j++){
	    
    ?>  
		$("#movies").append("<tr><?php
		for($i=0; $i<count($col); $i++){
		echo "<td>".$arr[$j][$col[$i]]."</td>";
		}
		?></tr>");
	<?php	
	}
        	
    ?>
        	
		  
 

</script>
</tbody>



</table>

</div>
