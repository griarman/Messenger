<?php

require_once 'DB.php';

class User
{
    const TABLE = 'users';
	private $db;
	public function __construct()
	{
		$this->db = new DB;
	}
	public function signIn($login = '',$password = '',$checked = false)
	{

		$login = trim($login);
		$password = md5($password);
		if($checked){
		    $date = $this->getDate();
		    $token = $this->tokenGenerator($login);
		    $this->addCookie($token,$date,$login);

        }
		$answer = $this->db->query("SELECT login, password FROM users WHERE login='$login' AND password='$password'");

		return $answer ? $answer[0] : null;
	}
	private function getDate()
    {
        date_default_timezone_set('Asia/Yerevan');
        $date =  time()+24*3600*7;
        return $date;
    }
	private function tokenGenerator($str)
    {
        $str = md5(uniqid($str));
        return $str;
    }
	private function addCookie($token,$date,$login){
        $this->db->query("INSERT INTO `token`(`token`, `expireDate`,`userId`) VALUES ('$token','$date','$login')");
        setcookie('tkn',$token,time()+24*7*3600,'/');
    }
    public function checkCookie($token,$date)
    {
        $token = addslashes($token);
        $answer = $this->db->query("SELECT `userId` FROM `token` WHERE token='$token' AND expireDate >= '$date'");
        return $answer ? $answer[0] : false;
    }
    public function deleteCookie($user)
    {
        return $this->db->query("DELETE FROM `token` WHERE `userId`='$user'");

    }
	public function registration($registration = [])
    {
        $registration['login'] = trim($registration['login']);
        $registration['password'] = md5($registration['password']);
        $registration['retype'] = md5($registration['retype']);
        $login = $registration['login'];
        $password = $registration['password'];
        $retype = $registration['retype'];
        if($this->isEmpty($login,$password,$retype) || $this->checkEquality($password,$retype) || $this->isLoginExists($login))
        {
            return false;
        }
        $keys = $this->getKeys($registration);
        $fields = $this->getFields($registration);
        return $this->db->query("INSERT INTO ". self::TABLE ."(".implode(',',$keys).") VALUES ('".implode("','",$fields)."')");
    }
    private function getFields($fields)
    {
        $arr = [];
        foreach ($fields as $key => $value)
        {
                if($key !== 'retype')
                {
                    $arr[] = $value;
                }
        }
        return $arr;
    }
	public function isLoginExists($login)
    {
        $answer = $this->db->query("SELECT login FROM users WHERE login = '$login'");

        return !empty($answer);
    }
    private function getKeys($reg)
    {
        $keys = [];
        foreach ($reg as $key => $value)
        {
            if($key !== 'retype')
            {
                $keys[] = $key;
            }
        }
        return $keys;
    }
	private function isEmpty($login = '',$password = '',$retype = '')
    {
        if(empty($login) || empty($password) || empty($retype)){
            return true;
        }
        return false;
    }
    private function checkEquality($password,$retype)
    {
        if($password !== $retype)
        {
            return true;
        }
        return false;
    }
    public function getUsers($login)
    {
        $answer = $this->db->query("SELECT login FROM users WHERE login!='$login'");
        return $answer ? $answer : null;
    }
}
