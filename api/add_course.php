<?php
include '../connect.php'; // Adjust the path as necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Move the uploaded file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $cname = mysqli_real_escape_string($conn, $_POST['cname']);
            $cexcercise = mysqli_real_escape_string($conn, $_POST['cexcercise']);
            $ccate = mysqli_real_escape_string($conn, $_POST['ccate']);
            $ctime = mysqli_real_escape_string($conn, $_POST['ctime']);
            $cdes = mysqli_real_escape_string($conn, $_POST['cdes']);
            $cimg = basename($_FILES["file"]["name"]);

            $query = "INSERT INTO courses (Cname, Cexcercise, Clink, Ccate, Ctime, Cdes, Cimg) 
                      VALUES ('$cname', '$cexcercise', '', '$ccate', '$ctime', '$cdes', '$cimg')";

            if (mysqli_query($conn, $query)) {
                $response = array("status" => "success", "message" => "Course added successfully.");
            } else {
                $response = array("status" => "error", "message" => "Error adding course: " . mysqli_error($conn));
            }
        } else {
            $response = array("status" => "error", "message" => "Sorry, there was an error uploading your file.");
        }
    } else {
        $response = array("status" => "error", "message" => "No file uploaded or file upload error.");
    }
    echo json_encode($response);
    mysqli_close($conn);
} else {
    $response = array("status" => "error", "message" => "Invalid request method.");
    echo json_encode($response);
}
?>
