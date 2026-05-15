<?php

/** 
 * Affichage de la partie admin : liste des articles pour monitoring.
 * Avec titre, nombre de vues, le nombre de commentaires, la date de publication de l’article.
 */
?>

<h2>Monitoring des articles</h2>

<table class="adminArticle">
    <thead>
        <tr>
            <th>Titre</th>
            <th class="number">Vues</th>
            <th class="number">Commentaires</th>
            <th>Publié le</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr class="tableLine">
                <td><?= $article->getTitle() ?></td>
                <td class="number"><?= $article->getViewCount() ?></td>
                <td class="number"><?= $article->getCommentCount() ?></td>
                <td><span class=""><?= Utils::convertDateToShortFrenchFormat($article->getDateCreation()) ?></span></td>
            </tr>
        <?php } ?>
    </tbody>
</table>