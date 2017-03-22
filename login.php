<?php
session_start();
$loged_in = false;
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id'] != '') {
        $loged_in = true;
    }
}
if ($loged_in) {
    header('Location:' . 'index.php');
    exit();
}

/* example */
$user_id = 'user1';
$password = 'p455word';

$error_message = '';
if (isset($_POST['btn_login'])) {
    if (isset($_POST['input_id'])) {
        if ($_POST['input_id'] == $user_id) {
            if (isset($_POST['input_password'])) {
                if ($_POST['input_password'] == $password) {
                    $_SESSION['user_id'] = $_POST['input_id'];
                    header('Location:' . 'login.php');
                    exit();
                } else {
                    $error_message = 'Sorry: Wrong Password';
                }
            }
        } else {
            $error_message = 'Sorry: Wrong User ID';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <style>
            * {
                font-size: 16px;
                font-family: monospace !important;
            }
            .login {
                text-decoration: none; 
                background-color: rgb(0, 3, 231);
                color: #ffffff; 
                padding: 6px 12px; 
                box-shadow: 0px 1px 2px #8f8f8f; 
                cursor: pointer;
                border: none;
            }
        </style>
    </head>
    <body>
        <div style="border: dashed 1px #000000; padding: 8px;">
            <div>
                demo
            </div>
            <div>
                user id : <code>user1</code>
            </div>
            <div>
                password : <code>p455word</code>
            </div>
        </div>
        <br>
        <div>
            <?php
            echo $error_message;
            ?>
        </div>
        <br>
        <div>
            <form action="login.php" method="post">
                User ID
                <br>
                <input type="text" 
                       name="input_id" 
                       autofocus="" 
                       required="" />
                <br>
                <br>
                Password
                <br>
                <input type="password" 
                       name="input_password" 
                       required="" />
                <br>
                <br>
                <input type="submit" 
                       class="login"
                       name="btn_login" 
                       value="LOGIN" />
            </form>
        </div>
    </body>
</html>
<?php
exit();
