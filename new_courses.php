<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/add_course.css">
    <link rel="stylesheet" href="Asset/ckeditor5_col/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Add new course</title>
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

        .form-group input,
        .form-group select,
        .form-group textarea {
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
        <div class="row-grid">
            <div class="admin-sidebar">
                <div class="admin-sidebar-top">
                    <img src="assets/img/logo/logo.png">
                </div>
                <div class="admin-sidebar-content">
                    <ul>
                        <li><a href=""><i class="ri-dashboard-line"></i>Dashboard<i class="ri-add-box-line"></i></a>
                            <ul class="sub-menu">
                                <div class="sub-menu-item">
                                    <li><a href="list.php"><i class="ri-arrow-right-s-fill"></i>User List</a></li>
                                    <li><a href="feedback.php"><i class="ri-arrow-right-s-fill"></i>Feedback
                                            Management</a></li>
                                </div>
                            </ul>
                        </li>
                        <li><a href=""><i class="ri-file-list-line"></i>Manage Courses<i
                                    class="ri-add-box-line"></i></a>
                            <ul class="sub-menu">
                                <div class="sub-menu-item">
                                    <li><a href="courses_list.php"><i class="ri-arrow-right-s-fill"></i>Course List</a>
                                    </li>
                                    <li><a href="new_courses.php"><i class="ri-arrow-right-s-fill"></i>Add new
                                            course</a></li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="admin-content">
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <H1>ADD NEW COURSE</H1>
                    </div>
                    <div class="admin-content-main-content">
                        <!-- Nội dung nằm ở đây -->
                        <div class="admin-content-main-content-product-add">
                            <div class="admin-content-main">
                                <form id="add-course-form">
                                    <div class="form-group">
                                        <input type="text" name="cname" id="cname" placeholder="Course name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cexcercise" id="cexcercise"
                                            placeholder="Number of exercises">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="ctime" id="ctime" placeholder="Exercise Duration">
                                    </div>
                                    <div class="form-group">
                                        <select name="ccate" id="ccate">
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="Weight loss">Weight loss</option>
                                            <option value="Muscle gain">Muscle gain</option>
                                            <option value="Body building">Body building</option>
                                            <option value="Relaxing">Relaxing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="editor_content" name="cdes" id="cdes"
                                            placeholder="Description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" id="file" name="cimg">
                                    </div>
                                    <div class="form-group">
                                        <button class="main-btn" type="button" id="add-course-btn">Add course</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $('#add-course-btn').click(function () {
                var formData = new FormData();
                formData.append('cname', $('#cname').val());
                formData.append('cexcercise', $('#cexcercise').val());
                formData.append('ctime', $('#ctime').val());
                formData.append('ccate', $('#ccate').val());
                formData.append('cdes', $('#cdes').val());
                formData.append('file', $('#file')[0].files[0]);

                $.ajax({
                    url: 'api/add_course.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (error) {
                        alert('Error adding course.');
                    }
                });
            });
        });
    </script>
</body>

</html>