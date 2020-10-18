<?php
include_once "Session.php";
include_once "Database.php";
class login
{
 private $bd;
 public function __construct()
 {
  $this->bd=new mysql();
 }
 public function alogin($data)
 {
 	$email=$data['email'];
 	$password=$data['password'];
	if($email==""||$password=="")
	{
		$msg="<div class='alert alert-danger'><strong>Error!</strong>field not emty</div>";
			
			return $msg;
	}
	$result=$this->loginget($email,$password);
	if($result==true)
	{
		Session::inti();
		Session::set('login',true);
		Session::set('id',$result->id);
		Session::set('name',$result->name);
		Session::set('email',$result->email);
		Session::set('password',$result->password);
		Session::set('loginmsg',"<div class='alert alert-success'><strong>Success</strong> login successfull</div>");
         header("location: index.php");
	}
	else
	{
		$msg="<div class='alert alert-danger'><strong>Error!</strong>login not found </div>";
			
			return $msg;
	}
 }
 public function loginget($email,$password)
 {
 	$sql="SELECT * FROM admin WHERE email=:email AND password=:password";
 	$quey=$this->bd->connection->prepare($sql);
 	$quey->bindValue('email',$email);
 	$quey->bindValue('password',$password);
 	$quey->execute();
 	$result=$quey->fetch(PDO::FETCH_OBJ);
 	return $result;
 }
}
?>