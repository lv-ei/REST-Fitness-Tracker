<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <title>Courses List</title>
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
            padding: 5px 10px;
            border-radius: 4px;
        }
        .change-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .change-btn:hover, .delete-btn:hover {
            opacity: 0.8;
        }
        .actions {
            display: flex;
            gap: 10px;
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
                        <h1>COURSES LIST</h1>
                    </div>
                    <div class="admin-content-main-content">
                        <table id="courses-table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Number of Exercises</th>
                                    <th>Exercise Duration</th>
                                    <th>Category</th>
                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
        function fetchCourses() {
            $.ajax({
                url: 'api/courses.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const tbody = $('#courses-table tbody');
                    tbody.empty();
                    data.forEach(course => {
                        const row = `<tr>
                            <td>${course.Cname}</td>
                            <td>${course.Cexercise}</td>
                            <td>${course.Ctime}</td>
                            <td>${course.Ccate}</td>
                            <td>
                                <div class="actions">
                                    <a class="change-btn" href="edit_course.php?cname=${course.Cname}">Change</a>
                                    <button class="delete-btn" data-cname="${course.Cname}">Delete</button>
                                </div>
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                },
                error: function(error) {
                    alert('Error fetching courses.');
                }
            });
        }

        $(document).on('click', '.delete-btn', function() {
            const cname = $(this).data('cname');
            $.ajax({
                url: 'api/courses.php',
                method: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify({ cname: cname }),
                success: function(response) {
                    alert(response.message);
                    fetchCourses();
                },
                error: function(error) {
                    alert('Error deleting course.');
                }
            });
        });

        fetchCourses();
    </script>
</body>
</html>
