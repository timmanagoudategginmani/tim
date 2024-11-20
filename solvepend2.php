<?php
// Initialize variables to avoid undefined index notice
$username = $_POST['user'] ?? '';
$compid = $_POST['complaintnum'] ?? '';
$remark = $_POST['remark'] ?? '';
$status = $_POST['status'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($compid) && !empty($username)) {
    // Database connection parameters
    $servername = 'localhost';
    $db_username = 'root';
    $password = '';
    $dbname = 'project';

    // Establish database connection
    $conn = mysqli_connect($servername, $db_username, $password, $dbname);
    if ($conn) {
        // Fetch all complaints
        $qwerty = "SELECT * FROM `complaints`";
        $res = mysqli_query($conn, $qwerty);

        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $rid = $row['id'];
                if ($rid == $compid) {
                    // Update pending status
                    $seepend = "UPDATE `complaints` SET `pending`='0' WHERE `complaints`.`id`='$compid'";
                    $res2 = mysqli_query($conn, $seepend);

                    if ($res2) {
                        if ($status == 'in-progress') {
                            // Insert into in-progress table
                            $inpro = "INSERT INTO `inprogresscomp`(`user`, `remarks`, `compnum`) VALUES ('$username', '$remark', '$compid')";
                            mysqli_query($conn, $inpro);
                        } elseif ($status == 'completed') {
                            // Insert into completed table
                            $comp = "INSERT INTO `completedcomp`(`user`, `remark`, `compnum`) VALUES ('$username', '$remark', '$compid')";
                            mysqli_query($conn, $comp);
                        }

                        // Redirect to afteradminlogin.php
                        echo "<script>window.location.assign('afteradminlogin.php');</script>";
                        exit();
                    }
                }
            }
        }
    } else {
        echo "Connection error";
    }
}
