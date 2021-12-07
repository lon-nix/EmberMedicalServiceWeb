<?php 
    require 'vendor/autoload.php';

    class SendEmail{

        public static function sendMail ($to,$subject,$content){
            $key = '';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("shawn.ist@gmail.com","Ember Medical Service.");
            $email ->setSubject($subject);
            $email ->addTo($to);
            $email ->addContent("text/plain", $content);
            //$email ->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid ->send($email);
                return $response;

            }
            catch(Exception $e){
                echo 'Email Exception caught : '. $e->getMessage(). "\n";
                return false;
            }

        }
    }

?>