<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 09.03.13
 * Time: 9:25
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Text.php');
class TextTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorAndSourceText()
    {
        $testText = "Hello!
        It is small test text!
        Check me, please)";

        $textObject = new Text($testText);
        $this->assertEquals($testText,$textObject->getSourceText());
    }

    /**
     * @expectedException EmptyTextException
     */
    public function testEmptyTextException()
    {
        $emptyText = '';

        $textObject = new Text($emptyText);
    }

    public function testPureText()
    {
        $testText = "<!-- Тег HTML, с него начинается страница -->
<html>
 <head>
  <title>Заголовок страницы</title>
  <!-- Подключаем JavaScript'овый скрипт с названием current_script.js -->
  <script type='text/javascript' src='current_script.js'></script>
  <!-- Подключаем main.css -->
  <link rel='StyleSheet' type='text/css' href='main.css' />
 </head>
 <body>
  <div id='form_A'>
  <form action='user_checking.php' method='POST'>
   <input type='text' value='Имя' name='first_name' class='field' size='10' /><br />
   <input type='text' value='Фамилия' name='last_name' class='field' size='15' /><br />
   <br />
   <!-- Кнопка отправки данных формы на сервер -->
   <input type='submit' value='Проверить' class='button' name='check_button'
     onmouseover='check_fields('first_name', 'last_name'); ' />
  </form>
  </div>
 </body>
</html>";
        $testPureText = '
Заголовок страницы
';

        $testObject = new Text($testText);
        //print "PureText: ";
        $this->expectOutputString($testPureText);
        print $testObject->getPureText();

        $this->assertEquals($testPureText, $testObject->getPureText());
    }
}
