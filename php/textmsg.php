<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta content="text/html; charset=utf-8">

</head>
<body class="bg-dark">

<?php require_once './msgVariables.php'?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.form-select').select2();
    });
</script>
<form method="post">
<div class="text-center">
    <button type="submit" formaction="messagesInfo.php" class="btn btn btn-primary btn-lg btn-rounded btn-lg mt-5">Back to received messages</button>
</div>



<?php

    require_once './messageForm.php';

    $sql = "SELECT * FROM users WHERE name != '$current_user'";

    if($result = $conn->query($sql)){
        $rowsCount = $result->num_rows; ?>

        <?php require_once './messageTable.php'?>


<?php
$result->free();
} else{
    echo "Error: " . $conn->error;
}
$conn->close();

?>


<?php require_once '../structure/footer.php'; ?>


