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

   

    
	     if(strUser1=='N/A' ){
	        alert("Please select one store to check any on sale item!!");
	         Kong();
         }
}
</script>
<?php
echo "this is onsale";
require_once 'DataService.class.php';
$dataservice=new DataService();

$store = $_POST['store'];

?>
<html>
<h1>Find On sale items!</h1>
<form action="" method="post" >
<table>
<tr><td>Check a specific store:</td><td>
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
<tr>
<td><input type = "Submit" name ="Submit" value="Submit" onclick ="CheckRes()"/></input></td>
</tr>
</table>
</form>
</html>
<div class="holder"></div>
<div style="height: 500px;width: 1000px;overflow: scroll;">
<table border=1 bordercolor="green" cellspacing="0px" >
<thead><tr bgcolor="gold">
<th>Discount</th>
<th>Item</th>
<th>Image</th>
</tr></thead>
<tbody id="movies">
<script>
    <?php
   require_once 'SQLhelper.class.php';
//   $arr=$dataservice->$dataservice->onsale($store);
    $sql="SELECT sprice/ORGPRICE as discount, t.sku, i.image
    FROM Transact t join store1 s on t.store=s.store  join item2 i on t.sku=i.sku
    where s.store='$store' and sprice/orgprice<>0 order by discount;";
    $sqlhelper=new SQLhelper();
    $arr=$sqlhelper->execute_dql($sql);
    $sqlhelper->close_connect();
    //return $res;
    // if()
   

    $count=count($arr);
    for($j=0; $j<count($arr); $j++){
         
        ?>
    		$("#movies").append("<tr><?php
    		//for($i=0; $i<count($res); $i++){
    		    
    		echo "<td>".$arr[$j]['discount']."</td>";
    		echo "<td>".$arr[$j]['sku']."</td>";
    		echo "<td><img src=".$arr[$j]['image']."></td>"
    		//}
    		?></tr>");
    	<?php	
    	}
            	
        ?>
	
		  
 

</script>
</tbody>



</table>

</div>