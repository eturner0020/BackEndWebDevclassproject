<?php

require('../model/database.php');
require('../model/courses_db.php');

$cor_instructor = '';
$courses = array();
$cor_id = '';
$course = '';
$cor_name = '';
$stu_id = '';

$action = filter_input(INPUT_POST, 'action');
if($action === NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL)
    {
        $action = 'show_all_courses';
    }
}

if($action == 'show_all_courses')
{
    $courses = getCourses();
    include('course_list.php');
}

elseif($action == 'search_courses')
{
    include('search_courses.php');
}

elseif($action == 'display_courses_by_instructor')
{
    $cor_instructor = filter_input(INPUT_POST, 'cor_instructor');
    if(empty($cor_instructor))
    {
        $message = 'You must enter a course instructor.';
    }
    else
    {
    $courses = get_courses_by_instructor($cor_instructor);
    }
    include('search_courses.php');
}

elseif($action == 'display_course_by_id')
{
    $cor_id = filter_input(INPUT_POST, 'cor_id');
    if(empty($cor_id))
    {
        $message = 'You must enter a valid course id';
    }
    else
    {
        $course = get_course_by_id($cor_id);
    }
    include('search_courses.php');
}

elseif($action == 'display_course_by_name')
{
    $cor_name = filter_input(INPUT_POST, 'cor_name');
    if(empty($cor_name))
    {
        $message = 'You must enter a valid course name';
    }
    else
    {
        $course = get_course_by_name($cor_name);
    }
    include('search_courses.php');
}

elseif($action == 'enroll_student')
{
    $stu_id = filter_input(INPUT_POST, 'stu_id');
    $cor_id = filter_input(INPUT_POST, 'cor_id');
    if(empty($stu_id))
    {
        $message = 'You must enter a valid student id.';
    }
    else 
    {
        enroll_student($stu_id, $cor_id);
    }
    include('course_list.php');
}