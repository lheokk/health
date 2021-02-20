<?php

    class Config extends Model {

        const TABLE = 'config';

        protected function CreateTable() {
            $res = $this->db->query("
                CREATE TABLE `config` (                                   
                  `id` int(11) NOT NULL AUTO_INCREMENT,                            
                  `name` char(255) NOT NULL,                      
                  `value` text,                                   
                  PRIMARY KEY (`id`)                                    
                ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
        }

        public function __construct($id = NULL, $onlyShow = false)
        {
            global $g_databases;
            parent::__construct($g_databases->db, self::TABLE, 'id', $id, $onlyShow);
        }

        public function SetConfig($name, $value)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE `name` = ?");
            $stmt->execute([$name]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($data))
            {
                $stmt = $this->db->prepare("INSERT INTO `" . self::TABLE . "` (`name`, `value`) VALUES (?,?)");
                $stmt->execute([$name, $value]);
            }
            else
            {
                $stmt = $this->db->prepare("UPDATE `" . self::TABLE . "` SET `value` = ? WHERE `name` = ?");
                $stmt->execute([$value, $name]);
            }
        }
        
        public function GetConfig($name)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . '` WHERE `name` = ?');
            $stmt->execute([$name]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return !empty($data) ? $data[0] : array();
        }
        
        public function AllConfig()
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . '`');
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    };

?>