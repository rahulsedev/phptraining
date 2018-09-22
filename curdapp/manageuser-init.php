<?php
function pr($dt) { echo'<pre>';print_r ($dt);}
$dbConObj = new mysqli(DATABASE_CONFIG['HOST'], DATABASE_CONFIG['USR'], DATABASE_CONFIG['PASS'], DATABASE_CONFIG['DB_NAME']);
if (!empty($dbConObj->connect_error)) {
    echo "Connection error: " . $dbConObj->connect_error;
    exit;
}
//Start - create operation code
$errorsString = '';
$name = $email = $pwd = '';
$create = true;
// handle edit case, detect user id from url
if (!empty($_GET['id'])) {
    $userId = $_GET['id'];
    if (!is_numeric($userId)) {
        echo "Bad request";
        exit;
    }
    // get user details
    $sqlGetUser = "SELECT `id`, `name`, `email` FROM users where id=$userId";
    $userDtls = $dbConObj->query($sqlGetUser)->fetch_assoc();
    $name = $userDtls['name'];
    $email = $userDtls['email'];
    $create = false;
}

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

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
    } else {
        $datetime = date('Y-m-d H:i:s');
        
        if ($create === true) {
            $sql = "INSERT INTO `users` 
            (`name`, `email`, `pwd`, `is_active`, `created`) VALUES
            ('$name', '$email', '$pwd', 1, '$datetime')";
        } else {
            $sql = "UPDATE users set name='$name', email='$email' where id='$userId'";
        }

        $isUserAdded = $dbConObj->query($sql);
        
        if ($isUserAdded === true) {
            header('Location: index.php');
        }
    }
}
//End - create operation code
$dbConObj->close();
?>