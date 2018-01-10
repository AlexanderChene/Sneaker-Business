<br/>
<?php

echo "<b>This is Pattern 2</b>";
?>
<html>
<p>
Customer like to visit closer stores.

So we can open new stores based 
customer locations.
</p>
</html>
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
 <h1>Regional Total</h1>
 <div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">
<th>Total Number of Transactions</th>
<th>Distance from home to shop</th>
</tr></thead>
<tbody id="movies">
<script>
<?php

	    
	    
		   require_once 'DataService.class.php';
		   
		   
		   $dataservice=new DataService();    
		   $arr=$dataservice->cust_dis();
		   
		    $count=count($arr);
		    for($j=0; $j<count($arr); $j++){
		         
		        ?>
		    		$("#movies").append("<tr><?php
		    		//for($i=0; $i<count($res); $i++){
		    		    
		    		echo "<td>".$arr[$j]['count(*)']."</td>";
		    		echo "<td>".$arr[$j]['DISTANCE_GROUP']."</td>";
		    		
		    		
		    		//}
		    		?></tr>");
		    	<?php	
		    	}
		            	
		        ?>
			
				  
		 

		</script>
		</tbody>



		</table>

		</div>

