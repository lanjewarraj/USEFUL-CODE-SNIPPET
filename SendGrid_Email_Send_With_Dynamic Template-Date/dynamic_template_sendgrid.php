		<?php
			//Email sending service with Sendgrid
            require 'vendor/autoload.php'; 
            $mailer = new \SendGrid\Mail\Mail();
            $mailer->setFrom( "-email send from-", "Hello" );
            $mailer->addTo($email, "-email send to-".$_SESSION['USRNAME']);
            $mailer->setTemplateId(
                new \SendGrid\Mail\TemplateId("-template ID-")
            );

            // === Here comes the dynamic template data! === (similar name that defined in template creation in sendgrid.com dashboard using data place handlers)
            $mailer->addDynamicTemplateDatas([
                'name' => $fname,   //'name' => handler defined in sendgrid dashboard in the process of dynamic templat creation
                'p_id' => $payment_id,
                'u_email' => $std_email,
            ]);

            $sendgrid = new \SendGrid('-API id-');
            $response = $sendgrid->send($mailer);
        
            try {
                $response = $sendgrid->send($mailer);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
                } catch (Exception $e) {
                    echo 'Caught exception: '. $e->getMessage() ."\n";
            }
		}
	?>
