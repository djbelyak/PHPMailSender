<?php
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Address.php');
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Text.php');
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Paper.php');
require_once('Mail.php');

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
        $aHeaders=array(
            'From'=>$this->from->getAddress(),
            'To'=>$this->to->getAddress(),
            'Subject'=>'=?UTF-8?B?'.base64_encode($this->subject).'?=',
            'Mime-Version'=>'1.0',
            'Content-Type'=>'text/html; charset=utf-8'
        );
        $smtp=Mail::factory(
            'smtp',
            array (
                'host'=>'ssl://smtp.gmail.com',
                'port'=>'465',
                'auth'=>true,
                'username'=>$this->from->getAddress(),
                'password'=>'`zaq1xsw2cde3'
            )
        );

        $mail=$smtp->send($this->to->getAddress(),$aHeaders,$this->text->getSourceText());
        return !(PEAR::isError($mail));
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