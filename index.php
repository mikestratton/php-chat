<?php
include 'db.php';

?>
<!DOCTYPE html>
<html>
	<head>
	<title>Ajax/PHP Chat - Udemy Course</title>
	<link rel="stylesheet" href="style.css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
<body>
<div id="container">
	<div id="chat_box">
	<?php
		$query = "SELECT * FROM chat ORDER BY id DESC";
		$run = $connect->query($query);
		
		while ($row = $run->fetch_array()) :
		
	?>
	
	
		<div id="chat_data">
			<span class="user"><?php echo $row['name']; ?> &#8594; </span>
			<span class="usr_chat"><?php echo $row['msg']; ?></span>
			<span class="time"><?php echo formatDate($row['time']); ?></span>
		</div>
		<?php endwhile; ?>
	</div>
	
	<form method="post" action="index.php">
	<input type="text" name="name" placeholder="enter your name" />
	<textarea name="msg" placeholder="enter message"></textarea>
	<input type="submit" name="submit" value="Send it" />
	</form>
	<?php 
	if(isset($_POST['submit'])){
		
		$name = $_POST['name'];
		$msg = $_POST['msg'];
		
		$query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
		
		$run = $connect->query($query);
		
		if($run) {
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true' />"; 
		}
	}
	
	
	?>
</div>

</body>
</html>