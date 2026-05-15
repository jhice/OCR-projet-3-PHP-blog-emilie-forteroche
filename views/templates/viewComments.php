<article class="mainArticle">
    <h2> Affichage des commentaires de l'article </h2>
    <h3> <?= Utils::format($article->getTitle()) ?> </h3>

    <div class="">
        <span class="info"> Publié le <?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?>
            <?php if ($article->getDateUpdate() != null) { ?>
                , modifié le <?= Utils::convertDateToFrenchFormat($article->getDateUpdate()) ?></span>
    <?php } ?>
    </div>
</article>

<div class="comments">
    <h2 class="commentsTitle">Commentaires</h2>
    <?php
    if (empty($comments)) {
        echo '<p class="info">Aucun commentaire pour cet article.</p>';
    } else {
        echo '<ul>';
        foreach ($comments as $comment) { ?>
            <li>
                <div class="smiley">☻</div>
                <div class="detailComment">
                    <h3 class="info">Le <?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?>, <?= Utils::format($comment->getPseudo()) ?> a écrit :</h3>
                    <p class="content"><?= Utils::format($comment->getContent()) ?></p> 
                    <p>
                        <a class="submit" href="index.php?action=deleteComment&id=<?= $comment->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?>>Supprimer</a>
                    </p>
                </div>
            </li>
    <?php }
        echo '</ul>';
    }
    ?>