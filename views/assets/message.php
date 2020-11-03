<?php

    // create new object for current message and format some data
    $message = (object) $message;
    $formatted_date = strftime("%a %e %b om %R", strtotime($message->send_at));

?>
<div class="messages_list_item d-flex flex-column <?= ($user_id == $message->sender_id) ? 'sent' : 'received' ?>">
    <p class="message_info">verstuurd op <?= $formatted_date ?></p>
    <div class="message_content">
        <p><?= $message->message ?></p>
    </div>
</div>