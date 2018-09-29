<?php
if (isset($_GET['logout'])) {
    unset($_SESSION['User']);
    header('Location: login.php');  
}
$dbConObj = new mysqli(DATABASE_CONFIG['HOST'], DATABASE_CONFIG['USR'], DATABASE_CONFIG['PASS'], DATABASE_CONFIG['DB_NAME']);
if (!empty($dbConObj->connect_error)) {
    echo "Connection error: " . $dbConObj->connect_error;
    exit;
}
$errorsString = '';
$email = $pwd = '';
if (!empty($_POST)) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $sqlGetUser = "SELECT * FROM users where email = '$email' AND pwd = '$pwd'";
    $userDtls = $dbConObj->query($sqlGetUser)->fetch_assoc();
    if (!empty($userDtls)) {
        // do login
        $_SESSION['User'] = $userDtls;
        header('Location: index.php');
    } else {
        // display error
        $errorsString = 'Invalid login credentials';
    }
}
?>