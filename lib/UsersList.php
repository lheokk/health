<?php

/**
 * Description of RegAuth
 *
 * @author Alki
 */
class UsersList extends Model {
    
    const TABLE = 'users_list';
	const SALT	= 'assSfsdf873kdsWdsdf73';
    protected  $db      = NULL;
    public    $id       = NULL;
    protected function CreateTable()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS ?# (                                          
								  `id` int(10) NOT NULL auto_increment,                                            
								  `email` varchar(256) character set utf8 NOT NULL default '',       
								  `first_name` varchar(100) character set utf8 NOT NULL default '',  
								  `last_name` varchar(100) character set utf8 NOT NULL default '',   
								  `reg_date` int(11) NOT NULL default '0',                           
								  `hsh_pass` varchar(32) character set utf8 NOT NULL default '',     
								  PRIMARY KEY  (`id`)                                                
								) ENGINE=MyISAM DEFAULT CHARSET=utf8",
									self::TABLE);
    }
    
    public function __construct($id = NULL, $onlyShow = false)
    {
        global $g_databases;
        $this->db           = $g_databases->db;
        $this->id        = $id;
        parent::__construct($this->db, self::TABLE, 'id', $this->id, $onlyShow);
    }
   
   /**
     * Проверка аторизован ли юзер
     * @param type $mail
     * @param type $pass 
     */
    public function AuthUser($mail, $pass)
    {
        $pass    = $this->CreateHash($mail, $pass); 
        $hasUser = $this->db->Select("SELECT 
                                                    * 
                                              FROM 
                                                    ?# 
                                              WHERE 
                                                    email = ?
                                              AND
                                                    hsh_pass = ?", 
                                               self::TABLE, $mail, $pass);
		if(isset($hasUser[0]))
		{
			$_SESSION['auth_user'] = $mail;
			$_SESSION['auth_pass'] = $pass;
			return true;
		}
        return false;
    }
	
    /**
     * Проверка авторизации пользователя
     */
    public function IsAuthUser()
    {
		if(isset($_SESSION['auth_user']) && isset($_SESSION['auth_pass']))
		{
			$mail 	 = _Clean($_SESSION['auth_user']);
			$pass 	 = _Clean($_SESSION['auth_pass']);
			$hasUser = $this->db->Select("SELECT 
                                                    * 
                                              FROM 
                                                    ?# 
                                              WHERE 
                                                    email = ?
                                              AND
                                                    hsh_pass = ?", 
                                               self::TABLE, $mail, $pass);
			return $hasUser ? $hasUser[0] : false;
		}
		return false;
        
    }
    
    
    /**
     * Проверка на занятость мыла
     * @param type $login
     * @return type string OR bool
     */
    public function IssetMail($mail)
    {
        $hasMail = $this->db->SelectCell("SELECT 
                                                    `email` 
                                              FROM 
                                                    ?# 
                                              WHERE 
                                                    email = ?
                                              ", 
                                               self::TABLE, $mail);
        return $hasMail ? $hasMail : false;
    }
    
    /**
     * Создаём хэш пароля
     * @global type $g_config
     * @param type $mail
     * @param type $pwd
     * @return type md5
     */
    public function CreateHash($mail, $pwd)
    {
        global $g_config;
        return md5($mail . $pwd . self::SALT);
    }
    
	 /**
     * Получаем список пользователей
     */
    public function GetUserList($page = 1, $limit = 100)
    {
        $offset = $limit * $page - $limit;
        
        $users = $this->db->selectPage($totalNumberOfUsers, "SELECT * FROM ?# LIMIT ?d,?d", self::TABLE, $offset, $limit);
        
        $ret = array();
        $ret['count_users'] = $totalNumberOfUsers;
        $ret['users']       = $users;
        
        return $ret;
    }
	
	 /**
     * Генерация пароля
     */
	public function GenPass()
	{
		$sim = array('1','2','3','4','5','6','7','8','9','0','_',
                 'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
                 'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','R','S','T','U','V','X','Y','Z');
		$pass = '';
		for ($i=0; $i<8; $i++)
		{
			$ind = rand(0, count($sim)-1);
			$pass .= $sim[$ind];
		}
		return $pass;
	}
	
	/**
     * По мылу возвращает объект юзер
     */
	public function UserObjectByEmail($email)
	{
		$userId = $this->db->SelectCell("SELECT 
												`id`
                                              FROM 
                                                    ?# 
                                              WHERE 
                                                    email = ?
                                              ", 
                                               self::TABLE, $email);
		return	new self($userId);
											   
	}
}

?>