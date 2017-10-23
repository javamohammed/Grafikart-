<?php 

require ("DIC.php");
class Connection{
    
    private $db_name;
    private $db_password;
    
    public  function __construct($db_name,$db_password){
        
        $this->db_name = $db_name ;
        $this->db_password = $db_password ; 
    }
}

class Model {
    
    private $cnx;
    
    public function __construct(Connection $cnx){
        
        $this->cnx = $cnx;
        
    } 
}


$dic = new DIC();

$dic->set("Connection",function(){
   return new Connection("db_name","db_passowrd"); 
});

$dic->set("Model",function() use ($dic){
   return new Model($dic->get("Connection")); 
});

var_dump($dic->get("Model"));

 ?>