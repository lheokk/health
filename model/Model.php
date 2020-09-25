<?php

    /**
     * Дефолтная модель
     *
     * @author  Zmi
     * @updated GYL
     */
    abstract class Model
    {
        protected $table;
        protected $db;
        private   $idField;
        private   $id;
        private   $data      = array();
        private   $dataStart = array();
        private   $onlyShow  = false;

        private   $isDel = false;

        abstract protected function CreateTable();

        public function __construct($db, $table, $idField, $id = NULL, $onlyShow = false)
        {
            $this->db       = $db;
            $this->table    = $table;
            $this->idField  = $idField;
            $this->id       = $id;
            $this->onlyShow = $onlyShow;
            if ( ! $onlyShow)
            {
                $this->CreateTable();
            }
            if ($this->id)
            {
                $this->data = $this->db->query("SELECT * FROM `$this->table` WHERE `$this->idField` = $this->id")->fetchAll(PDO::FETCH_ASSOC)[0];
                $this->dataStart = $this->data;
            }
        }

        public function __set($key, $value)
        {
            if ($this->isDel)
            {
                trigger_error("Can not change removed object!", E_USER_ERROR);
            }

            if ($this->onlyShow)
            {
                trigger_error("Can not change readonly object!", E_USER_ERROR);
            }
            
            if ($key == $this->idField)
            {
                trigger_error("Can not change id field!", E_USER_ERROR);
            }

            return $this->data[$key] = $value;
        }

        public function __get($key)
        {
            // Нельзя получать данные из объекта который удалён
            if ($this->isDel)
            {
                trigger_error("Can not get value from removed object!", E_USER_ERROR);
            }

            // Если спрашивают ключевое поле, но сейчас идёт только заполнение данных то пытаетмся сделать запись в БД и вернуть id который она скажет
            if (in_array($key, array($this->idField, 'id')) && !$this->id && count($this->data))
            {
                return $this->Flush();
            }
            return $this->data[$key];
        }

        public function Flush()
        {
            $ret = false;

            if ($this->onlyShow)
            {
                return $this->id ? $this->id : false;
            }
            
            if ($this->isDel)
            {
                return $ret;
            }

            if (count($this->data))
            {
                if ($this->id != NULL)
                {
                    if ($this->dataStart != $this->data)
                    {
                        $data = array();
                        foreach ($this->data as $k => $v)
                        {
                            if ($k == $this->idField) continue;
                            $data[$k] = $v;
                        }
                        
                        $set = pdo_update_set($data);
                        $params = pdo_update_get_params($data);
                        
                        $stmt = $this->db->prepare("UPDATE `$this->table` SET $set WHERE `$this->idField` = $this->id");
                        $stmt->execute($params);
                    }

                    $ret = $this->id;
                }
                else
                {
                    $ret = $this->insert($this->data);

                    $this->id = $this->data[$this->idField] = $ret;
                }
            }
            return $ret;
        }

        public function IsExists()
        {
            return $this->db->selectCell("SELECT COUNT(*) FROM ?# WHERE ?# = ?d", $this->table, $this->idField, $this->id) > 0;
        }

        public function HasChanges()
        {
            return $this->data != $this->dataStart;
        }

        public function IsOnlyShow()
        {
            return $this->onlyShow;
        }

        public function IsDeleted()
        {
            return $this->isDel;
        }

        public function Delete()
        {
            $ret = false;
            if ($this->onlyShow || $this->isDel)
            {
                return $ret;
            }

            if ($this->id)
            {
                $stmt = $this->db->prepare("DELETE FROM `$this->table` WHERE `$this->idField` =  $this->id");
                $stmt->execute();
                
            }
            $this->isDel = $ret;

            return $ret;
        }

        public function __destruct()
        {
            return $this->Flush();
        }
        
        public function insert($data, $table = false)
        {
            $ret = -1;
            $t = (!$table) ? $this->table : $table;
            $fields = pdo_insert_fields($data);
            $ph = pdo_insert_placeholders($data);
            $params = pdo_insert_get_params($data);
            
            $stmt = $this->db->prepare("INSERT INTO `$t`($fields) VALUES ($ph)");
            if ($stmt->execute($params))
            {
                $ret = $this->db->lastInsertId();
            }
            
            return $ret;
        }
        
    };
?>