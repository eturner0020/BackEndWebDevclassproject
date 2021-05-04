<?php include '../webpage_design/header.php'; ?>

<main>
    
    <h2>Course Search</h2>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='display_courses_by_instructor'>
        <label>Instructor Name:</label>
        <input type='text' name='cor_instructor'
               value='<?php echo htmlspecialchars($cor_instructor); ?>'>
        <input type='submit' value='Search'>
    </form>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='display_course_by_id'>
        <label>Course ID:</label>
        <input type='text' name='cor_id'
               value='<?php echo htmlspecialchars($cor_id); ?>'>
        <input type='submit' value='Search'>
    </form>
    <form action='.' method='post'>
        <input type='hidden' name='action' value='display_course_by_name'>
        <label>Course Name</label>
        <input type='text' name='cor_name'
               value='<?php echo htmlspecialchars($cor_name); ?>'>
        <input type='submit' value='Search'>
    </form>
    
    <?php if(isset($message)): ?>
        <p><?php echo $message; ?></p>
    <?php elseif ($courses): ?>
        <h2>Results</h2>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Instructor</th>
                <th>Classroom</th>
                <th>Meeting Time</th>
            </tr>
            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo htmlspecialchars($course['course_id']); ?></td>
                <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                <td><?php echo htmlspecialchars($course['course_semester']); ?></td>
                <td><?php echo htmlspecialchars($course['course_instructor']); ?></td>
                <td><?php echo htmlspecialchars($course['course_classroom']); ?></td>
                <td><?php echo htmlspecialchars($course['course_time']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif($course): ?>
        <h2>Results</h2>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Instructor</th>
                <th>Classroom</th>
                <th>Meeting Time</th>
            </tr>
            <tr>
                <td><?php echo htmlspecialchars($course['course_id']); ?></td>
                <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                <td><?php echo htmlspecialchars($course['course_semester']); ?></td>
                <td><?php echo htmlspecialchars($course['course_instructor']); ?></td>
                <td><?php echo htmlspecialchars($course['course_classroom']); ?></td>
                <td><?php echo htmlspecialchars($course['course_time']); ?></td>
            </tr>
        </table>
    <?php endif; ?>

</main>