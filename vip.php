<script>

function CheckRes(){
	
    var e1 = document.getElementById("");
    var strUser1 = e1.options[e1.selectedIndex].text;

    
	     if(strUser1=='N/A' ){
	        alert("Please select something!!");
	         
         }
}
</script>
<?php
if(isset($_POST['option'])){
    $option=$_POST['option'];
}else{
    $option="N/A";
}
//echo $option;


?>
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
 <h1>Top Customers</h1>
 
 <form action="" method="post">
 <table>
 <tr><td><button type="submit" name="option" value="1">Most Money</button></td><td><button type="submit" name="option" value="2" >Frequecy</button></td></tr>

 </table>
 </form>
<div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">
<th>Customer_id</th>
<th>Name</th>
<th>Total Money Spend</th>
<th>Total time of paying</th>
</tr></thead>
<tbody id="movies">
<script>
    <?php

    
    
   require_once 'DataService.class.php';
   
   
   $dataservice=new DataService();    
   $arr=$dataservice->vip($option);
   
    $count=count($arr);
    for($j=0; $j<count($arr); $j++){
         
        ?>
    		$("#movies").append("<tr><?php
    		//for($i=0; $i<count($res); $i++){
    		    
    		echo "<td>".$arr[$j]['cust_id']."</td>";
    		echo "<td>".$arr[$j]['cust_name']."</td>";
    		echo "<td>".$arr[$j]['sum(amt)']."</td>";
    		echo "<td>".$arr[$j]['count(Transaction_ID)']."</td>";
    		
    		//}
    		?></tr>");
    	<?php	
    	}
            	
        ?>
	
		  
 

</script>
</tbody>



</table>

</div>

