<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once "class/ques.php";
?>
<?php
$u=new question();

 
?>
<style type="text/css">
	 table{width: 100%;  margin: auto; text-align: center;}
	 tr{ margin: auto;}
	 input[type=text],  input[type=number] {
  width: 50%;
  padding: 10px 18px;
  font-size: 20px;
  margin: auto;
  display:block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 30%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
 margin-left: 200px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
</style>
<div class="main">
<h1>Question Add</h1>
<tbody>
	 <?php
	 $u=new question();
	 if(isset($_POST['submit']))
	 {
	 	$a=$u->addquestion($_POST);
	 }
	 ?>
		<form method="post">
		<tr >
			<?php
          $u=new question();
          $total=$u->qrow();
          $next=$total+1;
          ?>
			<input type="number" name="questionno" value="<?php echo $next;?>"placeholder="Question NO" >
		</tr ><br>
		<tr >
			<input type="text" name="question"placeholder="Question "><br>
		</tr>
		<tr >
			
			<input type="text" name="ans1"placeholder="Choice One"><br>
		</tr>
		<tr >
			
			<input type="text" name="ans2"placeholder="Choice Two"><br>
		</tr>
		<tr >
			
			<input type="text" name="ans3"placeholder="Choice Three"><br>
		</tr>
		<tr >
			
			<input type="text" name="ans4"placeholder="Choice Four"><br>
		</tr>
		<tr >
			
			<input type="number" name="rightans"placeholder="Curret Answer"><br>
		</tr>
		<tr >
			<input type="submit" name="submit"><br>
		</tr>
	
	     
	</table>

</tbody>
</form>
</div>
<?php include 'inc/footer.php'; ?>