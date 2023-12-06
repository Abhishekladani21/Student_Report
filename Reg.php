<?php
include "config.php";

$errors = array();

if (isset($_POST['submit'])) {
    $student_name = $_POST['studentName'];
    $roll_no = $_POST['rollNo'];
    $standard = $_POST['standard'];
    $dob = $_POST['dob'];
    $contact_no = $_POST['contactNumber'];
    $address = $_POST['address'];
    // Basic validation
    if (empty($student_name)) {
        $errors[] = "Student name is required";
    }

    if (empty($roll_no)) {
        $errors[] = "Roll number is required";
    }

    if (empty($standard)) {
        $errors[] = "Standard is required";
    }

    if (empty($dob)) {
        $errors[] = "Date of Birth is required";
    }

    if (empty($contact_no)) {
        $errors[] = "Contact number is required";
    }

    if (empty($address)) {
        $errors[] = "Address is required";
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        $sql = "INSERT INTO `users`(`studentName`, `rollNo`, `standard`, `dob`, `contactNumber`, `address`) VALUES ('$student_name','$roll_no','$standard','$dob','$contact_no','$address')";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("img/ed.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 5%;
            margin-right: 30%;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Student Registration</h3>
                    </div>
                    <div class="card-body">
                       
                        <form action="" method="post">
                            <?php
                          
                            if (!empty($errors)) {
                                echo '<div class="alert alert-danger">';
                                foreach ($errors as $error) {
                                    echo '<p>' . $error . '</p>';
                                }
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label for="studentName">Student Name:</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" required>
                            </div>
                            <div class="form-group">
                                <label for="rollNo">Roll No:</label>
                                <input type="text" class="form-control" id="rollNo" name="rollNo" required>
                            </div>
                            <div class="form-group">
                                <label for="standard">Standard:</label>
                                <input type="text" class="form-control" id="standard" name="standard" required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="contactNumber">Contact Number:</label>
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-block">
                                <!-- <input class="btn btn-primary" type="submit" name="submit" value="Register"> -->
                                

                                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                <button class="btn btn-primary" type="button"><a href="login.php" class="text-light">Login</a></button>
                                <!-- <button type="submit" name="submit" class="btn btn-primary">Login</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html> 