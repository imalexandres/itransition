<?php
$title="Registration";
require_once "../structure/header.php";
require_once "../DB/db.php";

$data = $_POST;

if(isset($data['do_signup'])) {

    $registration_date = date('Y-m-d H:i');
    $status = false;


    $errors = array();


    if(trim($data['email']) == '') {

        $errors[] = "Enter email";
    }


    if($data['name'] == '') {

        $errors[] = "Enter username";
    }



    if($data['password'] == '') {

        $errors[] = "Enter password";
    }

    if($data['password_2'] != $data['password']) {

        $errors[] = "password is different!";
    }


    if (mb_strlen($data['name']) < 2 ){

        $errors[] = "Invalid name";

    }


    if (mb_strlen($data['password']) < 1 ){

        $errors[] = "password must have at least 1 character";

    }


    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {

        $errors[] = 'Incorrect email';

    }



    if(R::count('users', "email = ?", array($data['email'])) > 0) {

        $errors[] = "User with this email already exists!";
    }
    if(R::count('users', "name = ?", array($data['name'])) > 0) {

        $errors[] = "User with this username already exists!";
    }


    if(empty($errors)) {


        $user = R::dispense('users');

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->registration_date = $registration_date;
        $user->status = $status;

        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);


        R::store($user);
        echo '<div style="color: green; ">You have successfully registered! You can <a href="login.php">log in</a>.</div><hr>';

    } else {

        echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
    }
}
?>


<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Registration</h2>
            <form class="form-login" action="" method="post">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required><br>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"><br>
                <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Repeat password"><br>
                <button class="btn btn-success" name="do_signup" type="submit">Sign-up</button>
            </form>
            <br>
            <p>Login <a href="login.php">here</a>.</p>

        </div>
    </div>
</div>
<?php require_once '../structure/footer.php';
?>


