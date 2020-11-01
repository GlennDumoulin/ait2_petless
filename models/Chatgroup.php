<?php

class Chatgroup extends BaseModel {

    protected $table = 'chatgroups';
    protected $pk = 'group_id';

    public $post_id;
    public $first_user_id;
    public $second_user_id;


    public function getGroup($groupdata) {
        global $db;
        
        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `post_id` = :post_id
        AND ((`first_user_id` = :sender AND `second_user_id` = :receiver) OR (`first_user_id` = :receiver AND `second_user_id` = :sender))';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':post_id' => $groupdata->post_id,
                ':sender' => $groupdata->sender,
                ':receiver' => $groupdata->receiver
            ]
        );
        return $pdo_statement->fetchObject();

    }

    public function groupExists($groupdata) {
        global $db;

        $sql = 'SELECT COUNT(*) FROM `' . $this->table . '`
        WHERE `post_id` = :post_id
        AND ((`first_user_id` = :sender AND `second_user_id` = :receiver) OR (`first_user_id` = :receiver AND `second_user_id` = :sender))';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':post_id' => $groupdata->post_id,
                ':sender' => $groupdata->sender,
                ':receiver' => $groupdata->receiver
            ]
        );
        return (int) $pdo_statement->fetchColumn();

    }

    public function createGroup() {
        global $db;

        $data = [
            ':post_id' => $this->post_id,
            ':first_user_id' => $this->first_user_id,
            ':second_user_id' => $this->second_user_id
        ];

        $sql = 'INSERT INTO `' . $this->table . '` (`post_id`, `first_user_id`, `second_user_id`)
                VALUES (:post_id, :first_user_id, :second_user_id)';

        $insert_statement = $db->prepare($sql);
        $insert_statement->execute( $data );

    }

}