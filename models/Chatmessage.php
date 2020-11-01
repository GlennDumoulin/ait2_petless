<?php

class Chatmessage extends BaseModel {

    protected $table = 'chatmessages';
    protected $pk = '';

    public $group_id;
    public $sender_id;
    public $message;


    public function getByGroup($group_id) {
        global $db;

        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `group_id` = :group_id
        ORDER BY `send_at` DESC';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':group_id' => $group_id
            ]
        );
        return $pdo_statement->fetchAll();

    }

    public function addMessage() {
        global $db;

        $data = [
            ':group_id' => $this->group_id,
            ':sender_id' => $this->sender_id,
            ':message' => $this->message
        ];

        $sql = 'INSERT INTO `' . $this->table . '` (`group_id`, `sender_id`, `message`)
                VALUES (:group_id, :sender_id, :message)';

        $insert_statement = $db->prepare($sql);
        $insert_statement->execute( $data );

    }

}