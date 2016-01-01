<?php
	function NoErrors($c, $t, $d, $z)
	{ return true; }

	class MojangLoginAPI
	{
		private $name = 'unknown';
		private $passwd = 'unknown';
		private $email = 'unknown';
		private $premium = false;

		public function login($name, $passwd)
		{
			if(strpos($name, "@") !== FALSE)
			{
				$this->email = $name;
			}
			$this->name = $name;
			$this->passwd = $passwd;
			$preload = array(
				"agent" => array(
					"name" => "Minecraft",
					"version" => 1 ),
				"username" => $name,
				"password" => $passwd
			);
			$payload = json_encode($preload);
			$old = set_error_handler("NoErrors");
			try {
			$result = file_get_contents('https://authserver.mojang.com/authenticate', null, stream_context_create(array(
				'http' => array(
					'method' => 'POST',
					'header' => 'Content-Type: application/json'."\r\n".'Content-Length: '.strlen($payload) . "\r\n",
					'content' => $payload
					)
				)
			));
			} catch(Exception $ex)
			{ $premium = false; }
			set_error_handler($old);
			if(trim($result) == "")
			return false;
			$profile = json_decode($result, true)["selectedProfile"];
			$this->name = $profile["name"];
			$this->premium = (isset($profile["legacy"])) ? false : true;
			return true;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function isPremium()
		{
			return $this->premium;
		}

		public function isEmailKnown()
		{
			if($this->email != 'unknown')
				return true;
			else return false;
		}

		public function reset()
		{
			$this->name = 'unknown';
			$this->passwd = 'unknown';
			$this->email = 'unknown';
			$this->premium = false;
			return true;
		}
		
	}
?>
