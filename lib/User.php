<?php

/**
 * Description of User
 *
 * @author Alki
 */
class User extends Model {
    
    const TABLE = 'user';
    const ADMIN_GROUP = '1';
    protected  $db          = NULL;
    public    $id       = NULL;
    protected function CreateTable()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS `user` (
                          `id` int(10) unsigned NOT NULL auto_increment,
                          `login` varchar(128) NOT NULL default '',
                          `pass` varchar(32) NOT NULL default '',
                          `mail` varchar(128) NOT NULL default '',
                          `regdate` int(11) NOT NULL default '0',
                          `group` int(5) NOT NULL default '1',
                          PRIMARY KEY  (`id`)                                           
                        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");

        /*
         * au создаем юзера при первом входе в админку
         */
        $users = $this->db->query("SELECT * FROM `user`")->fetchAll(PDO::FETCH_ASSOC);

        if (empty($users))
        {
            $login  = Post('admin_login', false);
            $pass   = Post('admin_pwd', false);
            $mail   = 'passwds@index-pro.com';      # мыло, на которое будет слаться письмо при восстановлении пароля по умолчанию
            $ret = $this->SetUser($login, $pass, $mail);
        }
    }
    
    public function __construct($id = NULL, $onlyShow = false)
    {
        global $g_databases;
        $this->db           = $g_databases->db;
        $this->id        = $id;
        parent::__construct($this->db, self::TABLE, 'id', $this->id, $onlyShow);
    }
   
    /**
     * Проверка авторизации пользователя
     * @param type $user
     * @param type $pass 
     */
    public function AuthUser($login, $pass)
    {
        $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE login = :login AND pass = :pass");
        $stmt->execute([":login" => $login, ":pass" => $pass]);
        $hasUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //$pass    = $this->CreateHash($login, $pass); 
        return $hasUser ? $hasUser[0] : false;
    }
    
    /**
     * Проверка авторизации админа
     * @param type $user
     * @param type $pass 
     */
    public function AuthAdmin($login, $pass)
    {
        $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE `login` = :login AND `pass` = :pass AND `group` = 1");
        $stmt->execute([":login" => $login, ":pass" => $pass]);
        $hasUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //$pass    = $this->CreateHash($login, $pass); 
        
        return $hasUser ? $hasUser[0] : false;
    }
    
    /**
     * Рега нового юзера
     * @param type $login
     * @param type $pass
     * @return type bool
     */
    public function SetUser($login, $pass, $mail, $group = 1)
    {
       if($this->IssetLogin($login)) return MsgErr('Логин занят');
       $pass = $this->CreateHash($login, $pass);
       $time = time();
       
       $stmt = $this->db->prepare("INSERT INTO `" . self::TABLE . "` (`login`, `pass`, `mail`, `regdate`, `group`) VALUES (?,?,?,?,?)");
       $stmt->execute([$login,$pass,$mail,$time,$group]);
       
       return true;
    }
    
    /**
     * Проверка на занятость логина
     * @param type $login
     * @return type bool
     */
    public function IssetLogin($login)
    {
        $stmt = $this->db->prepare("SELECT * FROM `" . self::TABLE . "` WHERE login = ?");
        $stmt->execute([$login]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return !empty($data) ? $data[0] : false;
    }
    
    /**
     * Создаём хэш пароля
     * @global type $g_config
     * @param type $login
     * @param type $pwd
     * @return type md5
     */
    public function CreateHash($login, $pwd)
    {
        global $g_config;
        return md5($login . $pwd . $g_config['admin_auth']['salt']);
    }
    
    public function GetUserList($page = 1, $limit = 100)
    {
        $offset = $limit * $page - $limit;
        
        $users = $this->db->selectPage($totalNumberOfUsers, "SELECT * FROM `user` LIMIT ?d,?d", $offset, $limit);
        
        $ret = array();
        $ret['count_users'] = $totalNumberOfUsers;
        $ret['users']       = $users;
        
        return $ret;
    }
}

?>