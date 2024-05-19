<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/edit_profile.css">
    <link rel="stylesheet" href="Asset/ckeditor5_col/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Course</title>
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
            display: flex;
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
        .admin-content-main-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .admin-content-main-title h1 {
            font-size: 2rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
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
        <div class="admin-sidebar">
            <div class="admin-sidebar-top">
                <img src="assets/img/logo/logo.png" alt="Logo" style="max-width: 100%;">
            </div>
            <div class="admin-sidebar-content">
                <ul>
                    <li>
                        <a href="admin.html">
                            <i class="ri-dashboard-line"></i>Dashboard<i class="ri-add-box-line"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="list.php"><i class="ri-arrow-right-s-fill"></i>User List</a></li>
                            <li><a href="feedback.php"><i class="ri-arrow-right-s-fill"></i>Feedback Management</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin.html">
                            <i class="ri-file-list-line"></i>Manage Courses<i class="ri-add-box-line"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="courses_list.php"><i class="ri-arrow-right-s-fill"></i>Course List</a></li>
                            <li><a href="new_courses.php"><i class="ri-arrow-right-s-fill"></i>Add new course</a></li>
                        </ul>
                    </li>
                    </ul>
            </div>
        </div>
        <div class="admin-content">
            <div class="admin-content-main">
                <div class="admin-content-main-title">
                    <h1>EDIT COURSE</h1>
                </div>
                <div class="admin-content-main-content">
                    <div class="admin-content-main">
                        <form id="edit-course-form">
                            <div class="form-group">
                                <label for="cname">Course Name</label>
                                <input type="text" name="cname" id="cname" placeholder="Course Name">
                            </div>
                            <div class="form-group">
                                <label for="excercise">Number of Exercises</label>
                                <input type="text" name="excercise" id="excercise" placeholder="Number of Exercises">
                            </div>
                            <div class="form-group">
                                <label for="time">Exercise Duration</label>
                                <input type="text" name="time" id="time" placeholder="Exercise Duration">
                            </div>
                            <div class="form-group">
                                <label for="cate">Category</label>
                                <select name="cate" id="cate">
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Weight loss">Weight loss</option>
                                    <option value="Muscle gain">Muscle gain</option>
                                    <option value="Body building">Body building</option>
                                    <option value="Relaxing">Relaxing</option>
                                </select>
                            </div>
                            <button type="button" class="main-btn" id="save-btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const cname = urlParams.get('cname');

            if (cname) {
                $.ajax({
                    url: `api/courses.php?cname=${cname}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#cname').val(data.Cname);
                            $('#excercise').val(data.Cexcercise);
                            $('#time').val(data.Ctime);
                            $('#cate').val(data.Ccate);
                        }
                    },
                    error: function(error) {
                        alert('Error fetching course details.');
                    }
                });
            }

            $('#save-btn').click(function() {
                const courseData = {
                    cname: $('#cname').val(),
                    excercise: $('#excercise').val(),
                    time: $('#time').val(),
                    cate: $('#cate').val()
                };

                $.ajax({
                    url: 'api/courses.php',
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(courseData),
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(error) {
                        alert('Error updating course.');
                    }
                });
            });
        });
    </script>
</body>
</html>

