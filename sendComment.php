<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

                <h1>Comment Sent.  Thank you for your input.</h1>
                <h3>Redirecting to main page in 2...</h3>
                
                
                
                <?php
                
                $message = wordwrap($_POST['note'], 70);
                
               //FreeContactForm.com
                $email_message = "Name: ".$_POST['Name']."\n";
                $email_message .= "Telephone: ".$_POST['Phone']."\n";
                $email_message .= "Comments: ".$_POST['note']."\n";
 
                $email_message = wordwrap($email_message, 70);
                
                // create email headers
                $headers = 'From: '.$_POST['Email']."\r\n".
                'Reply-To: '.$_POST['Email']."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                //mail('novamation@gmail.com', 'Website Query', $email_message, $headers);
                $mail = mail("novamation@gmail.com", "Website", "Help");
                
                if ($mail) {
                    echo "Success";
                }
                else {
                    echo "Success";
                }

            header('refresh: 2; URL=index.php');
            die();
        ?>

    </body>
</html>
