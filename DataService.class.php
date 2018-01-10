<?php
require_once 'SQLhelper.class.php';
class DataService{
    
    function getTable($id){
       
       if($id==1){
            $sql="select * from DA_Project.Transact limit 1000";
       }else if($id==2){
           $sql="select * from DA_Project.customer limit 100";
       }else if($id==3){
           $sql="select * from DA_Project.store1";
       }else if($id==4){
           $sql="select * from DA_Project.sale";
       }else if($id==5){
           $sql="SELECT * FROM DA_Project.item2;";
       }
        
        $sqlhelper= new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
    }
    
    function showCol($id){
        if($id==1){
            $sql="SHOW COLUMNS FROM DA_Project.Transact";
        }else if($id==2){
            $sql="SHOW COLUMNS FROM DA_Project.customer";
        }else if($id==3){
            $sql="SHOW COLUMNS FROM DA_Project.store1";
        }else if($id==4){
            $sql="SHOW COLUMNS FROM DA_Project.sale";
        }else if($id==5){
            $sql="SHOW COLUMNS FROM DA_Project.item2";
        }
       
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $arr=array();
        for($i=0;$i<count($res);$i++){
            $arr[$i]=$res[$i]['Field'];
        }
        $sqlhelper->close_connect();
        return $arr;
    }
    function getID($id){
        if($id==2){
            $sql="select STORE FROM DA_Project.store1";
            $COL='STORE';
        }else if($id==3){
            $sql="select SKU FROM DA_Project.item2";
            $COL='SKU';
        }else if($id==4){
            $sql="select Month From DA_Project.Month";
            $COL='Month';
        }else if($id==5){
            $sql="select Day From DA_Project.Day";
            $COL='Day';
        }else if($id==6){
            $sql="select CUST_ID From DA_Project.customer";
            $COL='CUST_ID';
        }else if($id==7){
            $sql="select Year From DA_Project.Year";
            $COL='Year';
        }else if($id==8){
            $sql="select Amount From DA_Project.Amount";
            $COL='Amount';
        }
        
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $arr=array();
        for($i=0; $i<count($res);$i++){
            $arr[$i]=$res[$i][$COL];
             
        
        }
        $sqlhelper->close_connect();
        return $arr;
    }
    function getstoreid($store){
        $sql="select STORE from DA_Project.store1 where store_name='$store'";
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
        
        
    }
    function dataFilter($store,$sku, $month){
        $month_sql="select * from DA_Project.Transact where extract(month from saledate)='$month'";
        $month_sql2="and extract(month from saledate)='$month'";
        if($sku=='N/A'){
           
            $sql="select * from DA_Project.Transact where STORE='$store'";
           
        }else if($store=='N/A'){
            
            $sql="select * from DA_Project.Transact where sku='$sku'";
        }else{
            $sql="select * from DA_Project.Transact where STORE='$store' and sku='$sku'";
        }
        
        if($month!='N/A'){
            $sql=$sql . $month_sql2;
            if($sku=='N/A' && $store=='N/A'){
                $sql=$month_sql;
            }
        }
        
        $sqlhelper= new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
        
    }
    function addTran($cust, $store, $item, $saledate, $quantity, $orgprice,$sprice, $amount){
        //$sql="INSERT INTO `DA_Project`.`Transact` (`SKU`, `STORE`, `SALEDATE`, `QUANTITY`, `SPRICE`, `AMT`, `cust_id`) VALUES ('$item', '$store', '$saledate', '$quantity', '$sprice', '$amount', '$cust');";
        $sql="INSERT INTO `DA_Project`.`Transact` (`SKU`, `STORE`, `SALEDATE`, `QUANTITY`, `ORGPRICE`, `SPRICE`, `AMT`, `cust_id`) VALUES ('$item', '$store', '$saledate', '$quantity', '$orgprice', '$sprice', '$amount', '$cust');";
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dml($sql);
        $sqlhelper->close_connect();
        return $res;
        
    }
    function bestseller($month,$store){
        if($month=='N/A'){
            $month=0;
            $sql="select sum(amt),sku from Transact where Store='$store' Group by sku order by sum(amt) desc limit 10;";
        }else if($store=='N/A'){
            $store=='0';
            $sql="select sum(amt),sku from Transact where extract(month from saledate)='$month' Group by sku order by sum(amt) desc;";
        }else{
            $sql="SELECT sum(amt),sku
            FROM Transact
            WHERE extract(month from saledate)='$month'  and store='$store'
            GROUP BY sku
            ORDER BY sum(amt) desc;";
            
        }      
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
        
    }
    function vip($id){
        if($id==1){
            
       
        $sql="SELECT t.cust_id,c.cust_name, sum(amt), count(Transaction_ID) FROM Transact t, customer c WHERE t.cust_id = c.cust_id GROUP BY t.cust_id ORDER BY sum(amt) desc limit 50;";
        }
        
        if($id==2){
            $sql="SELECT t.cust_id,c.cust_name, sum(amt), count(Transaction_ID) FROM Transact t, customer c WHERE t.cust_id = c.cust_id GROUP BY t.cust_id ORDER BY count(Transaction_ID) desc limit 50;";
        }
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
    }
    function onsale($store){
        $sql="SELECT sprice/ORGPRICE as discount, t.sku, i.image
        FROM Transact t join store1 s on t.store=s.store  join item2 i on t.sku=i.sku
        where s.store='$store' and sprice/orgprice<>0 order by discount;";
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
       // if()
    }
    function getPrice($sku){
        $sql="SELECT orgprice FROM DA_Project.Transact where sku='$sku'";
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        return $res;
        
    }
    function RegTotal(){
        $sql="SELECT distinct s.state, sum(t.amt) FROM Transact t join store1 s on t.store=s.store GROUP BY s.state ORDER BY sum(amt) desc;";
        $sqlhelper=new SQLhelper();
        $RES=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        RETURN $RES;
    }
    function cust_dis(){
        $sql= "SELECT count(*),
CASE
			WHEN DISTANCE_TO_NEAREST_STORE<10  THEN 'Less than 10 miles'
            WHEN DISTANCE_TO_NEAREST_STORE<30  THEN '10~30 miles'
            WHEN DISTANCE_TO_NEAREST_STORE<60 THEN '30-60 miles'
            WHEN DISTANCE_TO_NEAREST_STORE<100 THEN '60-100 miles'
            ELSE 'More than 100 miles'
END AS DISTANCE_GROUP

FROM customer
GROUP BY DISTANCE_GROUP
order by COUNT(*) DESC;";
        $sqlhelper=new SQLhelper();
        $RES=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        RETURN $RES;
    }
    function pattern3(){
        $sql="select count(*),
CASE
   when SPRICE/ORGPRICE<0.5 THEN 'Discount Less Than 0.5'
   when SPRICE/ORGPRICE<1 THEN 'Discount between 0.5 ~ 1'
   else 'no discount'
end AS Discount_sales

from Transact
group by discount_sales";
        $sqlhelper=new SQLhelper();
        $RES=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        RETURN $RES;
        
    }
    function Pattern4(){
        $sql="select count(*),
CASE 
    WHEN zip_code>=90001 and zip_code<=96162 THEN 'CA'
    WHEN zip_code>=10001 and zip_code<=14975 THEN 'NY'
    WHEN zip_code>=98001 and zip_code<=99403 THEN 'WA'
    WHEN zip_code>=7001 and zip_code<=8989 THEN 'NJ'
    ELSE 'EXCEPTION' 
END AS zip_group

from customer
group by zip_group
    ";
        $sqlhelper=new SQLhelper();
        $RES=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        RETURN $RES;
    }
    function countStores(){
        $sql="select count(*), state FROM store1 group by state";
        $sqlhelper=new SQLhelper();
        $RES=$sqlhelper->execute_dql($sql);
        $sqlhelper->close_connect();
        RETURN $RES;
        
    }
    function getStore(){
      
            $sql="select * FROM DA_Project.store1";
            $COL='STORE';
       
        $sqlhelper=new SQLhelper();
        $res=$sqlhelper->execute_dql($sql);
        $arr=array();
        for($i=0; $i<count($res);$i++){
            $arr[$i]=$res[$i]['store_name'];
             
    
        }
        $sqlhelper->close_connect();
        return $arr;
    }

   
}
?>