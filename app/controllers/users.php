<?php
    echo $_POST['username'];
    // include 'app/db/db.php';
    // if(isset($_POST['signup_submit'])){

    //     $errors = array();
    //     if(empty($_POST['username'])){
    //         array_push($errors, 'Username is required');
    //     }

    //     if(empty($_POST['email'])){
    //         array_push($errors, 'Email is required');
    //     }

    //     if(empty($_POST['password'])){
    //         array_push($errors, 'Password is required');
    //     }

    //     if(empty($_POST['password'] !== $_POST['password2'])){
    //         array_push($errors, 'Password do not match');
    //     }

    //     if(count($errors) === 0){
    //         unset($_POST['password2'], $_POST['signup_submit']);
    //         $_POST['admin'] = 0;
    
    //         $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //         $user_id = createQuery('users', $_POST);
    //         $user = selectOne('users', ['id' => $user_id]);
    
    //         echo "<pre>", print_r($user), "</pre>";
    //         die();
    //     }

    // }
?>