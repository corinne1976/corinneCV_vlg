<?php
class Contact {
 	// déclaration des variables = champs de la table t_commentaires.sql
    private $nom;
    private $email;
    private $sujet;
    private $message;
    // Bonus - pour l'email
   private $to;
   private $headers;

    // fonction d'insertion en BDD
    public function insertContact($nom, $email, $sujet, $message) {
    	// on récupère les données rentrées par l'utilisateur
        $this->nom = strip_tags($nom);
		$this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);

        // appelle la connexion à la BDD
        require('connexion.php');

        // on crée une requête puis on l'exécute
        $req = $bdd->prepare('INSERT INTO t_commentaires (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)');
        $req->execute([
        	':nom'	=> $this->nom,//n attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'^tre posté
            ':email'	=> $this->email,
            ':sujet'	=> $this->sujet,
            ':message'	=> $this->message]);

            // on ferme la requête pour protéger des injections
            $req->closeCursor();
    }

    // Bonus - envoi d'un email
     public function sendEmail($sujet, $email, $message) {
         $this->to = 'tinamendim@gmail.com';
         $this->email = strip_tags($email);
         $this->sujet = strip_tags($sujet);
         $this->message = strip_tags($message);
         $this->headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
         $this->headers .= 'MIME-version: 1.0' . "\r\n";
         $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";

         // on utilise la fonction mail() de PHP
         mail($this->to, $this->sujet, $this->message, $this->headers);
     }


 }
