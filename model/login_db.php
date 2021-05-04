<?php

require('database.php');

function login($stu_id, $stu_email, $stu_password)
{
    global $db;
    $query = 'SELECT COUNT(*) as result FROM students
              WHERE (student_id = :stu_id AND student_password = :stu_password)
              OR (student_email = :stu_email AND student_password = :stu_password)';
    
    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(':stu_id', $stu_id);
        $statement->bindValue(':stu_password', $stu_password);
        $statement->bindValue(':stu_email', $stu_email);
        $statement->bindValue(':stu_password', $stu_password);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        return $results['result'];
    } 
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
        include ('../error/database_error.php');
        exit();
    }
}

function get_student_name_by_ID($stu_id)
{
    global $db;
    $query = 'SELECT student_name
              FROM students WHERE student_id = ?';
    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(1, $stu_id);
        $statement->execute();
        $results = $statement->fetch();
        $statement->closeCursor();
        return $results['student_name'];
    } 
    catch (PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../error/database_error.php');
        exit();
    }
}
?>
