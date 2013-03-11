<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 08.03.13
 * Time: 19:10
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Address.php');
class AddressTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $testAddress = 'djbelayk@gmail.com';

        $email = new Address($testAddress);

        $this->assertEquals($testAddress,$email->getAddress());
    }

    public function testSetAndGetAddress()
    {
        $testAddress1 = 'djbelayk@gmail.com';
        $email = new Address($testAddress1);
        $this->assertEquals($testAddress1,$email->getAddress());

        $testAddress2 = 'belavcev@meteo.ru';
        $email->setAddress($testAddress2);
        $this->assertEquals($testAddress2,$email->getAddress());
    }

    /**
     *  @expectedException EmptyAddressException
     */
    public function testEmptyAddress()
    {
        $emptyString = '';
        $email = new Address($emptyString);
    }

    /**
     * @expectedException NotValidAddressException
     */
    public function testNotValidAddress()
    {
        $email = new Address('phpmailsender.ivanovich@gmail.com');

        $notValidStrings = array ('Привет', 'Hello', 'djbelyak@', 'djbelyak@gmail', 'djbelyak@gmail.');

        foreach ($notValidStrings as $i => $value)
        {
            $email->setAddress($notValidStrings[$i]);
        }
    }
}
