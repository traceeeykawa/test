<?php  include('index.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$studentno = $n['studentno'];
			$physics = $n['physics'];
			$chemistry = $n['chemistry'];
			$english = $n['english'];
			$biology = $n['biology'];
			$geography = $n['geography'];
			$average = $n['average'];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/reverse.css" rel="stylesheet">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	
	<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Student No</th>
				<th>Physics</th>
				<th>Chemistry</th>
                <th>English</th>
                <th>Biology</th>
                <th>Geography</th>
                <th>Average</th>

				<th colspan="2">Action</th>
			</tr>
		</thead>
		
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['studentno']; ?></td>
				<td><?php echo $row['physics']; ?></td>
				<td><?php echo $row['chemistry']; ?></td>
				<td><?php echo $row['english']; ?></td>
				<td><?php echo $row['biology']; ?></td>
				<td><?php echo $row['geography']; ?></td>
				<td><?php echo $row['average']; ?></td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>

	<form method="post" action="index.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Student Number</label>
			<input type="text" name="studentno" value="<?php echo $studentno; ?>">
		</div>
		<div class="input-group">
			<label>Physics</label>
			<input type="text" name="Physics" value="<?php echo $physics; ?>">
		</div>
		<div class="input-group">
			<label>Chemistry</label>
			<input type="text" name="chemistry" value="<?php echo $Chemistry; ?>">
		</div>
		<div class="input-group">
			<label>English</label>
			<input type="text" name="english" value="<?php echo $english; ?>">
		</div>
		<div class="input-group">
			<label>Biology</label>
			<input type="text" name="biology" value="<?php echo $biology; ?>">
		</div>
		<div class="input-group">
			<label>Geography</label>
			<input type="text" name="geography" value="<?php echo $geography; ?>">
		</div>
		<div class="input-group">
			<label>Average</label>
			<input type="text" name="geography" value="<?php echo $geography; ?>">
		</div>
		<div class="input-group">
		    <?php if ($update == true): ?>
	            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>

	<script src="js/jquery-1.10.2.min"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
</html>
