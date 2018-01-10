<?php


    class SQLhelper{
        public $conn;
        public $dbname="DA_Project";
        //public $username="root";
        public $username="DA_CD";
        //public $password="950707";
        public $password="qwert12345";
        //public $host="localhost";
        public $host="cs336project.cny1mxkxmrtm.us-east-2.rds.amazonaws.com:3306";
        
        public function __construct(){
            $this->conn=mysql_connect($this->host,$this->username,$this->password);
            if(!$this->conn){
                die("Fail".mysql_error());
            }
            mysql_select_db($this->dbname,$this->conn);
        }
        
        public function execute_dml($sql){
            $b=mysql_query($sql,$this->conn) or die(mysql_error());
            if(!$b){
                return 0;
            }else{
                if(mysql_affected_rows($this->conn)>0){
                    return 1;//execute successfully
                }else{
                    return 2;//no row is affected
                }
            }
        }
        
        public function execute_dql($sql){
            $arr=array();
            $res=mysql_query($sql,$this->conn) or die(mysql_error());
            $i=0;
            while($R=mysql_fetch_assoc($res)){
                $arr[$i++]=$R;
            }
            mysql_free_result($res);
            return $arr;
        }
        public function execute_dql2($sql){
        
            $res=mysql_query($sql,$this->conn) or die(mysql_error());
        
            return $res;
        
            //close connection
        
        }
        public function close_connect(){
        
            if(empty($this->conn)){
                mysql_close($this->conn);
            }
        }
    }

?>