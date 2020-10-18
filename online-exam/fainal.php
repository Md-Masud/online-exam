<?php include 'inc/header.php'; ?>
<?php include_once 'lib/exam.php'?>
<?php include_once 'lib/Session.php'?>
<div class="main">
<h1>YOU ARE DONE</h1>
<div class="segment">
	<p>fainal score:
		<?php
		
			  $s=$_SESSION['sore'];
		
		echo $s;
		?>
	</p>
	<ul>
		<li><a href="view.php">View Answer</a></li>
		<li><a href="test.php">Again Start Now...</a></li>
	</ul>
	</div>
  </div>
<?php include 'inc/footer.php'; ?>