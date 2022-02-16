<?php
$title="Messages history";
require_once "../structure/header.php";
require_once "../DB/db.php";
require_once "../DB/conn.php";

?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div>
                <h1 style="text-align: center">Messages received</h1>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../script/serverpoll.js"></script>
<?php
$current_user = $_SESSION['logged_user']->name;


if(isset($_SESSION['logged_user'])) {

    $sql= "SELECT * FROM `messenger` WHERE recipient LIKE '%$current_user%' ORDER BY `messenger`.`message_date` DESC ";

    if($result = $conn->query($sql)){

        $rowsCount = $result->num_rows;
?>



<?php include("../html/mesTableHeader.html");

      foreach ($result as $row) {
          echo "<td>" . $row["sender"] . "</td>";
          echo "<td><div class='demo'>
    <input type='checkbox' id='" . $row["id"] . "' class='hide'/>
    <label for='" . $row["id"] . "' id='show_mes'>" . $row["subject"] . "</label>
    <div>". $row["message"] . "</div>
          </div>
          </td>";
          echo "<td>" . $row["message_date"] . "</td> 
          <tr>";
      }

?>
       </thead>
   </table>
</div>
    <div class="text-center">
        <button type="submit" formaction="main.php" class="btn btn-warning btn-lg mt-5">Go to main!</button>
    </div>

<?php
    }else{
    echo "Error: " . $conn->error;
}

        $reply = "SELECT * FROM `messenger` WHERE recipient LIKE '%$current_user%' ORDER BY `messenger`.`message_date` DESC LIMIT 1";
        if($result2 = $conn->query($reply)){

        if (!empty($reply)){
            $rowsCount = $result2->num_rows;
            $current_time = strtotime(date('Y-m-d H:i:s'));
            $row = mysqli_fetch_array($result2);
            echo  date('Y-m-d H:i:s');
            echo $row['message_date'];
            $mes_time = strtotime($row['message_date']);

        $difference = $current_time - $mes_time;

        if ($difference < -7181) {
        ?>
    <div class="text-center fixed-bottom">
    <div class="btn btn-primary btn-rounded-min mb-3" style="height: 100%" role="alert">
        <?php
        foreach ($result2 as $row) {
            echo "<tr><div id='blink'>New message!!!</div> </tr>
        <div class='font-weight-bold'>
            <td>From: </td>";
            echo "<td>" . $row["sender"] . "</td>";
            echo "</div>
        <tr>
            <button type='submit' formaction='textmsg.php' formmethod='post' class='btn btn-danger btn-lg' name='reply' value='" . $row["sender"] . "'>Reply</button>         
            <button type='button' class='btn btn-warning'><input  type='checkbox'  id='" . $row["id"] . "' class='hide'>
            <label for='" . $row["id"] . "' id='show_mes'>View message</label></input></button>
        </tr>";
        }
    }
}
?>
    </div>
    </div>

</form>
            <div id="pol"></div>
<?php
    $result->free();
    $result2->free();

    } else{
    echo "Error: " . $conn->error;
    }
    $conn->close();
 }

?>
<?php require_once '../structure/footer.php'; ?>


