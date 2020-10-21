<?php

class Page extends BaseModel {

    protected $table = 'pages';
    protected $pk = 'page_id';

    public $page_id = 0;
    public $name;
    public $slug;
    public $title;
    public $content;
    public $page_order;
    public $template;
    public $type;


    private function getAll() {
        global $db;

        $sql = 'SELECT `' . $this->pk . '`, `slug`, `name`, `type` FROM `' . $this->table . '` ORDER BY `page_order`';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();

    }

    private function getById($id) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':p_id' => $id
            ]
        );
        return $pdo_statement->fetchObject();
    }

    public function save() {
        global $db;

        $data = [
            ':name' => $this->name,
            ':slug' => $this->slug,
            ':title' => $this->title,
            ':content' => $this->content,
            ':page_order' => $this->page_order,
            ':template' => $this->template,
            ':type' => $this->type,
        ];

        if( $this->page_id > 0 ) {
            //update
            $sql = 'UPDATE `' . $this->table . '` 
                    SET `name` = :name, `slug` = :slug, `title` = :title, `content` = :content, `page_order` = :page_order, `template` = :template, `type` = :type
                    WHERE `' . $this->pk . '` = :page_id ';

            $data['page_id'] = $this->page_id;

            $update_statement = $db->prepare($sql);
            $update_statement->execute( $data );
            
        } else {
            //insert
            $sql = 'INSERT INTO `' . $this->table . '` (`name`, `slug`, `title`, `content`, `page_order`, `template`, `type`)
                    VALUES (:name, :slug, :title, :content, :page_order, :template, :type)';

            $insert_statement = $db->prepare($sql);
            $insert_statement->execute( $data );

            $this->page_id = $db->lastInsertId();
            
        }
    }

}