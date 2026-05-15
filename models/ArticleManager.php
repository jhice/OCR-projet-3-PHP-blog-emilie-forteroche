<?php

/**
 * Classe qui gère les articles.
 */

// fonctions de tri
require_once "./services/functions.php";

class ArticleManager extends AbstractEntityManager
{
    /**
     * Récupère tous les articles.
     * @return array : un tableau d'objets Article.
     */
    public function getAllArticles(): array
    {
        $sql = "SELECT * FROM article";
        $result = $this->db->query($sql);
        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }

    /**
     * Récupère un article par son id.
     * @param int $id : l'id de l'article.
     * @return Article|null : un objet Article ou null si l'article n'existe pas.
     */
    public function getArticleById(int $id): ?Article
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $article = $result->fetch();
        if ($article) {
            return new Article($article);
        }
        return null;
    }

    /**
     * Ajoute ou modifie un article.
     * On sait si l'article est un nouvel article car son id sera -1.
     * @param Article $article : l'article à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateArticle(Article $article): void
    {
        if ($article->getId() == -1) {
            $this->addArticle($article);
        } else {
            $this->updateArticle($article);
        }
    }

    /**
     * Ajoute un article.
     * @param Article $article : l'article à ajouter.
     * @return void
     */
    public function addArticle(Article $article): void
    {
        $sql = "INSERT INTO article (id_user, title, content, date_creation) VALUES (:id_user, :title, :content, NOW())";
        $this->db->query($sql, [
            'id_user' => $article->getIdUser(),
            'title' => $article->getTitle(),
            'content' => $article->getContent()
        ]);
    }

    /**
     * Modifie un article.
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function updateArticle(Article $article): void
    {
        $sql = "UPDATE article SET title = :title, content = :content, date_update = NOW() WHERE id = :id";
        $this->db->query($sql, [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'id' => $article->getId()
        ]);
    }

    /**
     * Supprime un article.
     * @param int $id : l'id de l'article à supprimer.
     * @return void
     */
    public function deleteArticle(int $id): void
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }

    /**
     * Modifie le compteur de vues d'un article.
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function addView(Article $article): void
    {
        $sql = "UPDATE article SET view_count = view_count + 1, date_update = NOW() WHERE id = :id";
        $this->db->query($sql, [
            'id' => $article->getId()
        ]);
    }

    /**
     * Modifie le compteur de commentaires d'un article.
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function updateCommentCount(Article $article): void
    {
        $sql = "UPDATE article SET comment_count = (SELECT count(*) FROM comment WHERE id_article = :id) WHERE article.id = :id;";
        $this->db->query($sql, [
            'id' => $article->getId()
        ]);
    }

    /**
     * Tri des articles
     * 
     * @param array $articles Articles à trier
     * @param string $sortColumn Colonne de tri
     * @param string $sortOrder Sens du tri
     */
    public function sortArticles(array $articles, string $sortColumn, string $sortOrder)
    {
        // validation des filtres
        // colonne valide ?
        if (!in_array($sortColumn, ["titre", "vues", "commentaires", "publication"])) {
            $sortColumn = "titre";
        }
        // sens valide ?
        if (!in_array($sortOrder, ["asc", "desc"])) {
            $sortOrder = "asc";
        }

        // print_r($articles);

        // Trie et affiche le tableau résultant
        // appel dynamique sur des fonctions à la racinde de PHP
        uasort($articles, $sortColumn.ucfirst($sortOrder));

        return $articles;
    }
}
