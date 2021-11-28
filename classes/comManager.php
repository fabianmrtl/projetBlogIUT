<?php require_once 'commentaire.php';
class commentairesManager{
    private $bdd;
    private $commentaire;

    public function __construct(PDO $bdd){
        $this->setBdd($bdd);
    }

    function getBdd() {
        return $this->bdd;
    }

    function setBdd($bdd){
        $this->bdd = $bdd;
    }

    function get_commentaire() {
        return $this->commentaire;
    }

    function set_commentaire($commentaire) {
        $this->_commentaire = $commentaire;
    }

    public function getCommentaire($id) {
        $ListCommentaire = [];

        $sql = 'SELECT * FROM commentaire WHERE id_article = ?';

        $req = $this->bdd->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute(array($id));

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $commentaire = new Commentaires();
            $commentaire->hydrate($donnees);
            $ListCommentaire[] = $commentaire;
        }


        return $ListCommentaire;
    }

    public function add(Commentaires $commentaire){
        $sql ="INSERT INTO commentaire (auteur, content, date ,id_article) VALUES (:auteur, :content, :date, :id_article)";
        $req = $this->bdd->prepare($sql);
        $req->bindValue(':auteur', $commentaire->getauteur(), PDO::PARAM_STR);
        $req->bindValue(':content', $commentaire->getcontent(), PDO::PARAM_STR);
        $req->bindValue(':date', $commentaire->getDate(), PDO::PARAM_STR);
        $req->bindValue(':id_article', $commentaire->getIdArticle(), PDO::PARAM_INT);
        $req->execute();
        return $this;
    }
}