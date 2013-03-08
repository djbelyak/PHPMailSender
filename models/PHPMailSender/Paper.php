<?php
require_once(realpath(dirname(__FILE__)) . '/../PHPMailSender/Text.php');

/**
 * @access public
 * @package PHPMailSender
 */
class Paper extends Text {
	/**
	 * @AttributeType string
	 */
	private $reference;

	/**
	 * @access public
	 * @param string aReference
	 * @ParamType aReference string
	 */
	public function Paper($aReference) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string aReference
	 * @ParamType aReference string
	 */
	public function setReference($aReference) {
		$this->reference = $aReference;
	}
}
?>