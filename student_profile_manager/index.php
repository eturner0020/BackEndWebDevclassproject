<?php

require('../model/database.php');
require('../model/student_db.php');
require('../model/courses_db.php');

$action = filter_input(INPUT_POST,'action');
if($action === NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if($action === NULL)
    {
        $action = 'view_student_menu';
    }
}

$stu_id = '';
$student = '';

if($action == 'view_student_menu')
{
    include('student_menu.php');
}

if($action == 'view_student_info')
{
    $stu_id = filter_input(INPUT_POST, 'stu_id');
    if(empty($stu_id))
    {
        $message = 'Please enter a valid student ID';
    }
    else
    {
    $student = get_student_by_id($stu_id);
    }
    include('display_student_info.php');
}

if($action = 'view_enrolled_courses')
{
    $stu_id = filter_input(INPUT_POST, 'stu_id');
    if(empty($stu_id))
    {
        $message = 'Please enter a valid student ID';
    }
    else
    {
        $courses = get_enrolled_courses($stu_id);
    }
}
