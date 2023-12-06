<?php
include "config.php";
$sql = "SELECT * FROM users ORDER BY id ";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sutdent Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
        }

        .btn-primary,
        .btn-info,
        .btn-danger,
        .btn-success {
            margin-right: 5px;
        }

        .table {
            margin-top: 20px;
            background-color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Student Records</h2>

        <a class="btn btn-success" href="Reg.php" role="button">Create New Record</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Standerd</th>
                    <th>Date Of Birth</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Changes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['studentName']; ?></td>
                            <td><?php echo $row['rollNo']; ?></td>
                            <td><?php echo $row['standard']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['contactNumber']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
