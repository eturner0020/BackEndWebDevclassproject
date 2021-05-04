<?php include '../webpage_design/header.php'; ?>

<main>
    <h1>Register Student</h1>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='register_student'>
        
        <label>Student ID:</label>
        <input type="text" name="stu_id"><br>
        
        <label>Full Name:</label>
        <input type="text" name="stu_name"><br>
        
        <label>Gender:</label>
        <input type="text" name="stu_gender"><br>
        
        <label>Birthdate:</label>
        <input type="text" name="stu_birthday"/>
        <label class="message">Use 'dd-mm-yyyy' format</label><br>
        
        <label>Email:</label>
        <input type="text" name="stu_email"><br>
        
        <label>Password:</label>
        <input type="text" name="stu_password"><br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Register Student"><br>
    </form>
</main>
