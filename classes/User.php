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
	public function signIn($login = '',$password = '')
	{
		$login = trim($login);
		$password = md5($password);
		$answer = $this->db->query("SELECT login, password FROM users WHERE login='$login' AND password='$password'");

		return $answer ? $answer[0] : null;
	}

	public function registration($registration = [])
    {
        $registration['login'] = trim($registration['login']);
        $registration['password'] = md5($registration['password']);
        $registration['retype'] = md5($registration['retype']);
        $login = $registration['login'];
        $password = $registration['password'];
        $retype = $registration['retype'];
        $this->isEmpty($login,$password,$retype);
        $this->checkEquality($password,$retype);
        $this->isLoginExists($login);
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
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            die;
        }
        return;
    }
    private function checkEquality($password,$retype)
    {
        if($password !== $retype)
        {
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
            die;
        }
        return;
    }

}