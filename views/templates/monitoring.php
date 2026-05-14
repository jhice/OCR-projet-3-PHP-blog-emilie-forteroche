<?php 
    /** 
     * Affichage de la partie admin : liste des articles pour monitoring.
     * Avec titre, nombre de vues, le nombre de commentaires, la date de publication de l’article.
     */
?>

<h2>Monitoring des articles</h2>

<div class="adminArticle">
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="content">Vues : <?= $article->getViewCount() ?></div>
            <div class="content">Commentaires : <?= $article->getCommentCount() ?></div>
            <div class="content"><span class="info"> Publié le <?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></span></div>
            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
        </div>
    <?php } ?>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>