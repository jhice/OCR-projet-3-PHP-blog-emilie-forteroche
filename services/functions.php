    <?php

    /**
     * Fonctions pour le tri des articles côté admin
     */
    function titreAsc(Article $a, Article $b)
    {
        if ($a->getTitle() == $b->getTitle()) {
            return 0;
        }
        return ($a->getTitle() < $b->getTitle()) ? -1 : 1;
    }

    function titreDesc(Article $a, Article $b)
    {
        if ($a->getTitle() == $b->getTitle()) {
            return 0;
        }
        return ($a->getTitle() > $b->getTitle()) ? -1 : 1;
    }

    function vuesAsc(Article $a, Article $b)
    {
        if ($a->getViewCount() == $b->getViewCount()) {
            return 0;
        }
        return ($a->getViewCount() < $b->getViewCount()) ? -1 : 1;
    }

    function vuesDesc(Article $a, Article $b)
    {
        if ($a->getViewCount() == $b->getViewCount()) {
            return 0;
        }
        return ($a->getViewCount() > $b->getViewCount()) ? -1 : 1;
    }

    function commentairesAsc(Article $a, Article $b)
    {
        if ($a->getCommentCount() == $b->getCommentCount()) {
            return 0;
        }
        return ($a->getCommentCount() < $b->getCommentCount()) ? -1 : 1;
    }

    function commentairesDesc(Article $a, Article $b)
    {
        if ($a->getCommentCount() == $b->getCommentCount()) {
            return 0;
        }
        return ($a->getCommentCount() > $b->getCommentCount()) ? -1 : 1;
    }

    function PublicationAsc(Article $a, Article $b)
    {
        if ($a->getDateCreation() == $b->getDateCreation()) {
            return 0;
        }
        return ($a->getDateCreation() < $b->getDateCreation()) ? -1 : 1;
    }

    function PublicationDesc(Article $a, Article $b)
    {
        if ($a->getDateCreation() == $b->getDateCreation()) {
            return 0;
        }
        return ($a->getDateCreation() > $b->getDateCreation()) ? -1 : 1;
    }
