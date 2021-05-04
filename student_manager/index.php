<?php
require('../model/database.php');
require('../model/student_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL)
    {
        $action = 'show_registry_form';
    }
}

switch($action)
{
    case 'show_registry_form':
        include('student_registery.php');
        break;
    
    case 'register_student':
        $stu_id = filter_input(INPUT_POST,'stu_id');
        $stu_name = filter_input(INPUT_POST, 'stu_name');
        $stu_gender = filter_input(INPUT_POST, 'stu_gender');
        $stu_birthday = filter_input(INPUT_POST, 'stu_birthday');
        $stu_email = filter_input(INPUT_POST, 'stu_email');
        $stu_password = filter_input(INPUT_POST, 'stu_password');

    if ($stu_id === NULL || $stu_name === NULL || $stu_gender === NULL ||
        $stu_birthday === NULL || $stu_email === NULL || $stu_password === NULL)
    {
        $error = 'Invalid student data. Check all fields and try again.';
        include('../error/error.php');
    }
    else 
    {
        register_student($stu_id, $stu_name, $stu_gender, $stu_birthday,
                         $stu_email, $stu_password);
        header("Location: .");
    }
}

?>


