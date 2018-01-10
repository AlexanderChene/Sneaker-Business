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
<?php
$id=$_GET['id'];
if($id==1){
    echo "<b font size=7>Trasaction table</b>";
}else if($id==2){
    echo "<b>Customer table</b>";
}else if($id==3){
    echo "<b>store table</b>";
}else if($id==4){
    echo "<b>Sale table</b>";
}else if($id==5){
    echo "<b>Item table</b>";
}

require_once 'DataService.class.php';

$dataservice=new DataService();





$ds2=new DataService();
$res=$ds2->showCol($id);//get table col

?>
<div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">

<?php 
    for($i=0; $i<count($res); $i++){
        echo "<th>";
        echo $res[$i];
        echo "</th>";
    }

?>
</tr></thead>

<tbody id="movies">
<script>
    <?php
    $dataservice=new DataService();
    $arr=$dataservice->getTable($id);//get table data
    $count=count($arr);
    if($id!=5){
	for($j=0; $j<count($arr); $j++){
	    
    ?>  
		$("#movies").append("<tr><?php
		for($i=0; $i<count($res); $i++){
		echo "<td>".$arr[$j][$res[$i]]."</td>";
		}
		?></tr>");
	<?php	
	}
}else{
    for($j=0; $j<count($arr); $j++){
    ?>
    $("#movies").append("<tr><?php
    		//for($i=0; $i<count($res); $i++){
    		    
    		//echo "<td>".$arr[$j]['SKU']."</td>";
    		//echo "<td>".$arr[$j]['Price']."</td>";
            //echo "<td><img src=".$arr[$j]['Image']."></td>"
          echo "<td>".$arr[$j]['SKU']."</td>";
    		echo "<td>".$arr[$j]['Price']."</td>";
            echo "<td><img src=".$arr[$j]['Image']."></td>";
            echo "<td>".$arr[$j]['Name']."</td>";
    		//}
    		?></tr>");
    	<?php
}
    
}
        	
    ?>
        	
		  
 

</script>
</tbody>



</table>

</div>