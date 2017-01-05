<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>My chat App in PHP and SQL</title>
	<link href= "style.css" rel="stylesheet" media="all" />
	
</head>
<body>
    <div id="container">
    	<div id="chat_box">
    	<?php
     
             $query = "SELECT * FROM chat_app ORDER BY id ASC";
            $run = $con->query($query);

             while ($row = $run->fetch_array()) :
        ?>
        <div id="chat_data">
    	     <span style="color: green;"> <?php echo $row['name'];?></span>
    	     <span><?php echo $row['msg'];?></span>
    	     <span style="font-size: 70%; float: right; color: blue;"><?php echo formatDate($row['date']);?></span>
         </div>
<?php endwhile; ?>
    	</div>
    	<form method="POST" action="index.php">
    		<input type="text" name="name" placeholder="enter name">
    		<textarea name="msg" placeholder="enter message"></textarea>
    		<input type="submit" name="submit" value="Send">

    	</form>
    	<?php
    	    if (isset($_POST['submit'])) {
    	    	$name = $_POST['name'];
    	    	$msg = $_POST['msg'];
    	    	$query = "INSERT INTO chat_app (name,msg) VALUES ('$name', '$msg')";
    	    	$run = $con->query($query);
    	    	if ($run) {
    	    		echo "<embed loop = 'false' src='' hidden ='true' autoplay='true' />";
    	    	}

    	    }
    	?>
    </div>

</body>
</html>
