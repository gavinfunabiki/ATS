<?php



class UserManager {

	private $db;

	private $isLoggedIn	= false;

	public $id;

	public $info;

	

	public function __construct(PDO $db) {

		$this->db = $db;


		// Check if session Id is set
		
		if(isset($_SESSION['Id'])) {
	
			$this->isLoggedIn = $this->id = $_SESSION['Id'];
			
		}

		

		if(!$this->isLoggedIn) {

			if(empty($_POST['SAMLResponse'])) {	

				return;

			} else {

				$encxml=$_POST['SAMLResponse'];

			}

			

			$xml = new SimpleXMLElement(base64_decode($encxml));

			foreach($xml->Assertion->AttributeStatement->Attribute as $at) {

				if($this->xmlattrib($at, 'Name')=='Id')

					$this->id=$at->AttributeValue[0];

				elseif($this->xmlattrib($at, 'Name')=='Name')

					$this->info['Name']=$at->AttributeValue;

				elseif($this->xmlattrib($at, 'Name')=='Roles')

					$this->info['Roles']=$at->AttributeValue;

			}

			
			$this->id = $this->InsertUpdateUser(array('usercode'=>$this->id, 'username' => $this->info['Name'], 'role'=>$this->info['Roles']));
			
			$_SESSION['Id'] = $this->id;

			$this->isLoggedIn = true;
			
			
			if($_SESSION['Id'] && $this->isLoggedIn) {
				
				if($this->info['Roles'] == 'Expert')
				
					header('Location: /recruiter-dashboard');
					
				else
				
					header('Location: /');
			
			}

		} else {
			
			global $pre;
			
			$stmt = $db->query('SELECT username, role FROM '.$pre.'users WHERE id = '.$this->id.' limit 1');

			$row = $stmt->fetch();
			
			$this->info['Name'] = $row['username'];
			
			$this->info['Roles'] = $row['role'];
				
		}

	}

	

	private function xmlattrib($object, $attribute) {

		if(isset($object[$attribute]))

			return (string) $object[$attribute];

	}	

	

    public function isLoggedIn() {

        return $this->isLoggedIn;

    }
	
	public function userLogOut() {

        $this->isLoggedIn = false;
		$this->id = '';
		$_SESSION['id']='';
		
		return true;

    }

	

	public function InsertUpdateUser($args) {
		
		global $pre;
		
		$stmt = $this->db->prepare("INSERT INTO ".$pre."users SET usercode=:usercode, username=:username, role=:role ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id)");
		
		if(isset($stmt)) $stmt->execute($args);
		
		return $this->db->lastInsertId();
	}

	

}

?>