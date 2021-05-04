<?php include '../webpage_design/header.php'; ?>
<main>
    <h2>Student Login</h2>
    <form action="." method='post'>
        <input type='hidden' name='action' value='log_student_in'>
        <label>Student ID:</label>
        <input type='text' name='stu_id'
               value="<?php echo htmlspecialchars($stu_id); ?>">
        <br>
        <label>Email:</label>
        <input type='text' name='stu_email'
               value="<?php echo htmlspecialchars($stu_email); ?>">
        <br>
        <label>Password:</label>
        <input type='password' name='stu_password'
               value="<?php echo htmlspecialchars($stu_password); ?>">
        <br>
        <input type='submit' value='Login'/>
    </form>
</main>
