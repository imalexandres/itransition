<?php
require_once "../structure/header.php";
require_once "../DB/db.php";
require_once "../DB/conn.php";



$current_id = $_SESSION['logged_user']->id;
$status = $_POST['block'];

if (isset($_POST['check'])) {

    $selected_ids = $_POST['check'];

    if (!empty($_POST['check'])) {

        $sql = "UPDATE users SET status = $status WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $param_id);
            foreach ($selected_ids as $id) {
                $param_id = (int)$id;
                $stmt->execute();
            }
            $stmt->close();
            $conn->close();
        }
        if (in_array($current_id, $selected_ids)) {
            if ($status == 1) {
                header("Location: logout.php");
                exit;
            }
        }
    }
}
header('Location: main.php');


require __DIR__ . '../structure/footer.php';