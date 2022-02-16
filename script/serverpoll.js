function poll()
{
    $.ajax({
        url: 'messagesInfo.php',
        type: 'POST',
        success: function(response){
            $('#poll').html(response);
        },
        error: function(){
            alert('Error!');
        }
    });
    return false;
}

$(document).ready(function(){
    poll();
    setInterval('poll()',5000);
});