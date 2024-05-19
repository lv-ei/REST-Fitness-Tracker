<?php
include '../connect.php'; // Adjust the path as necessary

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$delete_username = $input['delete_username'] ?? '';

if (empty($delete_username)) {
    http_response_code(400);
    echo json_encode(['message' => 'Username is required.']);
    exit();
}

$delete_query = "DELETE FROM users WHERE USname = ?";
$stmt = mysqli_prepare($conn, $delete_query);
mysqli_stmt_bind_param($stmt, 's', $delete_username);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['message' => 'User deleted successfully.']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Error deleting user: ' . mysqli_error($conn)]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
