<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <link rel="stylesheet" href="Asset/ckeditor5_col/styles.css">
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .admin {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .admin-sidebar {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            max-width: 250px;
        }
        .admin-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 3;
            margin-left: 20px;
        }
        .admin-content-main-title h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }
        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        .main-btn {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .main-btn:hover {
            background-color: #555;
        }
        .admin-sidebar ul {
            list-style: none;
            padding: 0;
        }
        .admin-sidebar ul li {
            margin-bottom: 10px;
        }
        .admin-sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .admin-sidebar ul li a:hover {
            background-color: #f0f0f0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .change-btn, .delete-btn {
            color: white;
            cursor: pointer;
            text-decoration: none;
        }
        .delete-btn {
            color: white;
        }
        .change-btn:hover, .delete-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section class="admin">
        <div class="row-grid" style="display: flex;">
            <div class="admin-sidebar">
                <div class="admin-sidebar-top">
                    <img src="assets/img/logo/logo.png" alt="Logo" style="max-width: 100%;">
                </div>
                <div class="admin-sidebar-content">
                    <ul>
                        <li><a href="#"><i class="ri-dashboard-line"></i>Dashboard<i class="ri-add-box-line"></i></a>
                            <ul class="sub-menu">
                                <div class="sub-menu-item">
                                    <li><a href="list.php"><i class="ri-arrow-right-s-fill"></i>User List</a></li>
                                    <li><a href="feedback.php"><i class="ri-arrow-right-s-fill"></i>Feedback Management</a></li>
                                </div>
                            </ul>
                        </li>
                        <li><a href="#"><i class="ri-file-list-line"></i>Manage Courses<i class="ri-add-box-line"></i></a>
                            <ul class="sub-menu">
                                <div class="sub-menu-item">
                                    <li><a href="courses_list.php"><i class="ri-arrow-right-s-fill"></i>Course List</a></li>
                                    <li><a href="new_courses.php"><i class="ri-arrow-right-s-fill"></i>Add new course</a></li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="admin-content">
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <h1>USER LIST</h1>
                    </div>
                    <div class="admin-content-main-content">
                        <form id="add-user-form">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="USname" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone number:</label>
                                <input type="text" id="phone" name="USphone" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="USemail" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="USpassword" required>
                            </div>
                            <button type="submit" class="main-btn">Add User</button>
                        </form>
                        <table id="user-table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Phone numbers</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- User rows will be populated here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        function fetchUsers() {
            $.ajax({
                url: 'fetch_users.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const tbody = $('#user-table tbody');
                    tbody.empty();
                    data.forEach(user => {
                        const row = `<tr>
                            <td>${user.USname}</td>
                            <td>${user.USphone}</td>
                            <td>${user.USemail}</td>
                            <td>${user.USpassword}</td>
                            <td>
                                <a class="change-btn" href="edit_profile.php?username=${user.USname}">Change</a> |
                                <button class="delete-btn" data-username="${user.USname}">Delete</button>
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                },
                error: function(error) {
                    alert('Error fetching users.');
                }
            });
        }

        // Add user
        $('#add-user-form').on('submit', function(event) {
            event.preventDefault();
            const formData = {
                USname: $('#username').val(),
                USphone: $('#phone').val(),
                USemail: $('#email').val(),
                USpassword: $('#password').val()
            };
            $.ajax({
                url: 'api/add_user.php',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(formData),
                success: function(response) {
                    alert(response.message);
                    fetchUsers();
                },
                error: function(error) {
                    alert('Error adding user.');
                }
            });
        });

        // Delete user
        $(document).on('click', '.delete-btn', function() {
            const username = $(this).data('username');
            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: 'api/delete_user.php',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ delete_username: username }),
                    success: function(response) {
                        alert(response.message);
                        fetchUsers();
                    },
                    error: function(error) {
                        alert('Error deleting user.');
                    }
                });
            }
        });

        // Initial fetch of users
        fetchUsers();
    </script>
</body>
</html>
