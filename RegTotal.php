
 <h1>Regional Total Amount</h1>


<table border=1 bordercolor="green" cellspacing="0px" >
<tr bgcolor="gold">
<th>state</th>
<th>Total Amount</th>
</tr>


<?php

	    
	    
		   require_once 'DataService.class.php';
		   
		   
		   $dataservice=new DataService();    
		   $arr=$dataservice->RegTotal();
		   
		    $count=count($arr);
		    for($j=0; $j<count($arr); $j++){
		         
		        
		    		
		    		echo "<tr>" ;  
		    		echo "<td>".$arr[$j]['state']."</td>";
		    		echo "<td> $".$arr[$j]['sum(t.amt)']."</td>";
		    		echo "<tr/>";
		    		
		    		
		    		
		    		//}
		  
		    		
		    	}
		            	
		        ?>	
</table>
<hr/>
<h1>Number of Stores in Each State</h1>


<table border=1 bordercolor="green" cellspacing="0px" >
<tr bgcolor="gold">
<th># of Stores</th>
<th>State</th>
</tr>
<?php  
 $arr=$dataservice->countStores();
		   
		    $count=count($arr);
		    for($j=0; $j<count($arr); $j++){
		         
		        
		    		
		    		echo "<tr>" ;  
		    		echo "<td>".$arr[$j]['count(*)']."</td>";
		    		echo "<td>".$arr[$j]['state']."</td>";
		    		echo "<tr/>";
		    		
		    		
		    		
		    		//}
		  
		    		
		    	}?>
		    	</table>
<?php echo "NY & WA is sales records is much greater than NJ and CA's"?>