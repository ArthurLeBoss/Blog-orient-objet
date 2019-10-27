<?php

class Post
{
    private $id;
    private $titre;
    private $contenu;
    private $categorie;
       
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->titre;
    }

    public function setTitle(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getContent(): string
    {
        return $this->contenu;
    }

    public function setContent(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    #Fonction pour la connexion et l'inscription OO.

    // public function setPseudo(string $pseudo): self
    // {
    //     $this->pseudo = $pseudo;
    //     return $this;
    // }

    // public function getPass(): string
    // {
    //     return $this->pass;
    // }

    // public function setPass(string $pass): self
    // {
    //     $this->pass = $pass;
    //     return $this;
    // }

    // public function getMail(): string
    // {
    //     return $this->mail;
    // }

    // public function setMail(string $mail): self
    // {
    //     $this->mail = $mail;
    //     return $this;
    // }
}
