<?php
session_start();
$loged_in = false;
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id'] != '') {
        $loged_in = true;
    }
}
if (!$loged_in) {
    header('Location:' . 'login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <style>
            * {
                font-size: 16px;
                font-family: monospace !important;
            }
            .logout {
                text-decoration: none; 
                background-color: rgb(233, 0, 0); 
                color: white; 
                padding: 6px 12px; 
                box-shadow: 0px 1px 2px #8f8f8f; 
            }
        </style>
    </head>
    <body>
        <div>
            <p>
                Hello, 
                <?php
                echo $_SESSION['user_id'];
                ?>
                !
            </p>
        </div>
        <div>
            <a href="logout.php" 
               class="logout">
                LOGOUT
            </a>
        </div>
    </body>
</html>
<?php
exit();
