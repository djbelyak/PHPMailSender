<?php
require_once(realpath(dirname(__FILE__)) . '/../Exceptions/EmptyAddressException.php');
require_once(realpath(dirname(__FILE__)) . '/../Exceptions/NotValidAddressException.php');
/**
 * @access public
 * @package PHPMailSender
 */
class Address {
	/**
	 * @AttributeType string
	 */
	private $address;

	/**
	 * @access protected
	 * @return void
	 * @ReturnType boolean
     * @throws EmptyAddressException
     * @throws NotValidAddressException
	 */
	protected function isValidate() {
		if ($this->address == '')
        {
            throw new EmptyAddressException();
        }

        if (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$this->address))
        {
            throw new NotValidAddressException();
        }
	}

	/**
	 * @access public
	 * @param string $aAddress
	 * @ParamType aAddress string
	 */
	public function Address($aAddress) {
		$this->address = $aAddress;
        $this->isValidate();
	}

	/**
	 * @access public
	 * @param string $aAddress
	 * @ParamType aAddress string
	 */
	public function setAddress($aAddress) {
		$this->address = $aAddress;
        $this->isValidate();
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getAddress() {
		return $this->address;
	}
}
?>