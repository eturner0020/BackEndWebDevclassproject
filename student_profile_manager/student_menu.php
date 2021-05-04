<?php include '../webpage_design/header.php'; ?>

<main>
    <h2>Student Menu</h2>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='view_student_info'>
        <label>View Student Profile</label>
        <input type='submit' value='Select'>
    </form>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='view_enrolled_courses'>
        <label>View Enrolled Courses</label>
        <input type='submit' value='Select'>
    </form>
    
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php elseif ($student) : ?>
        <h2>Results</h2>
        <table>
            <tr>
                <th>Student ID:</th>
                <th>Student Name:</th>
                <th>Student Gender:</th>
                <th>Student Birthday:</th>
                <th>Student Email:</th>
                <th>Student Password:</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                <td><?php echo htmlspecialchars($student['student_name']); ?></td>
                <td><?php echo htmlspecialchars($student['student_gender']); ?></td>
                <td><?php echo htmlspecialchars($student['student_birthday']); ?></td>
                <td><?php echo htmlspecialchars($student['student_email']); ?></td>
                <td><?php echo htmlspecialchars($student['student_password']); ?></td>
            </tr>
        </table>
    <?php endif; ?>
</main>
