<?php include 'inc/header.php'; ?>
<?php include_once 'lib/exam.php'?>
<?php include_once 'lib/Session.php'?>
<div class="main">
<h1>Welcome to Online Exam - Start Now</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/online_exam.png"/>
	</div>
	<?php
	Session::checkSession();
	$e=new exam();
	$t=$e->qrow();
	$rest=$e->test();
	?>
	<div class="segment">
	<h2>Start Test</h2>
	<ul>
		<li>TOTAL QUESTION: <?php echo $t ;?></li><br>
		<li><a href="test.php?q=<?php echo $rest->questionno;?>">Start Now...</a></li>
	</ul>
	</div>
  </div>
<?php include 'inc/footer.php'; ?>