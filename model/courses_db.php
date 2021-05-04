<?php

function getCourses()
{
    global $db;
    $query = 'SELECT * FROM courses
              ORDER BY course_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
    
}

function get_courses_by_instructor($cor_instructor)
{
    global $db;
    $query = 'SELECT * FROM courses
              WHERE course_instructor = :cor_instructor
              ORDER BY course_instructor';
    try
    {
    $statement = $db->prepare($query);
    $statement->bindValue(':cor_instructor', $cor_instructor);
    $statement->execute();
    $courses = $statement->fetchAll();
    $statement->closeCursor();
    return $courses;
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../error/database_error.php');
        exit();
    }
}

function get_course_by_id($cor_id) 
{
    global $db;
    $query = 'SELECT * FROM courses
              WHERE course_id = :cor_id';
    try
    {
    $statement = $db->prepare($query);
    $statement->bindValue(':cor_id', $cor_id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        
    }
}

function get_course_by_name($cor_name) 
{
    global $db;
    $query = 'SELECT * FROM courses
              WHERE course_name = :cor_name';
    try
    {
    $statement = $db->prepare($query);
    $statement->bindValue(':cor_name', $cor_name);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    return $course;
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        
    }
}

function enroll_student($stu_id, $cor_id)
{
    global $db;
    $query = 'INSERT INTO students (enrolled_courses)
             WHERE student_id = :stu_id
            VALUE $cor_id';
    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(':stu_id', $stu_id);
        $statement->bindValue(':cor_id', $cor_id);
        $statement->execute();
        $statement->closeCursor();
    } 
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
    }
}