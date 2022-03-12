<?php

class database{
    private $connection;

    function __construct(){
        $this->connection=$this->connect();
    }
    private function connect(){
        
        $text="mysql:host=localhost;dbname=overwrite";
        try{
            $string=new PDO($text,name,password);
            return $string;

        }
        catch(PDOException $e){
            echo $e->getMessage();

        }
        return false;       
    
    }
    public function write($query,$array=[]){
        
             
        $conn=$this->connection;
        $prepare=$conn->prepare($query);
        $check=$prepare->execute($array);          
        if($check){
            return true;
        }        
        else{
            return false;
        }
    }
    public function read($query,$array=false){
    
        $conn=$this->connection;
        $prepare=$conn->prepare($query);
        $check=$prepare->execute($array);        
        if($check){
            $fetch=$prepare->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($fetch) && count($fetch)>0) {
                //print_r($fetch);
                return $fetch;
                        
            }
            //$fetchs=json_encode($fetch);
            
            return false;
        }        
        else{
            return false;
        }
    }
}
