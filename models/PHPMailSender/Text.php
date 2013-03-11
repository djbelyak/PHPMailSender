<?php
require_once(realpath(dirname(__FILE__)) . "/../Exceptions/EmptyTextException.php");
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
     * @throws EmptyTextException
     *
	 */
	public function Text($aText) {
		$this->text = $aText;
        if ($this->text=="")
            throw new EmptyTextException("Пустой текст сообщения");
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getPureText() {
        $search = array ("'<script[^>]*?>.*?</script>'si", // Вырезает javaScript
            "'<[\/\!]*?[^<>]*?>'si", // Вырезает HTML-теги
            "'([\r\n])[\s]+'", // Вырезает пробельные символы
            "'&(quot|#34);'i", // Заменяет HTML-сущности
            "'&(amp|#38);'i",
            "'&(lt|#60);'i",
            "'&(gt|#62);'i",
            "'&(nbsp|#160);'i",
            "'&(iexcl|#161);'i",
            "'&(cent|#162);'i",
            "'&(pound|#163);'i",
            "'&(copy|#169);'i",
            "'&#(\d+);'e"); // интерпретировать как php-код

        $replace = array ("",
            "",
            "\\1",
            "\"",
            "&",
            "<",
            ">",
            " ",
            chr(161),
            chr(162),
            chr(163),
            chr(169),
            "chr(\\1)");

        return preg_replace($search, $replace, $this->getSourceText());
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getSourceText() {
		return $this->text;
	}


}
?>