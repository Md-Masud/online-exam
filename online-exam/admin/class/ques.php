<?php
include_once "Session.php";
include_once "Database.php";
class question
{
	private $bd;
	public function __construct()
	{
		$this->db=new mysql();
	}
	public function questionlist()
	{
		$result=$this->db->selectAll("question",[
		]);
		return $result;
	}
	public function questiondelete($id)
	{
		$sql="DELETE FROM question WHERE id='$id'";
		$query=$this->db->connection->prepare($sql);
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
	public function qrow()
	{
        $sql="SELECT * FROM question";
        $query=$this->db->connection->prepare($sql);
        $query->execute();
        $result= $query->rowCount();
        return $result;
		
	}
	public function addquestion($data)
	{
		$questionno=$data['questionno'];
		$question=$data['question'];
		$sql="INSERT INTO question(question,questionno)  VALUES(:question,:questionno)";
		$query=$this->db->connection->prepare($sql);
		$query->bindValue(':question',$question);
		$query->bindValue(':questionno',$questionno);
		$result=$query->execute();
		$ans=array();
		$ans[1]=$data['ans1'];
		$ans[2]=$data['ans2'];
		$ans[3]=$data['ans3'];
		$ans[4]=$data['ans4'];
        $curret=$data['rightans'];
        if($result)
         foreach ($ans as $key=>$value) {
         	if($value!='')
         	{
         		if($key == $curret)
         		{
         			$sql="INSERT INTO answer(questionno,rightans,ans)  VALUES(:questionno,:rightans,:ans)";
		           $query=$this->db->connection->prepare($sql);
		           $query->bindValue(':questionno',$questionno);
		           $query->bindValue(':rightans','1');
		           $query->bindValue(':ans',$value);
		           $result=$query->execute();
         		}
         		else
         		{
         			$sql="INSERT INTO answer(questionno,rightans,ans)  VALUES(:questionno,:rightans,:ans)";
		           $query=$this->db->connection->prepare($sql);
		           $query->bindValue(':questionno',$questionno);
		           $query->bindValue(':rightans','0');
		           $query->bindValue(':ans',$value);
		           $result=$query->execute();
         		}

         	}
        }	
        
    }
    public function edit($id)
    {	
       $sql="SELECT * FROM question WHERE id=:id";
       $query=$this->db->connection->prepare($sql);
       $query->bindValue(':id',$id);
       $query->execute();
       $result=$query->fetchAll();
	   return $result;

    }
    public function eddit($id)
    {	
       
       $query=$this->db->connection->prepare($sql);
       $query->execute();
       $result=$query->fetchAll();
	   return $result;

    }
}
?>