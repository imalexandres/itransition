<div class="bg-messages">
    <table class="table table-info">
        <tr>
            <td align="right">From: </td>
            <td style="width: 100%" class="font-weight-bold"><?php echo $current_user?></td>
        </tr>
        <tr>
            <td align="right">To: </td>
            <td>

                <select class="form-select input-active" style="width: 80%" name="recipients[]" multiple="multiple">
                    <?php
                    foreach ($result as $row) {

                        if ($reply == $row["name"]) {
                            echo "<option  value='" . $row["name"] . "' selected = 'selected'>" . $row["name"] . "</option>";
                        } else {
                            echo "<option  value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                        }
                    }?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Subject: </td>
            <td style="width: 100%">
                <input name="subject" class="input-active" style="width: 80%">
            </td>
        </tr>
        <tr>
            <td align="right">Message: <br></td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea name="message_text" rows="8" style="width:100%;"></textarea>
            </td>
        </tr>
    </table>
</div>
<br>
<div class="text-center">
    <button type="submit" name="send_mes" class="btn btn-warning btn-lg btn-rounded">Send</button>
</div>
</form>