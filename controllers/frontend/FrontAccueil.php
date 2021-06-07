<?php

require_once "public/utile/formatage.php";

class FrontAccueil
{
    public function afficherPageAccueil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'message' => htmlspecialchars($_POST['message']),

                'name_err' => '',
                'email_err' => '',
                'msg' => '',
                'msgClass' => ''
            ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Merci de mettre votre nom';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Merci de rajouter votre email';
            }

            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
                $data['email_err'] = 'Merci de rajouter un email valide';
            }

            if (empty($data['email_err']) && empty($data['name_err'])) {
                $name = $data['name'];
                $email = $data['email'];
                $message = $data['message'];


                $toEmail = 'juliasajah85@gmail.com'; // L’adresse e-mail du destinataire
                $subject = 'Contact Request From ' . $name; // Le sujet du mail.
                $body = "<h2>Contact Request</h2>
                     <h4>Name</h4>
                     <p>$name</p>
                     <h4>Email</h4><p>$email</p>
                     <h4>Message</h4><p>$message</p>";

                // Chaque mail comporte des en-têtes. Ils contiennent des informations vitales telles que De l’ mail .
                // https://www.php.net/manual/fr/function.mail.php
                $header = '';
                $header .= "MIME-Version: 1.0\r\n";
                $header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $header .= "X-Priority: 1\r\n";
                $header .= 'From: ' . $name . "\r\n";

                // mail($to,$subject,$message,$headers) – Il s’agit d’une fonction PHP qui exécute le mail.
                if (mail($toEmail, $subject, $body, $header)) {
                    flash('contact_message', 'Message envoyé');
                    header('location: ' . URL . '#contact');
                } else {
                    flash('contact_message', "Votre message n'a pas été envoyé", 'alert alert-danger');
                    header('location: ' . URL . '#contact');
                }


            } else {
                require "views/front/accueil.view.php";


            }

        } else {
            require "views/front/accueil.view.php";
        }
    }
}