<?php
require('../model/database.php');
require('../model/student_db.php');
require('../model/login_db.php');

session_start();

$loggedIn = $_SESSION['hasLoggedIn'];
$stuName = $_SESSION['stuName'];

$action = filter_input(INPUT_POST, 'action');
if($action === NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if($action === NULL)
    {
        $action = 'log_student_in';
    }
}
else 
{
    if(isset($loggedIn))
    {
    echo "Hello, ".$stuName.". <form action='.' method=post>".
    "<input type='hidden' id='action' name='action' value='logout'/>".
    "<input type='submit' value='Logout'/></form>";
    }
}

    if($action == 'log_student_in')
    {
    $stu_id = filter_input(INPUT_POST, "stu_id");
    $stu_email = filter_input(INPUT_POST, "stu_email");
    $stu_password = filter_input(INPUT_POST, "stu_password");
    $result = login($stu_id, $stu_email, $stu_password);
        if($result == 1)
        {
            echo "Logged in. <br> <a href='.'>Back</a>";
            $_SESSION['hasLoggedIn'] = true;
            $stuName = get_student_name_by_ID($stu_id);
            $_SESSION['stuName'] = $stuName;
        }
        else
        {
            include('log_student_in.php');
        }
    }
    else if($action == 'logout')
    {
    unset($_SESSION['hasLoggedIn']);
    unset($_SESSION['stuName']);
    header('Location: /class_project/index.php');
    }

?>
