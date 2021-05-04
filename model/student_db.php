<?php

function register_student ($stu_id, $stu_name, $stu_gender, $stu_birthday,
                           $stu_email, $stu_password)
{
    global $db;
    $query = 'INSERT INTO students
              (student_id,student_name, student_gender, student_birthday,
               student_email, student_password)
             Values (:stu_id, :stu_name, :stu_gender, :stu_birthday, :stu_email,
                     :stu_password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':stu_id', $stu_id);
    $statement->bindValue(':stu_name', $stu_name);
    $statement->bindValue(':stu_gender', $stu_gender);
    $statement->bindValue(':stu_birthday', $stu_birthday);
    $statement->bindValue(':stu_email', $stu_email);
    $statement->bindValue(':stu_password', $stu_password);
    $statement->execute();
    $statement->closeCursor();
}

function get_student_by_id($stu_id) 
{
    global $db;
    $query = 'SELECT * FROM students
              WHERE student_id = :stu_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':stu_id', $stu_id);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    return $student;
}

