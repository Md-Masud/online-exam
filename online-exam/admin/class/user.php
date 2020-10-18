<?php
include_once "Session.php";
include_once "Database.php";
class user
{
	private $bd;
	public function __construct()
	{
		$this->bd=new mysql();
	}
	public function usermanage()
	{
		$result = $this->bd->selectAll("ureg");
		return $result;

	}
	public function userd($id,$data)
	{
	  //$statu =$data['status'];
      $sql="UPDATE `ureg` SET status = 1 WHERE id=:id";
      $query=$this->bd->connection->prepare($sql);
      $query->bindValue(':id',$id);
      $result = $query->execute();
     if($result)
      {
         $msg="<div class='alert alert-success'><strong>Success</strong> updae  successfull</div>";
         return $msg;    
      } 
     else
      {

        $msg="<div class='alert alert-danger'><strong>Error!</strong> updae not successfull exit</div>";
        return $msg;  
      }
    }
	public function usera($id,$data)
	{
	 // $status = $data['status'];
      $sql="UPDATE `ureg` SET status = 0 WHERE id=:id";
      $query=$this->bd->connection->prepare($sql);
      $query->bindValue(':id',$id);
      $result = $query->execute();
      if($result)
      {
       $msg="<div class='alert alert-success'><strong>Success</strong> updae  successfull</div>";
        return $msg;    
      }
      else
      {

       $msg="<div class='alert alert-danger'><strong>Error!</strong> updae not successfull exit</div>";
       return $msg;  
      }
    }
    public function udelete($id)
    {
    	$sql="DELETE FROM ureg WHERE id='$id'";
    	$query=$this->bd->connection->prepare($sql);
    	$result=$query->execute();
    	if($result)
        {
          $msg="<div class='alert alert-success'><strong>Success</strong> updae  successfull</div>";
         return $msg;    
        }
        else
        {

         $msg="<div class='alert alert-danger'><strong>Error!</strong> updae not successfull exit</div>";
         return $msg;  
        }
    }
 }
 