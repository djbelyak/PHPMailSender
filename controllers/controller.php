<?php
/**
 * Created by JetBrains PhpStorm.
 * User: djbelyak
 * Date: 09.03.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */
require_once(realpath(dirname(__FILE__)) . '/../models/PHPMailSender/Address.php');
require_once(realpath(dirname(__FILE__)) . '/../models/PHPMailSender/Text.php');
require_once(realpath(dirname(__FILE__)) . '/../models/PHPMailSender/Paper.php');
require_once(realpath(dirname(__FILE__)) . '/../models/PHPMailSender/Email.php');
class controller {

    function controller()
    {
        switch ($_GET['action']) {
            case "sendtext":
                return $this->send_text($_GET["email"],$_GET["message"]);
            case "sendpage":
                return $this->send_page($_GET["email"],$_GET["url"]);
            default:
                return $this->start_page();
        }
    }

    private function send_text($toString, $textString)
    {

        try
        {
            $to = new Address($toString);
            $from = new Address('phpmailsender.ivanovich@gmail.com');
            $subject = "Напоминание от сервиса phpMailSender";
            $text = new Text($textString);

            $email = new Email();
            $email->setTo($to);
            $email->setFrom($from);
            $email->setSubject($subject);
            $email->setText($text);

            $email->Send();

            header('Location: /success.html');
        }
        catch (Exception $e)
        {
            header("Location: /error.php?error=".$e->getMessage());
        }

    }

    private function send_page($toString, $urlString)
    {
        try
        {
            $to = new Address($toString);
            $from = new Address('phpmailsender.ivanovich@gmail.com');
            $subject = "Статья от сервиса phpMailSender";
            $text = new Paper($urlString);

            $email = new Email();
            $email->setTo($to);
            $email->setFrom($from);
            $email->setSubject($subject);
            $email->setText($text);

            $email->Send();

            header('Location: /success.html');
        }
        catch (Exception $e)
        {
            header("Location: /error.php?error=".$e->getMessage());
        }
    }
    private function start_page()
    {
        header('Location: /');
    }

} new controller;
