<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once "class/ques.php";
?>
<?php
$u=new question();
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$qd=$u->questiondelete($id);
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
			<th>SI</th>
			<th>Question</th>
			<th>Action</th>
		</thead>
		<?php
		
		$uv= $u->questionlist();
		foreach ($uv as $data) {
		?>
		<tr >
			
			<td><?php echo $data['questionno'];?></td>
			<td><?php echo $data['question'];?></td>
			<td >
			<a href="?id=<?php echo $data['id'];?>;">Remove</a>
			</td>
		</tr>
	<?php }?>
	</table>
</tbody>
</div>
<?php include 'inc/footer.php'; ?>