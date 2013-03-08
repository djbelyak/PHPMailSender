<?php
require_once(realpath(dirname(__FILE__)) . '/../Exceptions/EmptyAdressException.php');
require_once(realpath(dirname(__FILE__)) . '/../Exceptions/NotValidAdressException.php');
/**
 * @access public
 * @package PHPMailSender
 */
class Adress {
	/**
	 * @AttributeType string
	 */
	private $adress;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function isValide() {
		if ($this->adress == '')
        {
            throw new EmptyAdressException();
            return false;
        }

        if (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$this->adress))
        {
            throw new NotValidAdressException();
            return false;
        }

        return true;
	}

	/**
	 * @access public
	 * @param string aAdress
	 * @ParamType aAdress string
	 */
	public function Adress($aAdress) {
		$this->adress = $aAdress;
	}

	/**
	 * @access public
	 * @param string aAdress
	 * @ParamType aAdress string
	 */
	public function setAdress($aAdress) {
		$this->adress = $aAdress;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getAdress() {
		return $this->adress;
	}
}
?>