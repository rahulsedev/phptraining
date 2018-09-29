<?php
if (empty($_SESSION['User']) || !isset($_SESSION['User'])) {
    header('Location: login.php');  
}
$dbConObj = new mysqli(DATABASE_CONFIG['HOST'], DATABASE_CONFIG['USR'], DATABASE_CONFIG['PASS'], DATABASE_CONFIG['DB_NAME']);
if (!empty($dbConObj->connect_error)) {
    echo "Connection error: " . $dbConObj->connect_error;
    exit;
}
//Start - create operation code
$errorsString = '';
$name = $email = $pwd = $fileName = '';
$datetime = date('Y-m-d H:i:s');
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
    $newFileName = $userDtls['photo'];
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
        if (!empty($_FILES['photo']['name']) && !empty($_FILES['photo']['tmp_name'])) {
            if ($_FILES['photo']['error'] == 0) {
                $uploads_dir = 'photo';
                $source = $_FILES['photo']['tmp_name'];
                $fileName = $_FILES['photo']['name'];
                $fileAr = explode(".", $fileName);
                $fileExt = end($fileAr);
                unset($fileAr[count($fileAr) - 1]);
                $newFileName = $fileAr[0] . '-' . date('YmdHis') . '.' . $fileExt;
                $status = move_uploaded_file($source, "$uploads_dir/$newFileName");
            }
        }
        
        if ($create === true) {
            $sql = "INSERT INTO `users` 
            (`name`, `email`, `pwd`, `photo`, `is_active`, `created`) VALUES
            ('$name', '$email', '$pwd', '$newFileName', 1, '$datetime')";
        } else {
            $sql = "UPDATE users set name='$name', email='$email', photo='$newFileName' where id='$userId'";
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