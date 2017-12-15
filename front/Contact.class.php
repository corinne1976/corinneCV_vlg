<?php
class Contact {	// Une classe peut contenir plusieurs méthodes (ou fonctions)
// par ex. une classe voiture peut avoir comme méthodes 'freiner' et 'accélerer' et quand je créé un objet de la classe voiture, par ex. un 308 ou une porsche qui auront les  fonctionnalités de la classe voiture comme freiner' et 'accélerer'
 // déclaration des variables = champs de la table t_commentaires.sql
    private $nom;//variable privée, on ne peut modifier la variable qu'en passant par les méthodes de la class Contact
    private $email;
    private $sujet;
    private $message;
    // Bonus - pour l'email
   private $to;
   private $headers;

    // fonction d'insertion en BDD
    public function insertContact($nom, $email, $sujet, $message) {
    	// on récupère les données rentrées par l'utilisateur
        $this->nom = strip_tags($nom);// pour annuler les espace comme addslashes
		$this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);

        // appelle la connexion à la BDD
        require('connexion.php');// on a besoin de se connecter maintenant

        // on crée une requête puis on l'exécute
        $req = $bdd->prepare('INSERT INTO t_commentaires (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :message)');// je  prepare les champs que je vais remplir
        $req->execute([// j'applique sur mon $req une méthode on créé une requête et on l'exécute
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
