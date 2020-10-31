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


    public function getByType($type, $offset, $perPage, $filters) {
        global $db;

        $filterQuery = '';
        if ($filters->race !== '') {
            $filterQuery .= 'AND `race` = :race ';
        }
        if ($filters->location !== '%' . '' . '%') {
            $filterQuery .= 'AND `address` LIKE :location ';
        }
        if ($filters->status !== '') {
            $filterQuery .= 'AND `status` = :status ';
        }
        
        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `type` = :type
        ' . $filterQuery . '
        ORDER BY `created_on` ' . $filters->sort_order . '
        LIMIT :offset, :perPage';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->bindParam(':type', $type);
        if ($filters->race !== '') { $pdo_statement->bindParam(':race', $filters->race); };
        if ($filters->location !== '%' . '' . '%') { $pdo_statement->bindParam(':location', $filters->location); };
        if ($filters->status !== '') { $pdo_statement->bindParam(':status', $filters->status); };
        $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $pdo_statement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();

    }

    public function getOtherTypes($offset, $perPage, $filters) {
        global $db;

        $filterQuery = '';
        if ($filters->type !== '' && $filters->type !== 'andere') {
            $filterQuery .= 'AND `type` = :type ';
        }
        if ($filters->race !== '') {
            $filterQuery .= 'AND `race` = :race ';
        }
        if ($filters->location !== '%' . '' . '%') {
            $filterQuery .= 'AND `address` LIKE :location ';
        }
        if ($filters->status !== '') {
            $filterQuery .= 'AND `status` = :status ';
        }

        $sql = 'SELECT *
        FROM `' . $this->table . '`
        WHERE `type` != "hond" AND `type` != "kat"
        ' . $filterQuery . '
        ORDER BY `created_on` ' . $filters->sort_order . '
        LIMIT :offset, :perPage';
        $pdo_statement = $db->prepare($sql);
        if ($filters->type !== '' && $filters->type !== 'andere') { $pdo_statement->bindParam(':type', $filters->type); };
        if ($filters->race !== '') { $pdo_statement->bindParam(':race', $filters->race); };
        if ($filters->location !== '%' . '' . '%') { $pdo_statement->bindParam(':location', $filters->location); };
        if ($filters->status !== '') { $pdo_statement->bindParam(':status', $filters->status); };
        $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $pdo_statement->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();

    }

    public function countByType($type, $filters) {
        global $db;

        $filterQuery = '';
        if ($filters->race !== '') {
            $filterQuery .= 'AND `race` = :race ';
        }
        if ($filters->location !== '%' . '' . '%') {
            $filterQuery .= 'AND `address` LIKE :location ';
        }
        if ($filters->status !== '') {
            $filterQuery .= 'AND `status` = :status ';
        }

        $sql = 'SELECT COUNT(*)
        FROM `' . $this->table . '`
        WHERE `type` = :type
        ' . $filterQuery . '';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->bindParam(':type', $filters->type);
        if ($filters->race !== '') { $pdo_statement->bindParam(':race', $filters->race); };
        if ($filters->location !== '%' . '' . '%') { $pdo_statement->bindParam(':location', $filters->location); };
        if ($filters->status !== '') { $pdo_statement->bindParam(':status', $filters->status); };
        $pdo_statement->execute();
        return (int) $pdo_statement->fetchColumn();

    }

    public function countOtherTypes($filters) {
        global $db;

        $filterQuery = '';
        if ($filters->type !== '' && $filters->type !== 'andere') {
            $filterQuery .= 'AND `type` = :type ';
        }
        if ($filters->race !== '') {
            $filterQuery .= 'AND `race` = :race ';
        }
        if ($filters->location !== '%' . '' . '%') {
            $filterQuery .= 'AND `address` LIKE :location ';
        }
        if ($filters->status !== '') {
            $filterQuery .= 'AND `status` = :status ';
        }

        $sql = 'SELECT COUNT(*)
        FROM `' . $this->table . '`
        WHERE `type` != "hond" AND `type` != "kat"
        ' . $filterQuery . '';
        $pdo_statement = $db->prepare($sql);
        if ($filters->type !== '' && $filters->type !== 'andere') { $pdo_statement->bindParam(':type', $filters->type); };
        if ($filters->race !== '') { $pdo_statement->bindParam(':race', $filters->race); };
        if ($filters->location !== '%' . '' . '%') { $pdo_statement->bindParam(':location', $filters->location); };
        if ($filters->status !== '') { $pdo_statement->bindParam(':status', $filters->status); };
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
        ];

        if( $this->post_id > 0 ) {
            //update
            $sql = 'UPDATE `' . $this->table . '` 
                    SET `status` = :status, `address` = :address, `type` = :type, `race` = :race, `description` = :description, `found_on_lost_since` = :found_on_lost_since, `image` = :image
                    WHERE `' . $this->pk . '` = :post_id ';

            $data['post_id'] = $this->post_id;

            $update_statement = $db->prepare($sql);
            $update_statement->execute( $data );
            
        } else {
            //insert
            $sql = 'INSERT INTO `' . $this->table . '` (`author_id`, `status`, `address`, `type`, `race`, `description`, `found_on_lost_since`, `image`)
                    VALUES (:author_id, :status, :address, :type, :race, :description, :found_on_lost_since, :image)';

            $data['author_id'] = $this->author_id;

            $insert_statement = $db->prepare($sql);
            $insert_statement->execute( $data );

            $this->page_id = $db->lastInsertId();
            
        }
    }

}