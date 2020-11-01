<?php

    $message = (object) $message;
    $formatted_date = strftime("%a %e %b om %R", strtotime($message->send_at));

    $sender = $user_model->getById($message->sender_id);

?>
<div class="messages_list_item d-flex flex-column <?= ($user_id == $message->sender_id) ? 'sent' : 'received' ?>">
    <p class="message_info">verstuurd op <?= $formatted_date ?></p>
    <div class="message_content">
        <p><?= $message->message ?></p>
    </div>
</div>