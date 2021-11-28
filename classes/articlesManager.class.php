<?php

class articlesManager {
    private $bdd;
    private $result;
    private $message;
    private $articles;
    private $getLastInsertId;

    public function __construct(PDO $bdd) {
        $this->setBdd($bdd);
    }

    function getBdd() {
        return $this->bdd;
    }

    function get_result() {
        return $this->result;
    }

    function get_message() {
        return $this->message;
    }

    function get_articles() {
        return $this->articles;
    }

    function get_getLastInsertId() {
        return $this->getLastInsertId;
    }

    function setBdd($bdd) {
        $this->bdd = $bdd;
    }

    function set_result($result) {
        $this->result = $result;
    }

    function set_message($message) {
        $this->message = $message;
    }

    function set_articles($articles) {
        $this->articles = $articles;
    }

    function set_getLastInsertId($getLastInsertId) {
        $this->getLastInsertId = $getLastInsertId;
    }
    
    public function get($id) {
        $sql = 'SELECT * FROM articles WHERE id = :id';
        $req = $this->bdd->prepare($sql);

        $req->bindvalue(':id',$id,PDO::PARAM_INT);
        $req->execute();

        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        $articles = new articles();
        $articles->hydrate($donnees);
        return $articles;
    }

    public function countArticlesPublie(){
        $sql = "SELECT COUNT(*) as total FROM articles";
        $req = $this->bdd->prepare($sql);
        $req->execute();
        $count = $req->fetch(PDO::FETCH_ASSOC);
        $total = $count['total'];
        return $total;
    }

    public function getList($depart, $limit) {
        $listArticles = [];
        $sql = 'SELECT id,' . ' titre, ' . ' texte, ' . ' publie, ' . ' DATE_FORMAT(date, "%d/%m/%Y") as date' . ' FROM articles ' . ' LIMIT :depart, :limit';
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':depart', $depart, PDO::PARAM_INT);
        $req->bindValue(':limit', $limit, PDO::PARAM_INT);

        $req->execute();

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles = new articles();
            $articles->hydrate($donnees);
            $listArticles[] = $articles;
        }

        return $listArticles;
    }

    public function add(articles $articles){
        $sql ="INSERT INTO articles (titre, texte, publie, date) VALUES (:titre, :texte, :publie, :date)";
        //Sécurisation des variables
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':titre', $articles->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':texte', $articles->getTexte(), PDO::PARAM_STR);
        $req->bindValue(':publie', $articles->getPublie(), PDO::PARAM_INT);
        $req->bindValue(':date', $articles->getDate(), PDO::PARAM_STR);
        //Éxécution de la requete
        $req->execute();
        if ($req->errorCode() == 00000){
            $this->_result = true;
            $this->_getLastInsertId = $this->bdd->LastInsertId();
        } 
        
        else {
        $this->_result = false;
        }
        return $this;
    }

    public function getListArticlesFromRecherche($recherche) {
        $listArticles = [];

        $sql = 'SELECT id, '
            . 'titre, '
            . 'texte, '
            . 'publie, '
            . 'DATE_FORMAT(date, "%d/%m/%Y") as date '
            . 'FROM articles '
            . 'WHERE publie = 1 '
            . 'AND (titre LIKE :recherche '
            . 'OR texte LIKE :recherche) ';
        
        $req = $this->bdd->prepare($sql);

        $req->binValue(':recherche', "%" . $recherche . "%", PDO::PARAM_STR);

        $req->execute();

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles = new articles();
            $articles->hydrate($donnees);
            $listArticles[] = $articles;
        }

        return $listArticles;
    }
}