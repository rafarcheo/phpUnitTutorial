<?php namespace App\Models;

class Cart
{
	public $user_id;
	public $user_email;


	public function setUserId($userId) 
	{
		$this->user_id = intval($userId);
	}

	public function getUserId() 
	{
		return $this->user_id;
	}

	public function setUserEmail($email)
	{
		$this->user_email = trim($email); 
	}

	public function getUserEmail()
	{
		return $this->user_email;
	}

	public function getUserData()
	{
		return [
			'id' => $this->user_id,
			'email' => $this->user_email,
		];
	}
}