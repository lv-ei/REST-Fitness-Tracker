<?php
header("Content-Type: application/json");
include '../connect.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

switch($requestMethod) {
    case 'GET':
        if (isset($_GET['id'])) {
            $feedbackId = $_GET['id'];
            getFeedback($feedbackId);
        } else {
            getAllFeedback();
        }
        break;
    case 'POST':
        addFeedback();
        break;
    case 'PUT':
        updateFeedback();
        break;
    case 'DELETE':
        deleteFeedback();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getAllFeedback() {
    global $conn;
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);
    $feedbacks = array();
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
    echo json_encode($feedbacks);
}

function getFeedback($id) {
    global $conn;
    $sql = "SELECT * FROM feedback WHERE Fid = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(array("message" => "Feedback not found"));
    }
}

function addFeedback() {
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    $usname = $data['usname'];
    $usemail = $data['usemail'];
    $mess = $data['mess'];
    $status = $data['status'];
    $sql = "INSERT INTO feedback (Fname, Femail, mess, status, Fdate) VALUES ('$usname', '$usemail', '$mess', '$status', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Feedback added successfully"));
    } else {
        echo json_encode(array("message" => "Error adding feedback: " . $conn->error));
    }
}

function updateFeedback() {
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $status = $data['status'];
    $sql = "UPDATE feedback SET status = '$status', checkDate = NOW() WHERE Fid = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Feedback updated successfully"));
    } else {
        echo json_encode(array("message" => "Error updating feedback: " . $conn->error));
    }
}

function deleteFeedback() {
    global $conn;
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $sql = "DELETE FROM feedback WHERE Fid = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Feedback deleted successfully"));
    } else {
        echo json_encode(array("message" => "Error deleting feedback: " . $conn->error));
    }
}

$conn->close();
?>
