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
            <th>
                <a href="?action=monitoring&colonne=titre&sens=<?= View::getOrder("titre", $sortColumn, $sortOrder) ?>">
                    Titre<?= View::getEmoji("titre", $sortColumn, $sortOrder) ?>
                </a>
            </th>
            <th class="number">
                <a href="?action=monitoring&colonne=vues&sens=<?= View::getOrder("vues", $sortColumn, $sortOrder) ?>">
                    Vues<?= View::getEmoji("vues", $sortColumn, $sortOrder) ?>
                </a>
            </th>
            <th class="number">
                <a href="?action=monitoring&colonne=commentaires&sens=<?= View::getOrder("commentaires", $sortColumn, $sortOrder) ?>">
                    Commentaires<?= View::getEmoji("commentaires", $sortColumn, $sortOrder) ?>
                </a>
            </th>
            <th>
                <a href="?action=monitoring&colonne=publication&sens=<?= View::getOrder("publication", $sortColumn, $sortOrder) ?>">
                    Publié le<?= View::getEmoji("publication", $sortColumn, $sortOrder) ?>
                </a>
            </th>
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