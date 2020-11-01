<?php

class Bookmark extends BaseModel {

    protected $table = 'bookmarks';
    protected $pk = '';

    public $user_id;
    public $post_id;


    public function getByUser($user_id) {
        global $db;
        
        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `user_id` = :user_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':user_id' => $user_id
            ]
        );
        return $pdo_statement->fetchAll();

    }

    public function bookmarkExists($bookmark) {
        global $db;

        $sql = 'SELECT COUNT(*)
        FROM `' . $this->table . '`
        WHERE `user_id` = :user_id AND `post_id` = :post_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':user_id' => $bookmark->user_id,
                ':post_id' => $bookmark->post_id
            ]
        );
        return (int) $pdo_statement->fetchColumn();

    }

    public function addBookmark() {
        global $db;

        $data = [
            ':user_id' => $this->user_id,
            ':post_id' => $this->post_id,
        ];

        $sql = 'INSERT INTO `' . $this->table . '` (`user_id`, `post_id`)
                VALUES (:user_id, :post_id)';

        $insert_statement = $db->prepare($sql);
        $insert_statement->execute( $data );

    }

    public function removeBookmark($bookmark) {
        global $db;

        $sql = 'DELETE FROM `' . $this->table . '` WHERE `user_id` = :user_id AND `post_id` = :post_id';
        $pdo_statement = $db->prepare($sql);
        return $pdo_statement->execute(
            [
                ':user_id' => $bookmark->user_id,
                ':post_id' => $bookmark->post_id
            ]
        );
    }

}