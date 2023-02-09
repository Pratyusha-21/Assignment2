<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

/**
 * Verifies and send mail to recipient.
 */
class Mail {

    /**
     * Send mail to recipient.
     * 
     * @return void 
     *    no value will be returned.
     */
    function sendMail() {
        if (isset($_POST['send'])) {
        //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Send using SMTP
                $mail->isSMTP();   
                //Set the SMTP server to send through                                       
                $mail->Host       = 'smtp.gmail.com'; 
                //Enable SMTP authentication                    
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = '2000pgoswami@gmail.com';              
                $mail->Password   = 'kjtenbzxwkwhrnjh';
                //Enable implicit TLS encryption                    
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  
                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`        
                $mail->Port       = 465;                                   
                $mail->setFrom('2000pgoswami@gmail.com', 'Innoraft');
                $mail->addAddress($_POST['email'], '');                    
                $mail->isHTML(true);                                      
                $mail->Subject = 'Send Mail';
                $mail->Body    = 'Thank you for submission.';
                $mail->send();
                echo 'Message has been sent';
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    /** 
     * Verifies the mail id.
     */
    public function verifyMail()             
    {
        //Checks whether the variable is set or not.
        if (isset($_POST['submit'])) {
            $email = $_POST["email"];
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$email",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: F8xJOX4jzmnKCAUtw5hqjLPu75BTGeyU"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            // Receive the data:
            $json = curl_exec($curl);
            curl_close($curl);

            // Decode JSON response:
            $validationResult = json_decode($json, true);
            
            // Checks validation of email.
            if ($validationResult['smtp_check']) {
                $_SESSION['email'] = $email;
                return true;
            } 
            else {
                return FALSE;
            }
        }
    }
}