<?php
require_once "../structure/header.php";
require_once "../DB/db.php";
require_once "../DB/conn.php";



$current_id = $_SESSION['logged_user']->id;

if (isset($_POST['check'])) {

    $selected_ids = $_POST['check'];

    if (!empty($_POST['check'])) {

        $sql = "DELETE FROM users WHERE id = ?";
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
            $_SESSION['status'] = 1;
            header("Location: logout.php");
            exit;
        }
    }
}
header('Location: main.php');




require __DIR__ . '../structure/footer.php';