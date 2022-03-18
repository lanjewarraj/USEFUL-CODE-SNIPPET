<?php  

require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.afriaids.com';
        $mail->Port = 465;  
        $mail->Username = 'support@afriaids.com';
        $mail->Password = 'King4life+++';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="support@afriaids.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
$result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Please try again, an error occurer, contact the admin</div>";            
   return $result; 
        }
        else 
        {
           $result = "<div class='alert alert-success alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Account created successfully, Please verify your email</div>";
            return $result;
        }
    }
    
    $to   = $email;
    $from = 'support@afriaids.com';
    $name = 'ViralSkill247';
    $subj = 'Please Verify Your Email';
    $msg = '
          Hi <strong>'.$lname.' '.$fname.'</strong>
                         please verify your email to activate your account<br><br>
                    
                    <a href="http://localhost/youtube/confirm.php?email='.$email.'&token='.$final_token.'">Click Here</a><br><br>
                    or copy and open the link below in new tab<br><br>
                    http://localhost/youtube/confirm.php?email='.$email.'&token='.$final_token.'



    ';
    
    $result=smtpmailer($to,$from, $name ,$subj, $msg);
    

    
      
  ///https://github.com/iseenlab/PHPMailer/blob/master/mail.php
    //https://github.com/PHPMailer/PHPMailer/tree/5.2-stable

?>
