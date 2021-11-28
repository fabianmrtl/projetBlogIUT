<?php

class Commentaires {
    public $id;
    public $auteur;
    public $content;
    public $date;
    public $id_article;

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article): void
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function hydrate($donnees){
        if(isset($donnees['id'])) {
            $this->id = $donnees['id'];}
        else {
            $this->id = '';
        }

        if(isset($donnees['auteur'])) {
            $this->auteur = $donnees['auteur'];}
        else {
            $this->auteur = '';
        }

        if(isset($donnees['content'])) {
            $this->content = $donnees['content'];}
        else {
            $this->content = '';
        }

        if(isset($donnees['date'])) {
            $this->date = $donnees['date'];}
        else {
            $this->date = '';
        }

        if(isset($donnees['id_article'])) {
            $this->id_article = $donnees['id_article']; }
        else {
            $this->id_article = '';
        }


    }
}
