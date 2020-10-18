<?php
interface DB
{
  public function insert($table,$data);
   
  public function selectAll($table,$data=[]);


  public function update($table,$data,$id);

  public function delet($table);
} 

 class mysql implements  DB
 {
        private $host = 'localhost'; //HOST NAME.
        private $db_name = 'online'; //Database Name
        private $db_username = 'root'; //Database Username
        private $db_password = ''; //Database Password
        public  $connection;
  
  public function __construct()

    {
     try {
          $this->connection = new PDO('mysql:host='. $this->host .';dbname='.$this->db_name, $this->db_username, $this->db_password);
          $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        }
   }
  public function insert($table,$data)
    {

    $placeholder=[];
    foreach ($data as $key => $value) {
    $placeholder[]=':'.$key;
    }

     $sql='INSERT INTO '.$table.' ('.implode(',', array_keys($data)).')VALUES('.implode(',', $placeholder).')';

     $query=$this->connection->prepare($sql);
     foreach ($data as $placeholder => $val) {
     $query->bindvalue(':'.$placeholder,$val); 
     }
     
     return $query->execute();
   }

   
   
   
  public function selectAll($table,$data=[])
    {
      $sql="SELECT * FROM ".$table ;
       if(!empty($data))
        {
         $string=[];
         foreach ($data as $key => $value) 
         {
         $string[]= "'{$key}'= :{$key} ";
         }
         $sql.="WHERE".implode(',',$string );
        }
        $query=$this->connection->prepare($sql);
        foreach ($data as $placeholder => $val) 
        {
        $query->bindvalue(':'.$placeholder,$val);
        }
      $query->execute();
      $result=$query->fetchAll();
      return $result;
   }
     public function selectAl($table,$id)
   {
    
     $sql="SELECT * FROM ".$table."WHERE id='$id'";
     $query=$this->connection->prepare($sql);
     $query->execute();
     $result=$query->fetchAll();
     return $result;
     
   }


   public function update($table,$data = [],$id)
   {
     
        $string=[];
        foreach ($data as $key => $value) {
         $string[]="'{$key}'=':'.{$key}";
        }

        $udi=[];
        foreach ($id as $key => $value) {
         $uid[]="'$key'=':'.$key";
        }

   
      $sql='INSERT INTO '.$table.'SET'.implode(',',$string ).'WHERE'.implode(',',$uid );
      $query=$this->connection->prepare($sql);
       foreach ($id as $placeholder => $val) {
       $query->bindvalue(':'.$placeholder,$val);
       
     }
     $query=$this->connection->prepare($sql);
       foreach ($data as $placeholder => $val) {
       $query->bindvalue(':'.$placeholder,$val);
       
     }
     $query->execute();
      $result=$query->fetchAll();
      return $result;
   }
   

   public function delet($table)
   {
    
   }
}


?>