<?php include '../webpage_design/header.php'; ?>

<main>
    <h1>Course List</h1>
    <table>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Semester</th>
            <th>Instructor</th>
            <th>Classroom</th>
            <th>Meeting Time</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($courses as $course) : ?>
        <tr>
            <td><?php echo htmlspecialchars($course['course_id']); ?></td>
            <td><?php echo htmlspecialchars($course['course_name']); ?></td>
            <td><?php echo htmlspecialchars($course['course_semester']); ?></td>
            <td><?php echo htmlspecialchars($course['course_instructor']); ?></td>
            <td><?php echo htmlspecialchars($course['course_classroom']); ?></td>
            <td><?php echo htmlspecialchars($course['course_time']); ?></td>
            <td><form action='.' method='post'>
                    <input type='hidden' name='action' value='enroll_student'>
                    <input type='hidden' name='stu_id'
                           value='<?php echo htmlspecialchars($student['stu_id']); ?>'>
                    <input type='hidden' name='cor_id'
                           value='<?php echo htmlspecialchars($course['cor_id']); ?>'>
                    <input type='submit' value='Enroll'>
                </form>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <h1>Go to Course Search Page</h1>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='search_courses'>
        <input type='submit' value='Go To Search'>
    </form>
</main>
