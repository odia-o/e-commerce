<?php
	/**
	*	validate user form details
	*
	*	@author odia <odiaoghenevwede@gmail.com>
	*	@copyright 2015 swap space;
	*	@license 0.1
	*/
	class Validator
	{

		public function validate_email($email = false)
		{
			if($email === false)
			{
				throw new Exception('Invalid parameter(email)');
			}
			else
			{
				
				$chk = filter_var($email, FILTER_VALIDATE_EMAIL);
				if($chk === false)
				{
					return $chk;
				}
				else
				{
					$b = filter_var($chk, FILTER_SANITIZE_EMAIL);
					return $b;
				}
			
				
			}

		}

		public function display_error($error)
		{	
			$data = "";
			foreach($error as $err)
			{
				$data .= '<p>'.$err.'</p>';
			}
			return $data;
		}

		public function validate_string($string = false)
		{
			if($string === false)
			{
				throw new Exception('Invalid parameter(string)');
			}
			else
			{
				if($string === "")
				{
					return false;
				}
				else
				{
					$b = filter_var($string, FILTER_SANITIZE_STRING);
					return $b;
				}
			
				
			}

		}

		public function validate_url($url = false)
		{
			if($url === false)
			{
				throw new Exception('Invalid parameter(url)');
			}
			else
			{
				
				$chk = filter_var($url, FILTER_VALIDATE_URL);
				if($chk === false)
				{
					return $chk;
				}
				else
				{
					$b = filter_var($url, FILTER_SANITIZE_URL);
					return $b;
				}
			
				
			}
		}

		public function validate_password($password = false, $confirm_password = false)
		{
			if(($password === false) && ($confirm_password === false))
			{
				throw new Exception('Invalid parameter(password)');
			}
			else
			{
				if($password === $confirm_password)
				{
					return $password;
				}
				else
				{
					return false;
				}
				
			}
		}

		public function validate_number($value = false)
		{
			if($value === false)
			{
				throw new Exception("Invalid parameter(number)");
				
			}
			else
			{
				if(is_numeric($value))
				{
					$b = filter_var($value, FILTER_SANITIZE_STRING);
					return $b;
				}
				else
				{
					return false;
				}
			}
		}

		public function get_initials($fname, $lname)
		{
			$fn = substr($fname, 0, 1);
			$ln = substr($lname, 0, 1);
			return strtoupper($fn.$ln);
		}

	}
?>