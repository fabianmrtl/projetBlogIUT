<?php 

class articles {
    
    public $id;
    public $titre;
    public $texte;
    public $date;
    public $publie;

    function getId() {
        return $this->id;
    }
    
    function getTitre() {
        return $this->titre;
    }

    function getText() {
        return $this->texte;
    }

    function getDate() {
        return $this->date;
    }

    function getPublie() {
        return $this->publie;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setText($texte) {
        $this->id = $texte;
    }

    function setDate($date) {
        $this->id = $date;
    }

    function setPublie($publie) {
        $this->id = $publie;
    }
   
    public function hydrate($donnees) {
        if(isset($donnees['id'])) {
            $this->id = $donnees['id'];
        } 
        
        else {
            $this->id = '';
        }

        if(isset($donnees['titre'])) {
            $this->titre = $donnees['titre'];
        } 
        
        else {
            $this->titre = '';
        }

        if(isset($donnees['titre'])) {
            $this->titre = $donnees['titre'];
        } 
        
        else {
            $this->titre = '';
        }

        if(isset($donnees['texte'])) {
            $this->texte = $donnees['texte'];
        } 
        
        else {
            $this->texte = '';
        }

        if(isset($donnees['date'])) {
            $this->date = $donnees['date'];
        } 
        
        else {
            $this->date = '';
        }

        if(isset($donnees['publie'])) {
            $this->publie = $donnees['publie'];
        } 
        
        else {
            $this->publie = 0;
        }
    }
}