<?php
require_once(realpath(dirname(__FILE__)) . '/../PHPMailSender/Text.php');
require_once(realpath(dirname(__FILE__)) . "/../Exceptions/NotAvailablePaperException.php");
include_once(realpath(dirname(__FILE__)) . '/../Libraries/simple_html_dom.php');
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
        try
        {
            $this->setReference($aReference);
        }
        catch (NotAvailablePaperException $e)
        {
            $message ='';
            throw new NotAvailablePaperException($message, 0, $e);
        }
	}

    /**
     * @access public
     * @param $aReference
     * @throws NotAvailablePaperException
     * @return void
     * @internal param \aReference $string
     * @ParamType aReference string
     */
	public function setReference($aReference) {

        try
        {
            $fp = fopen($aReference, "r");
            $res = fread($fp, 500);
            fclose($fp);
            if (strlen($res) > 0)
            {
		        $this->reference = $aReference;
                $this->text = file_get_html($this->reference);
            }
            else
                throw new NotAvailablePaperException();
        }
        catch (Exception $e)
        {
            throw new NotAvailablePaperException();
        }

	}

}
?>