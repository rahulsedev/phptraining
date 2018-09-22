<?php
function pr($dt) { echo'<pre>';print_r ($dt);}
$dbConObj = new mysqli(DATABASE_CONFIG['HOST'], DATABASE_CONFIG['USR'], DATABASE_CONFIG['PASS'], DATABASE_CONFIG['DB_NAME']);
$usersList = [];
// Start - read operation
$readQuery = "SELECT * from users order by id desc";
$userData = $dbConObj->query($readQuery);
if ($userData->num_rows > 0) {
  while($row = $userData->fetch_assoc()) {
    $usersList[] = $row;
  }
}
// End - read operation
$dbConObj->close();
?>