<?php
   

class PostTable
{
    protected $table = 'article';
    private $db;
    
    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} where id=?");
        $sth->execute(array($id));
        $data = $sth->fetch();
        $post = new Post();
        $post->setId($data['id']);
        $post->setTitle($data['titre']);
        $post->setCategorie($data['categorie']);
        $post->setContent($data['contenu']);
        return $post;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function create(Post $article): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (titre, categorie, contenu) VALUES (:titre, :categorie, :contenu)");
        $titre = $article->getTitle();
        $contenu = $article->getContent();
        $categorie = $article->getCategorie();
        $sth->bindParam(':titre', $titre);
        $sth->bindParam(':contenu', $contenu);
        $sth->bindParam(':categorie', $categorie);
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    public function update(Post $article): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} SET titre=:titre, categorie=:categorie, contenu=:contenu WHERE id=:id");
        $id = $article->getId();
        $titre = $article->getTitle();
        $contenu = $article->getContent();
        $categorie = $article->getCategorie();
        $sth->bindParam(':id', $id);
        $sth->bindParam(':titre', $titre);
        $sth->bindParam(':contenu', $contenu);
        $sth->bindParam(':categorie', $categorie);
        $sth->execute();
    }

    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id=? ");
        $sth->execute(array($id));
    }
}
