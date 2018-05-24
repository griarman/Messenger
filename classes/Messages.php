<?php

require_once 'DB.php';


class Messages
{
	private $db;
	const TABLE = '`messages`';

	public function __construct()
	{
		$this->db = new DB;
	}

	public function getMessages(array $params = [])
	{
		$optionalKeys = [
			'limit' => 20,
			'offset' => 0
		];
		$requiredKeys = ['senderId', 'getterId'];

		foreach ($requiredKeys as $key)
		{
			if(empty(trim($params[$key])))
			{
				die("$key parameter is required in " . __METHOD__ . ' method in ' . __CLASS__ . ' class');
			}
			else
			{
				$params[$key] = addslashes(trim($params[$key]));
			} 
		}

		foreach ($optionalKeys as $key => $value)
		{
			if(!isset($params[$key]))
			{
				$params[$key] = $value;
			}
			else
			{
				$params[$key] = addslashes(trim($params[$key]));
			}
		}

		$messages = $this->db->query("SELECT * FROM " . self::TABLE . " WHERE (`senderId` = '{$params['senderId']}' AND `getterId` = '{$params['getterId']}') OR (`getterId` = '{$params['senderId']}' AND `senderId` = '{$params['getterId']}') LIMIT {$params['offset']}, {$params['limit']}");

		return $messages ?: [];
	}

	public function addMessage(array $params = [])
	{
		$fields = ['senderId', 'getterId', 'message','date'];

		foreach ($fields as $field)
		{
			if(@empty(trim($params[$field])))
			{
				die(ucfirst($field) . " parameter is required in " . __METHOD__ . ' method in ' . __CLASS__ . ' class');
			}
			else
			{
				$params[$field] = addslashes(trim($params[$field]));
			}
		}
		return $this->db->query("INSERT INTO " . self::TABLE . " (" . implode(',', $fields). ") VALUES ('{$params['senderId']}', '{$params['getterId']}', '{$params['message']}','{$params['date']}')");
	}

	public function __destruct()
	{
		unset($this->db);
	}
}