<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php require_once('config.php');?>
<?php require_once('header.php');?>
<?php require_once('manageuser-init.php');?>
<div class="container">
<?php if (!empty($errorsString)) { echo '<strong>Errors:</strong> <br>' . $errorsString;} ?>
<form action="" method="POST" enctype="multipart/form-data" novalidate>
    <div class="form-group">
      <label for="name">Name*:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $name?>">
    </div>
    <div class="form-group">
      <label for="email">Email*:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password*:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="<?php echo $pwd?>">
    </div>
    <div class="form-group">
      <label for="photo">Photo:</label>
      <input type="file" class="form-control" id="photo" placeholder="Enter photo" name="photo">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php require_once('footer.php');?>
</body>
</html>