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
<?php require_once('index-init.php');?>
<div class="container">
<a style="float:right" href="manageuser.php">Add User</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php if (!empty($usersList)) {?>
      <?php foreach ($usersList as $key => $val) { ?>
        <tr>
        <th scope="row"><?php echo $key + 1?></th>
          <td><?php echo $val['name']?></td>
          <td><?php echo $val['name']?></td>
          <td><?php echo $val['is_active'] == 1 ? 'Active' : 'Inactive'?></td>
          <td><a href="manageuser.php?id=<?php echo $val['id']?>">Edit</a></td>
        </tr>
      <?php } ?>
    <?php } ?>
  </tbody>
</table>
</div>
<?php require_once('footer.php');?>
</body>
</html>