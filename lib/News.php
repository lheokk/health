<?php

    class News extends Model {

        const TABLE = 'news';

        protected function CreateTable() {
            $res = $this->db->query("
                CREATE TABLE `news` (                                   
                  `id` int(11) NOT NULL AUTO_INCREMENT,                 
                  `time` int(11) NOT NULL,                              
                  `name` char(255) NOT NULL,                            
                  `text` text NOT NULL,                                 
                  `img` char(255) NOT NULL,                             
                  `title` varchar(500) NOT NULL,                        
                  `description` text,                                   
                  PRIMARY KEY (`id`)                                    
                ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
        }

        public function __construct($id = NULL, $onlyShow = false)
        {
            global $g_databases;
            parent::__construct($g_databases->db, self::TABLE, 'id', $id, $onlyShow);
        }
        
        public function Last($lim = false) 
        {
            
            $res = $this->db->query("SELECT * FROM `" . self::TABLE . "` WHERE time < " . time() . " ORDER BY time DESC LIMIT " . $lim)->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res) ? $res : array();
        }
        
        public function All() 
        {
            $res = $this->db->query("SELECT * FROM `" . self::TABLE . "` ORDER BY time DESC")->fetchAll(PDO::FETCH_ASSOC);
            return !empty($res) ? $res : array();
        }
        
        public function CheckLink($link)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE link = ?");
            $stmt->execute([$link]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res) ? true : false;
        }
        
        public function GetDataByLink($link)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE link = ?");
            $stmt->execute([$link]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res) ? $res[0] : array();
        }

        public function One($link)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE link = ?");
            $stmt->execute([$link]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return !empty($res[0]) ? $res[0] : array();
        }
        
        public function GetNewsPage($from  = 0, $pageSize = 2)
        {
            $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE time < :time ORDER BY time DESC LIMIT :lim1, :lim2");
            $stmt->bindValue(":time", time(), PDO::PARAM_INT);
            $stmt->bindValue(":lim1", $from, PDO::PARAM_INT);
            $stmt->bindValue(":lim2", $pageSize, PDO::PARAM_INT);
            $stmt->execute();
            $res = $stmt->fetchAll();
            
            /*$res = $this->db->selectPage(
                    $total,
                        "
                            SELECT 
                                * 
                            FROM 
                                ?#
                            WHERE
                                time < ?d
                            ORDER BY
                                time DESC
                            LIMIT
                                ?d, ?d
                        ",
                    self::TABLE,
                    time(),
                    $from, 
                    $pageSize
              );*/

            //return array('total' => $total, 'data' => $res);
        }
    };

?>