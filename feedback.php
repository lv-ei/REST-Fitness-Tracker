<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <title>Feedback Management</title>
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
                        <h1>FEEDBACK MANAGEMENT</h1>
                    </div>
                    <div class="admin-content-main-content">
                        <table id="feedback-table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Received Date</th>
                                    <th>Check Date</th>
                                    <th>Action</th>
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
        function fetchFeedback() {
            $.ajax({
                url: 'api/feedback_db.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const tbody = $('#feedback-table tbody');
                    tbody.empty();
                    data.forEach(feedback => {
                        const rowClass = feedback.status === 'read' ? 'read' : 'unread';
                        const buttonClass = feedback.status === 'read' ? 'read-btn' : '';
                        const row = `<tr class="${rowClass}">
                            <td>${feedback.Fname}</td>
                            <td>${feedback.Femail}</td>
                            <td>${feedback.mess}</td>
                            <td>${feedback.status === 'read' ? 'Read' : 'Unread'}</td>
                            <td>${feedback.Fdate}</td>
                            <td>${feedback.checkDate}</td>
                            <td>
                                <button class="check-btn ${buttonClass}" data-id="${feedback.Fid}">Checked</button>
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                },
                error: function(error) {
                    alert('Error fetching feedback.');
                }
            });
        }

        $(document).on('click', '.check-btn', function() {
            const feedbackId = $(this).data('id');
            $.ajax({
                url: 'api/feedback_db.php',
                method: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify({ id: feedbackId, status: 'read' }),
                success: function(response) {
                    alert(response.message);
                    fetchFeedback();
                },
                error: function(error) {
                    alert('Error updating feedback.');
                }
            });
        });

        fetchFeedback();
    </script>
</body>
</html>
