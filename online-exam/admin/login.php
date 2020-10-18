<?php 
   
	include_once 'inc/loginheader.php';
    include_once 'class/adminlogin.php';
?>
<?php
 if(isset($_POST['login']))
 {
 	$l=new login();
 	$al=$l->alogin($_POST);
 }
?>
<style type="text/css">
	
</style>
<div class="main">
<h1>Admin Login</h1>
<?php
if(isset($al))
{
	echo $al;
}
?>
<div class="adminlogin">
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"/></td>
			</tr>
		</table>
	</from>
</div>
</div>
<?php //include 'inc/footer.php'; ?>