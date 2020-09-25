<?php

    class Pages extends Model {

        const TABLE = 'pages';

        protected function CreateTable() {
            $this->db->query("
                CREATE TABLE `pages` (                                         
                  `id` int(11) NOT NULL AUTO_INCREMENT,                        
                  `head` varchar(500) CHARACTER SET utf8 NOT NULL,             
                  `link` varchar(500) CHARACTER SET utf8 NOT NULL,             
                  `text` text CHARACTER SET utf8,                              
                  `stamp` int(12) DEFAULT NULL,                                
                  `title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,        
                  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,  
                  `keywords` varchar(500) CHARACTER SET utf8 DEFAULT NULL,     
                  `gallery_id` int(11) DEFAULT NULL,                           
                  PRIMARY KEY (`id`)                                           
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
        }

        public function __construct($id = NULL, $onlyShow = false)
        {
            global $g_databases;
            parent::__construct($g_databases->db, self::TABLE, 'id', $id, $onlyShow);
        }
        
        public function All() 
        {
            $res = $this->db->query("SELECT * FROM `" . self::TABLE . "` ORDER BY `stamp` DESC")->fetchAll(PDO::FETCH_ASSOC);

            return !empty($res) ? $res : array();
        }
        
        public function CheckLink($link)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE `link` = ?");
            $stmt->execute([$link]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res) ? true : false;
        }
        
        public function GetDataByLink($link)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE `link` = ?");
            $stmt->execute([$link]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res) ? $res[0] : array();
        }

        public function One($link)
        {
            $res = $this->db->query(
                    "
                        SELECT
                            *
                        FROM
                            ?#
                        WHERE
                            link = ?
                        ",
                    self::TABLE,
                    $link
                    );
            return !empty($res[0]) ? $res[0] : array();
        }
        
        public function GetParentData($id) 
        {
            $res = $this->db->query(
                    "
                        SELECT
                            *
                        FROM
                            ?#
                        WHERE
                            id = ?d
                        ",
                    self::TABLE,
                    $id
                    );
            return $res[0];
        }
        
        public function GetChildrens($id) 
        {
            $res = $this->db->query(
                    "
                        SELECT
                            *
                        FROM
                            ?#
                        WHERE
                            parent = ?d
                        ",
                    self::TABLE,
                    $id
                    );
            return !empty($res) ? $res : false;
        }
    };

?>