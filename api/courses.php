<?php
header("Content-Type: application/json");
include '../connect.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

switch ($requestMethod) {
    case 'GET':
        if (isset($_GET['cname'])) {
            getCourse($_GET['cname']);
        } else {
            getAllCourses();
        }
        break;
    case 'PUT':
        updateCourse();
        break;
    case 'POST':
        addCourse();
        break;
    case 'DELETE':
        deleteCourse();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode(["message" => "Request method not supported"]);
        break;
}

function getAllCourses() {
    global $conn;
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
    echo json_encode($courses);
}

function getCourse($cname) {
    global $conn;
    $sql = "SELECT * FROM courses WHERE Cname='$cname'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $course = $result->fetch_assoc();
        echo json_encode($course);
    } else {
        echo json_encode(["message" => "Course not found"]);
    }
}

function updateCourse() {
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    $cname = $data['cname'];
    $excercise = $data['excercise'];
    $time = $data['time'];
    $cate = $data['cate'];

    switch ($cate) {
        case "Weight loss":
            $clink = "weight_loss_b.html";
            break;
        case "Muscle gain":
            $clink = "muscle_gain_b.html";
            break;
        case "Body building":
            $clink = "body_building_b.html";
            break;
        case "Relaxing":
            $clink = "relaxing_b.html";
            break;
        default:
            $clink = "";
    }

    $sql = "UPDATE courses SET Cexercise='$excercise', Ctime='$time', Ccate='$cate', Clink='$clink' WHERE Cname='$cname'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Course updated successfully"]);
    } else {
        echo json_encode(["message" => "Error updating course: " . $conn->error]);
    }
}

function addCourse() {
    global $conn;
    $cname = $_POST['cname'];
    $cexcercise = $_POST['cexcercise'];
    $ctime = $_POST['ctime'];
    $ccate = $_POST['ccate'];
    $cdes = $_POST['cdes'];
    $file = $_FILES['file'];

    // Upload file
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    move_uploaded_file($file["tmp_name"], $targetFilePath);

    // Insert data into database
    $sql = "INSERT INTO courses (Cname, Cexercise, Ctime, Ccate, Cdes, Cpic) VALUES ('$cname', '$cexcercise', '$ctime', '$ccate', '$cdes', '$fileName')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Course added successfully"]);
    } else {
        echo json_encode(["message" => "Error adding course: " . $conn->error]);
    }
}

function deleteCourse() {
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    $cname = $data['cname'];

    $sql = "DELETE FROM courses WHERE Cname='$cname'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Course deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error deleting course: " . $conn->error]);
    }
}

$conn->close();
?>
