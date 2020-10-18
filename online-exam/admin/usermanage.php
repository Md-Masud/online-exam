 <?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once "class/user.php";
	
	
?>
<?php
  $u=new user();
  if(isset($_GET['sid']))
  {
  	$id=$_GET['sid'];

  	$status=$_GET['statu'];
  	$uc = $u->usera($id,$status);
  	
  }
  if(isset($_GET['did']))
  {
  	$id=$_GET['did'];
  	$status=$_GET['status'];
  	$uc=$u->userd($id,$status);
  }
  if(isset($_GET['deid']))
  {
  	$id=$_GET['deid'];
  	$d=$u->udelete($id);
  }
?>
<style type="text/css">
	 table{width: 100%; text-align: center;}
	
</style>
<div class="main">
<h1>User Mange</h1>
<tbody>
	<table >
		<thead >
			<th >Id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<?php
		$u=new user();
		$uv= $u->usermanage();
		foreach ($uv as $data) {
		?>
		<tr >
			<td><?php echo $data['id']?></td>
			<td><?php echo $data['name']?></td>
			<td><?php echo $data['email']?></td>
			<td >
				<?php if($data['status']==1) {?>
				<a href="?sid=<?php echo $data['id'] ;?> & statu=<?php echo $data['status'];?>">Active</a>||
			   <?php } else {?>
				<a href="?did=<?php echo $data['id'];?> & status=<?php echo $data['status'];?>">Deactive</a>||
			   <?php } ?>
				<a href="?deid=<?php echo $data['id']?>;">Remove</a>
			</td>
		</tr>
	<?php }?>
	</table>
</tbody>



	
</div>
<?php include 'inc/footer.php'; ?>