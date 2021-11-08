<?php
namespace My;
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception as PHPMailerException;
class Mail {
   // PHPMailer
   private $_mailer;
   /**
    * Constructs mail
    *
    * @param string $subject
    * @param string $body
    * @param bool $isHTML (optional)
    */
   public function __construct(string $subject, string $body, bool $isHTML = false)
   {
       $this->_mailer = new PHPMailer();
       // Setup SMTP server...
       // Configure mail contact: from and reply...
       // Set subject and body (HTML or not)...
       $this->_mailer->IsSMTP();
       $this->_mailer->SMTPSecure = "tls";
       $this->_mailer->SMTPAuth = TRUE;
       $this->_mailer->Host      = "smtp.gmail.com";
       $this->_mailer->Port      = 587;
       $this->_mailer->Username  = "2daw.equip06@fp.insjoaquimmir.cat";
       $this->_mailer->Password  = "JXhNR*8J";
       $this->_mailer->SetFrom("2daw.equip06@fp.insjoaquimmir.cat","Grup6");
       //$mail->AddReplyTo("2daw.equip06@fp.insjoaquimmir.cat","Grup6reply");

   }
   /** * Send mail to recipients *
   * @param array $to
   * @param array $cc (optional)
   * @param array $bcc (optional)
   * @return bool
   */

   public function send(array $to, array $cc = [], array $bcc = []) : bool {
       // Add recipients (to, cc, bcc)... Send mail... Clear recipients...
       $this->_mailer->IsHTML(true);
       $this->_mailer->AddAddress("2daw.equip06@fp.insjoaquimmir.cat", "brunoalex");
       $this->_mailer->AddCC("alsare@fp.insjoaquimmir.cat", "alex");
       $this->_mailer->Subject = "subject";
       $content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";       
   }
}
?>
