<?php

class Post extends BaseModel {

    protected $table = 'posts';
    protected $pk = 'post_id';

    public $post_id = 0;
    public $author_id;
    public $status;
    public $address;
    public $type;
    public $race;
    public $description;
    public $found_on_lost_since;
    public $image;
    public $created_on;


    public function getByType($type, $offset, $perPage) {
        global $db;

        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `type` = :type
        ORDER BY `created_on` DESC
        LIMIT :offset, :perPage';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->bindParam(':type', $type);
        $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $pdo_statement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();

    }

    public function getOtherTypes($offset, $perPage) {
        global $db;

        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `type` != "hond" AND `type` != "kat"
        ORDER BY `created_on` DESC
        LIMIT :offset, :perPage';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $pdo_statement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();

    }

    public function countByType($type) {
        global $db;

        $sql = 'SELECT COUNT(*)
        FROM `' . $this->table . '`
        WHERE `type` = :type';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':type' => $type
            ]
        );
        return (int) $pdo_statement->fetchColumn();

    }

    public function countOtherTypes() {
        global $db;

        $sql = 'SELECT COUNT(*)
        FROM `' . $this->table . '`
        WHERE `type` != "hond" AND `type` != "kat"';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        return (int) $pdo_statement->fetchColumn();

    }

    public function getById($post_id) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':p_id' => $post_id
            ]
        );
        return $pdo_statement->fetchObject();
    }

    public function save() {
        global $db;

        $data = [
            ':status' => $this->status,
            ':address' => $this->address,
            ':type' => $this->type,
            ':race' => $this->race,
            ':description' => $this->description,
            ':found_on_lost_since' => $this->found_on_lost_since,
            ':image' => $this->image,
            ':created_on' => $this->created_on,
        ];

        if( $this->page_id > 0 ) {
            //update
            $sql = 'UPDATE `' . $this->table . '` 
                    SET `status` = :status, `address` = :address, `type` = :type, `race` = :race, `description` = :description, `found_on_lost_since` = :found_on_lost_since, `image` = :image, `created_on` = :created_on
                    WHERE `' . $this->pk . '` = :post_id ';

            $data['post_id'] = $this->post_id;

            $update_statement = $db->prepare($sql);
            $update_statement->execute( $data );
            
        } else {
            //insert
            $sql = 'INSERT INTO `' . $this->table . '` (`status`, `address`, `type`, `race`, `description`, `found_on_lost_since`, `image`, `created_on`)
                    VALUES (:status, :address, :type, :race, :description, :found_on_lost_since, :image, :created_on)';

            $insert_statement = $db->prepare($sql);
            $insert_statement->execute( $data );

            $this->page_id = $db->lastInsertId();
            
        }
    }

}