<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 08.03.13
 * Time: 19:10
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Adress.php');
class AdressTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $testAdress = 'djbelayk@gmail.com';

        $email = new Adress($testAdress);

        $this->assertEquals($testAdress,$email->getAdress());
    }

    public function testSetAndGetAdress()
    {
        $testAdress1 = 'djbelayk@gmail.com';
        $email = new Adress($testAdress1);
        $this->assertEquals($testAdress1,$email->getAdress());

        $testAdress2 = 'belavcev@meteo.ru';
        $email->setAdress($testAdress2);
        $this->assertEquals($testAdress2,$email->getAdress());
    }

    /**
     *  @expectedException EmptyAdressException
     */
    public function testEmptyAdress()
    {
        $emptyString = '';
        $email = new Adress($emptyString);
        $this->assertFalse($email->isValide());
    }

    /**
     * @expectedException NotValidAdressException
     */
    public function testNotValidAdress()
    {
        $email = new Adress('');

        $notValidStrings = array ('Привет', 'Hello', 'djbelyak@', 'djbelyak@gmail', 'djbelyak@gmail.');

        foreach ($notValidStrings as $i => $value)
        {
            $email->setAdress($notValidStrings[$i]);
            $this->assertFalse($email->isValide());
        }
    }
}
