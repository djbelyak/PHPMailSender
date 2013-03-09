<?php


/**
 * @access public
 * @package PHPMailSender
 */
class Email {
	/**
	 * @AttributeType PHPMailSender.Adress
	 */
	private $to;
	/**
	 * @AttributeType PHPMailSender.Adress
	 */
	private $from;
	/**
	 * @AttributeType string
	 */
	private $subject;
	/**
	 * @AttributeType PHPMailSender.Text
	 */
	private $text;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function Send() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param PHPMailSender.Adress aTo
	 * @ParamType aTo PHPMailSender.Adress
	 */
	public function setTo(Address $aTo) {
		$this->to = $aTo;
	}

	/**
	 * @access public
	 * @param PHPMailSender.Adress aFrom
	 * @ParamType aFrom PHPMailSender.Adress
	 */
	public function setFrom(Address $aFrom) {
		$this->from = $aFrom;
	}

	/**
	 * @access public
	 * @param string aSubject
	 * @ParamType aSubject string
	 */
	public function setSubject($aSubject) {
		$this->subject = $aSubject;
	}

	/**
	 * @access public
	 * @param PHPMailSender.Text aText
	 * @ParamType aText PHPMailSender.Text
	 */
	public function setText(Text $aText) {
		$this->text = $aText;
	}
}
?>