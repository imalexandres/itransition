<?php
$title="Main page";
require_once "../structure/header.php";
require_once "../DB/db.php";
require_once "../DB/conn.php";
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div >
                <h1 style="text-align: center">Users</h1>
            </div>
        </div>
    </div>
</div>

<form>

<?php
if(isset($_SESSION['logged_user'])) {

    $sql = "SELECT * FROM Users";

    if($result = $conn->query($sql)){
        $rowsCount = $result->num_rows;

        include("../html/toolbar.html");?>

        <table class='table'>

<?php include("../html/tableHeaders.html");

        foreach($result as $row){
           echo "<td class='text-center' colspan='2'>
            <input type='checkbox' class='checkBox' name='check[]' value='" . $row['id'] . "'></td>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["registration_date"] . "</td>";
            echo "<td>" . $row["last_login"] . "</td>";
            echo $row["status"] == 1 ? "<td> Blocked </td>":" <td>Active</td>";
            echo "</tr>";
        }
        ?>
        </table>
</form>

<?php
        $result->free();
    } else{
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
else header('Location: login.php');
?>
    <a href="logout.php">Log out</a>

<script src="../script/select.js"></script>
<?php require_once '../structure/footer.php'; ?>