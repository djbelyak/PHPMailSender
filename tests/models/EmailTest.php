<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 09.03.13
 * Time: 20:51
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Email.php');
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Address.php');
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Text.php');
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Paper.php');
class EmailTest extends PHPUnit_Framework_TestCase
{
    public function testSendText()
    {
        $to = new Address('djbelyak@gmail.com');
        $from = new Address('phpmailsender.ivanovich@gmail.com');
        $subject = 'testSendText';
        $text = new Text("Test text");

        $email = new Email();
        $email->setTo($to);
        $email->setFrom($from);
        $email->setSubject($subject);
        $email->setText($text);

        $email->Send();
    }
    public function testSendHabr()
    {
        $to = new Address('djbelyak@gmail.com');
        $from = new Address('phpmailsender.ivanovich@gmail.com');
        $subject = 'testSendHabr';
        $text = new Paper('http://habrahabr.ru/post/171937/');

        $email = new Email();
        $email->setTo($to);
        $email->setFrom($from);
        $email->setSubject($subject);
        $email->setText($text);

        $email->Send();
    }
}
