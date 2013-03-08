<?php
require_once(realpath(dirname(__FILE__)) . '/../PHPMailSender/Text.php');
/**
 * @access public
 * @package PHPMailSender
 */

class Text {
	/**
	 * @AttributeType string
	 */
	protected $text;

	/**
	 * @access public
	 * @param  aText
	 * @return void
	 * @ParamType aText string
	 * @ReturnType void
	 */
	public function Text($aText) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getPureText() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getSourceText() {
		// Not yet implemented
	}
}
?>