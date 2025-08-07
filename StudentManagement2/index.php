<?php
use Cualbar\StudentManagement2\Core\Database;
use Cualbar\StudentManagement2\Model\StudentModel;

include 'vendor/autoload.php';

$db = new Database;
$student = new StudentModel;

// Handle form actions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $student->id = $_POST['id'];
                $student->fullname = $_POST['fullname'];
                $student->yearlevel = $_POST['yearlevel'];
                $student->course = $_POST['course'];
                $student->section = $_POST['section'];
                $student->create();
                
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();

                break;
            
        
    

            case 'update':
                $student->id = $_POST['id'];
                $student->fullname = $_POST['fullname'];
                $student->yearlevel = $_POST['yearlevel'];
                $student->course = $_POST['course'];
                $student->section = $_POST['section'];
                $student->update();
                break;
                
            case 'delete':
                $student->id = $_POST['id'];
                $student->delete();

                header("Location: " . $_SERVER['PHP_SELF']);
                exit();

                break;
        }
    }
}


$students = $student->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
</head>
<body>
    <h1>Student Management System</h1>
    <form method="POST" action="index.php"><br>
        <input type="text" name="id" placeholder="Enter student ID" required><br>
        <input type="text" name="fullname" placeholder="Enter student name" required><br>
        <input type="text" name="yearlevel" placeholder="Enter year level" required><br>
        <input type="text" name="course" placeholder="Enter course" required><br>
        <input type="text" name="section" placeholder="Enter section" required><br>

        <input type="submit" name="action" value="create">
        <input type="submit" name="action" value="read">
        <input type="submit" name="action" value="update">
      
    </form>

    <br>
    <form method="POST" action="index.php"> 
        <input type="hidden" name="action" value="delete"> <br>
        <input type="text" name="id" placeholder="Enter student ID to delete" required> <br>
        <input type="submit" value="Delete Student"> 
    </form>
   
<div id="students">
    <?php
    if (isset($students)) {
        echo "<h3>Student List</h3>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year Level</th>
                <th>Course</th>
                <th>Section</th>
              </tr>";
            
        foreach ($students as $student) {
            echo "<tr>
                    <td>{$student['id']}</td>
                    <td>{$student['name']}</td>
                    <td>{$student['year_level']}</td>
                    <td>{$student['course']}</td>
                    <td>{$student['section']}</td>
                  </tr>";
        }
        echo "</table>";
    }
    ?>
</div>


</body>
</html>

