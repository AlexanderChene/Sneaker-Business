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
 <h1>The More Discount, The more purchase</h1>
 <div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">
<th>Total amount of purchase</th>
<th>Discaount in sale</th>
</tr></thead>
<tbody id="movies">
<script>
<?php

	    
	    
		   require_once 'DataService.class.php';
		   
		   
		   $dataservice=new DataService();    
		   $arr=$dataservice->pattern3();
		   
		    $count=count($arr);
		    for($j=0; $j<count($arr); $j++){
		         
		        ?>
		    		$("#movies").append("<tr><?php
		    		//for($i=0; $i<count($res); $i++){
		    		    
		    		echo "<td>".$arr[$j]['count(*)']."</td>";
		    		echo "<td>".$arr[$j]['Discount_sales']."</td>";
		    		
		    		
		    		//}
		    		?></tr>");
		    	<?php	
		    	}
		            	
		        ?>
			
				  
		 

		</script>
		</tbody>



		</table>

		</div>

 