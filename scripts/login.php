<?php
include('../init/overhead.php');

session_destroy();
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$uname = htmlspecialchars($uname);
$pass = htmlspecialchars($pass);

$user = new User();
try {
    $result = $user->login($uname, $pass);
    if ($result) {
        $user->initializeUser();
        $role = $user->getRole();
        switch ($role){
            case UserRole::MachineUser:
                header('location: /users/regular/dashboard.php');    //redirect to login page
                break;
            case UserRole::Administrator:
                header('location: /users/admin/dashboard.php');    //redirect to login page
                break;
            case UserRole::SysAdmin:
                header('location: /users/sysadmin/dashboard.php');    //redirect to login page
                $role = True;
                break;
            default:
                throw new Exception("Invalid Role");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage(); # Todo
    echo "Login Error. Please try again.";
}

?>