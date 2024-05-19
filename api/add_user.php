<?php
include '../connect.php'; // Adjust the path as necessary

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['USname'] ?? '';
$phone = $input['USphone'] ?? '';
$email = $input['USemail'] ?? '';
$password = $input['USpassword'] ?? '';

if (empty($username) || empty($phone) || empty($email) || empty($password)) {
    http_response_code(400);
    echo json_encode(['message' => 'All fields are required.']);
    exit();
}

$add_query = "INSERT INTO users (USname, USphone, USemail, USpassword) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $add_query);
mysqli_stmt_bind_param($stmt, 'ssss', $username, $phone, $email, $password);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['message' => 'User added successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Error adding user: ' . mysqli_error($conn)]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
