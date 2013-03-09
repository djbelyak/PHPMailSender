<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 09.03.13
 * Time: 19:08
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../../models/PHPMailSender/Paper.php');

class PaperTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $ref = 'http://habrahabr.ru/post/172037/';
        $testObject = new Paper($ref);

    }

    /**
     *  @expectedException NotAvailablePaperException
     */
    public function testNotAvailablePaperException()
    {
        $ref = 'https://www.dfsdf.te/';
        $testObject = new Paper($ref);
    }
}
