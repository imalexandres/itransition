<?php
$title="Authorization";
require_once "../structure/header.php";
require_once "../DB/db.php";
require_once "../DB/conn.php";



$data = $_POST;



if(isset($data['do_login'])) {

    $last_login = date('Y-m-d H:i');

    $errors = array();


    $user = R::findOne('users', 'email = ?', array($data['email']));

    if($user) {

        if(password_verify($data['password'], $user->password)) {

            $_SESSION['logged_user'] = $user;

            if ($_SESSION['logged_user']->status == 0) {

                $user->last_login = $last_login;
                R::store($user);

                header('Location: main.php');
            } else {

                $errors[] = 'This user is blocked!';
                unset($_SESSION['logged_user']);
            }
        } else {

            $errors[] = 'Wrong password!';

        }

    } else {
        $errors[] = 'User with this email does not exist';
    }

    if(!empty($errors)) {

        echo '<div class="text-center" style="color: red;">' . array_shift($errors). '</div><hr>';

    }

}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Authorization</h2>
            <form class="form-login" action="login.php" method="post">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required><br>
                <input type="password" class="form-control" name="password" id="pass" placeholder="Enter password" required><br>
                <button class="btn btn-success" name="do_login" type="submit">Login</button>
            </form>
            <br>
            <p>Sign-up <a href="signup.php">here</a>.</p>
        </div>
    </div>
</div>

<?php require_once '../structure/footer.php'; ?>