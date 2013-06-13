<?php
class FormKey
{
	private $formKey;
	private $old_formKey;
	function __construct() {
		if(!empty($_SESSION['form_key'])) {
			$this->old_formKey = $_SESSION['form_key'];
		}
	}

	private function generate() {
		$ip = $_SERVER['REMOTE_ADDR'];
		$uniqid = uniqid(mt_rand(), true);
		return md5($ip . $uniqid);
	}
	
	public function display()	{
		$this->formKey = $this->generate();
		$_SESSION['form_key'] = $this->formKey;
		echo "<input type='hidden' name='formkey' id='formkey' value='".$this->formKey."' />";
	}

	public function validate()	{
		if(!empty($_POST['formkey']))
			return ($_POST['formkey'] == $this->old_formKey) ;
		else
			return false;
	}
}
?>
