<?php

class Application {

	

	public $root;

	public $jspath;

	public $csspath;

	public $imgpath;

	public $uppath;
	
	
	
	public $pearlroot;
	
	public $loginpath;
	
	public $signoutpath;

	

	public $title;

	public $timezone;

	public $apiurl;

	

	public $allowedExtensions;

	public $allowedmimes;

	public $sizeLimit;
	
	public $netidme_username;
	
	public $netidme_password;
	
	public $netidme_policy;

	

	function __construct() {

		global $local;

		global $testserver;

		$this->root = 'http://'.$_SERVER['HTTP_HOST'].'/';

		$this->jspath = $this->root.'assets/js/';

		$this->csspath = $this->root.'assets/css/';

		$this->imgpath = $this->root.'assets/img/';

		$this->uppath = ROOT.'media/uploads/';
		
		
		
		$this->pearlroot = 'https://qa.pearl.local/';

		$this->loginpath = $this->pearlroot.'auth/ssologin?returnUrl='.$this->root.'signon.php&sso=1';
		
		$this->signoutpath = $this->pearlroot.'account/signoutinterim';
		


		$this->title = 'ATS';

		$this->timezone = 'America/Los_Angeles';

		$this->apiurl = "https://api.pearl.com/api.1/";



		$this->allowedExtensions = "'doc','docx','pdf'";

		$this->allowedmimes = "'msword','pdf'";

		$this->sizeLimit = 10*1024*1024; //10MB



		$this->netidme_username = 'JustAnswer';
	
		$this->netidme_password	= 'St4WRuth';

		$this->netidme_policy = 'Development';

	}

}

?>