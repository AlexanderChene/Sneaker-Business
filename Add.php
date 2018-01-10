 <script>
function Kong(){
	
	
	document.getElementById("store").value="N/A";
	document.getElementById("sku").value="N/A";
	document.getElementById("customer").value="N/A";
	document.getElementById("year").value="N/A";
	document.getElementById("month").value="N/A";
	document.getElementById("day").value="N/A";
	document.getElementById("customer").value="N/A";
	document.getElementById("quantity").value="1";
	document.getElementById("sprice").value="";
	
}




</script>
<?php

require_once 'DataService.class.php';
$dataservice=new DataService();

if(isset($_POST['store'])){
    $store = $_POST['store'];
}

if(isset($_POST['sku'])){
$sku=$_POST['sku'];
}

if(isset($_POST['customer'])){
$cust=$_POST['customer'];
}
if(isset($_POST['year'])){
$year=$_POST['year'];
}
if(isset($_POST['month'])){
$month=$_POST['month'];
}
if(isset($_POST['store'])){
$day=$_POST['store'];
}
if(isset($_POST['quantity'])){
$quantity=$_POST['quantity'];
}
if(isset($_POST['sprice'])){
    $sprice=$_POST['sprice'];
}


?>

<html>
<h1>Add Transactions</h1>
<form action="" method="post">
<table>
<tr><td>Customer ID:</td><td>
        <select name="customer" id= "customer" >
        <?php 
            $arr=$dataservice->getID(6);
            for($i=0; $i<count($arr); $i++){
                $id=$arr[$i];
                if($id==0){
                    $id='N/A';
                }
                ?>
        <option value=<?php echo $id;?> <?php if($id==$cust){?> selected="selected" <?php }?>><?php echo $id;?></option>
                <?php
            }
        ?>
        </select>
</td></tr>
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
<tr><td>Item ID:</td><td>
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
<tr><td>Saledate</td>
        <td>Y:<select name="year" id="year" size=1>
              <?php 
                $arr=$dataservice->getID(7);
                for($i=0; $i<count($arr);$i++){
                    $id=$arr[$i];
                    if($id==0){
                        $id='N/A';
                    }
               ?>
        <option value=<?php echo $id;?> <?php if($id==$year){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php         
        }
        ?>
              
              
              </select>
        
        </td>
        <td>M:<select name="month" id="month" size=1>
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
        <td>D:<select name="day" id="day"size=1>
              <?php 
                $arr=$dataservice->getID(5);
                for($i=0; $i<count($arr);$i++){
                    $id=$arr[$i];
                    if($id==0){
                        $id='N/A';
                    }
               ?>
        <option value=<?php echo $id;?> <?php if($id==$day){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php         
        }
        ?>             
              </select>
        </td>        
</tr>
<tr>
<td>Quantity of item purchased: <select name="quantity" id="quantity"size=1>
              <?php 
                $arr=$dataservice->getID(8);
                for($i=0; $i<count($arr);$i++){
                    $id=$arr[$i];
                    if($id==0){
                        $id='N/A';
                    }
               ?>
        <option value=<?php echo $id;?> <?php if($id==$quantity){?> selected="selected" <?php }?>><?php echo $id;?></option>
        <?php         
        }
        ?>             
              </select>
        </td>        

</tr>
<tr>
<td>
SalePrice:  $<input type="text" id="sprice" name="sprice" value="<?php echo $sprice?>"></input>
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
$arr=$dataservice->getPrice($sku);
$orgprice=$arr[0]['orgprice'];

if($cust!=''){
    if($cust=='N/A'){
        echo "<b><font color=red>Miss Customer information, select a customer!!</font></b>";
    }else if($store=='N/A'){
        echo "<b><font color=red>Miss store information, select a store!!</font></b>";
    }else if($sku=='N/A'){
        echo "<b><font color=red>Miss item information, select a item!!</font></b>";
    }else if($year=='N/A'){
        echo "<b><font color=red>Miss year information, select a year!!</font></b>";
    }else if($month=='N/A'){
        echo "<b><font color=red>Miss month information, select a month!!</font></b>";
    }else if($day=='N/A'){
        echo "<b><font color=red>Miss day information, select a specific day!!</font></b>";
    }else if($sprice==''){
        echo "<b><font color=red>Miss the sale price of the item!!</font></b>";
    }else if($sprice>$orgprice){
        echo "<b><font color=red>The Original Price is $ '$orgprice'</font></b>";
        echo "<b><font color=red>Sales Price cannot exceed Original Price</font></b>";
        
    }
    else if(!(is_float($sprice)||is_numeric($sprice))){
        echo "<b><font color=red>Price must be a number!!</font></b>";
        echo '<script type="text/javascript">',
        'document.getElementById("sprice").value="";',
        '</script>'
        ;
    }else{
        $date=$year . "-" . $month . "-" . $day;
     
        $amount=$sprice * $quantity;
        echo $sku;
        
        $arr=$dataservice->getPrice($sku);
        $orgprice=$arr[0]['orgprice'];
        echo "sku '$sku' original price is '$orgprice' <br/>";
        echo "Total Transaction Amount is Saleprice multiply Quantity which is '$sprice' x '$quantity'= $'$amount'</br>";
        $res=$dataservice->addTran($cust, $store, $sku, $date, $quantity, $orgprice, $sprice, $amount);
        echo $res;
       
        //store,sku->oprice
        echo "Added successfully!";
        
    }
   
}


?>