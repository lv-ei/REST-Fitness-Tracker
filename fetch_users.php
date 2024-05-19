<?php
include 'connect.php'; // Connect to the database

$query = "SELECT * FROM users WHERE USname != 'admin'";
$result = mysqli_query($conn, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(["message" => "Error fetching users: " . mysqli_error($conn)]);
    exit();
}

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($users);
?>
