<link rel="stylesheet" href="jpage.css">
<script type="text/javascript" src="jquery.js"></script> 
<script src="jpage.js"></script>
 <script>
 $(function(){
	    $("div.holder").jPages({
	      containerID : "movies", 
	      previous : "Previous", 
	      next : "Next",
	      perPage : 10,
	      delay : 20
	    });
	  });
 </script>
 <script>

function CheckRes(){
	
    var e1 = document.getElementById("store");
    var strUser1 = e1.options[e1.selectedIndex].text;

    var e2 = document.getElementById("month");
    var strUser2 = e2.options[e2.selectedIndex].text;

    
	     if(strUser1==strUser2 &&strUser1=='N/A'){
	        alert("At leaset use one filter!!");
	         Kong();
         }
}
</script>
  <script>
function Kong(){
	
	
	document.getElementById("store").value="N/A";
	document.getElementById("month").value="N/A";
	
	
}


</script>
<?php 
require_once 'DataService.class.php';
require_once 'SQLhelper.class.php';
$dataservice=new DataService();
if(isset($_POST['store'])){
    $store=$_POST['store'];
}else{
    $store="N/A";
}

if(isset($_POST['month'])){
    $month=$_POST['month'];
}else{
    $store="N/A";
}


?>
<html>
<h1>Rank of Item</h1>
<form  action="" method="post">
<table>
 <tr>
  <td>Select Month:</td>
  
   <td>
    <select name="month" id="month" size=1>
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
   <td>Select store:</td>
   <td>
   <select name="store" id="store">
    <?php 
                $arr=$dataservice->getID(2);
                for($i=0; $i<count($arr);$i++){
                    $id=$arr[$i];
                    if($id==0){
                        $id='N/A';
                    }
               ?>
        <option value=<?php echo $id;?> <?php if($id==$store){?> selected="selected" <?php }?>><?php echo $id;?></option>
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
<div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">
<th>Total Transactions</th>
<th>Item</th>
</tr></thead>
<tbody id="movies">
<script>
    <?php

   // $month=7;
   // $store=0;
    //$dataservice=new DataService();    
   $arr=$dataservice->bestseller($month, $store);
   
    //$sqlhelper=new SQLhelper();
   // $res=$sqlhelper->execute_dql($sql);
    //$arr=$dataservice->getTable(1);
    $count=count($arr);
    for($j=0; $j<count($arr); $j++){
         
        ?>
    		$("#movies").append("<tr><?php
    		//for($i=0; $i<count($res); $i++){
    		    
    		echo "<td>".$arr[$j]['sum(amt)']."</td>";
    		echo "<td>".$arr[$j]['sku']."</td>"
    		//}
    		?></tr>");
    	<?php	
    	}
            	
        ?>
	
		  
 

</script>
</tbody>



</table>

</div>