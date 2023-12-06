<?php
include "config.php";

if (isset($_POST['update'])) {
    $student_name = $_POST['studentName'];
    $user_id = $_POST['user_id'];
    $roll_no = $_POST['rollNo'];
    $standard = $_POST['standard'];
    $dob = $_POST['dob'];
    $contact_no = $_POST['contactNumber'];
    $address = $_POST['address'];

    $sql = "UPDATE `users` SET `studentName` = '$student_name', `rollNo` = '$roll_no', `standard` = '$standard', `dob` = '$dob', `contactNumber` = '$contact_no', `address` = '$address' WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        header('Location: index.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_name = $row['studentName'];
            $roll_no = $row['rollNo'];
            $standard = $row['standard'];
            $dob = $row['dob'];
            $contact_no = $row['contactNumber'];
            $address = $row['address'];
            $id = $row['id'];
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Student Update Form</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
                body {
                    background-color: #f8f9fa;
                }

                form {
                    max-width: 600px;
                    margin: 50px auto;
                    background-color: #fff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                }

                h2 {
                    text-align: center;
                    font-size: 36px;
                    color: #007bff;
                    margin-bottom: 30px;
                }

                fieldset {
                    border: 2px solid #007bff;
                    padding: 20px;
                    border-radius: 10px;
                    margin-bottom: 20px;
                }

                legend {
                    text-align: center;
                    font-size: 24px;
                    color: #007bff;
                    margin-bottom: 20px;
                }

                input[type="text"]{
                    width: 100%;
                    padding: 12px;
                    margin-bottom: 20px;
                    border: none;
                    border-radius: 5px;
                    background-color: #f5f5f5;
                    color: #333;
                }

                input[type="submit"] {
                    background-color: #007bff;
                    color: #fff;
                    padding: 15px 30px;
                    border: none;
                    border-radius: 8px;
                    cursor: pointer;
                    font-size: 18px;
                }

                input[type="submit"]:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>

        <body>
            <form action="" method="post">
                <h2>Student Update Form</h2>
                <fieldset>
                    <legend>Personal Information:</legend>

                    Student Name<br>
                    <input type="text" name="studentName" value="<?php echo $student_name; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    <br>

                    Roll No:<br>
                    <input type="number" name="rollNo" value="<?php echo $roll_no; ?>">
                    <br>

                    Standard:<br>
                    <input type="text" name="standard" value="<?php echo $standard; ?>">
                    <br>

                    Date Of Birth:
                    <input type="date" name="dob" value="<?php echo $dob; ?>">
                    <br><br>

                    Contact Number:
                    <input type="number" name="contactNumber" value="<?php echo $contact_no; ?>">
                    <br><br>

                    Address:<br>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <br>

                    <input type="submit" value="Update" name="update">
                </fieldset>
            </form>
        </body>

        </html>
<?php
    } else {
        header('Location: Reg.php');
    }
}
?>