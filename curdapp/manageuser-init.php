<?php
function pr($dt) { echo'<pre>';print_r ($dt);}
$dbConObj = new mysqli(DATABASE_CONFIG['HOST'], DATABASE_CONFIG['USR'], DATABASE_CONFIG['PASS'], DATABASE_CONFIG['DB_NAME']);
//Start - create operation code
$errorsString = '';
if (!empty($_POST)) {
    // step 1:  validate posted data
    $errors = [];
    if ($_POST['name'] == '') {
        $errors[] = 'Name is required';
    }
    if ($_POST['email'] == '') {
        $errors[] = 'Email is required field';
    }
    if ($_POST['pwd'] == '') {
        $errors[] = 'Password is required';
    }
    if (!empty($errors)) {
        $errorsString = implode("<br>", $errors);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $datetime = date('Y-m-d H:i:s');

    // step 2:  save data into database
    if (!empty($dbConObj->connect_error)) {
        echo "Connection error: " . $dbConObj->connect_error;exit;
    }
    
    $sql = "INSERT INTO `users` 
    (`name`, `email`, `pwd`, `is_active`, `created`) VALUES
    ('$name', '$email', '$pwd', 1, '$datetime')";
    $isUserAdded = $dbConObj->query($sql);
    
    if ($isUserAdded === true) {
        header('Location: index.php');
    }
}
//End - create operation code
$dbConObj->close();
?>