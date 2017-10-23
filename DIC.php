<?php 

class DIC{
    
    private $registry =  [];
    private $instances =  [];
    
    
    public function set($key, callable $resolver){
        $this->registry[$key] = $resolver;
        
    }
    public function get($key){
        
        if(!isset($this->instances[$key])){
            
            $this->instances[$key] = $this->registry[$key];
            
        }
        
        return $this->instances[$key] ;
    }
    
    }
    
 ?>