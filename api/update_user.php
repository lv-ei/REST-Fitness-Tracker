<?php
include '../connect.php'; // Adjust the path as necessary

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$username = $input['username'] ?? '';
$phone = $input['phone'] ?? '';
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';

if (empty($username)) {
    http_response_code(400);
    echo json_encode(['message' => 'Username is required.']);
    exit();
}

$query = "UPDATE users SET USphone=?, USemail=?, USpassword=? WHERE LOWER(USname) = LOWER(?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ssss', $phone, $email, $password, $username);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['message' => 'User updated successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Error updating user: ' . mysqli_error($conn)]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
