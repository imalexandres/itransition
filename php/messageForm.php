<?php if(isset($data['send_mes'])) {

         if(empty($data['recipients'])) {
             $errors[] = "Enter recipient";
         } else {
             $recipient = implode(' ', $data['recipients']);
         }
    if (empty($data['subject'])) {

        $subject = '(no subject)';
    } else {
        $subject = $data['subject'];
    }
    if(empty($data['message_text'])) {

        $errors[] = "Enter message";
    }
    if (empty($errors)) {

        $messenger = R::dispense('messenger');

        $messenger->sender = $current_user;
        $messenger->recipient = $recipient;
        $messenger->subject = $subject;
        $messenger->message = $data['message_text'];


        R::store($messenger);

        echo '<div class="alert alert-success text-center fixed-bottom" role="alert">Message sent!</div>';

    } else {

        echo '<div class="alert alert-danger fixed-bottom text-center" ">' . array_shift($errors) . '</div><hr>';
    }
}
?>

