<?php

class CPhpMailerLogRoute extends CEmailLogRoute
{
    protected function sendEmail($email, $subject, $message)
    {

        if($_SERVER['SERVER_ADDR'] != '127.0.0.1'){

            $html = '<html>
            <head>
                <title></title>
            </head>
            <body>
            '.$message.'
            </body>
            </html>';

            Yii::import('ext.yii-mail.YiiMailMessage');
            $message = new YiiMailMessage;
            $message->setBody($html, 'text/html');
            $message->subject = $subject.' :: '.Yii::app()->name;
            $message->addTo(Yii::app()->params['adminEmail']);
            $message->from = $email;
            $envio = Yii::app()->mail->send($message);
        }
    }
}