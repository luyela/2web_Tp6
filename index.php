<?php

if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    if(empty($username)) {
        $valid = false;
        $nomcorrect = "valider";
    }

    if(!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.].[a-z]{2,3}$/i", $username)){

        echo "username non valide";

    }

    if(empty($password)) {
        $valid = false;
        $mon_de_passe_correct = "valider";
    }

    if(empty($message)) {
        $valid = false;
        $erreurmessage = "Vous n'avez pas mis votre message";
    }

    if($valid) {
        $to = "contact@wishbone-design.com";
        $sujet = "Demande de contact";
        $texte = "Nom : $nom\n
            Email : $email\n
            Message : $message";
        $headers = "From: $nom\n
            Reply-To: $email";
        mail($destinataire, $objet, $texte, $headers);
        if(mail($to,$sujet,$texte)) {
            echo "Votre message a bien été envoyé, merci";
        }

        else {
            echo "Il y'a une erreur quelque part !";
        }
    }

}


?>