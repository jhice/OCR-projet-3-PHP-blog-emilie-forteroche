<?php

/**
 * Classe de tris pour le monitoring
 */

class Sort
{
    public static function titreAsc(Article $a, Article $b)
    {
        if ($a->getTitle() == $b->getTitle()) {
            return 0;
        }
        return ($a->getTitle() < $b->getTitle()) ? -1 : 1;
    }

    public static function titreDesc(Article $a, Article $b)
    {
        if ($a->getTitle() == $b->getTitle()) {
            return 0;
        }
        return ($a->getTitle() > $b->getTitle()) ? -1 : 1;
    }

    public static function vuesAsc(Article $a, Article $b)
    {
        if ($a->getViewCount() == $b->getViewCount()) {
            return 0;
        }
        return ($a->getViewCount() < $b->getViewCount()) ? -1 : 1;
    }

    public static function vuesDesc(Article $a, Article $b)
    {
        if ($a->getViewCount() == $b->getViewCount()) {
            return 0;
        }
        return ($a->getViewCount() > $b->getViewCount()) ? -1 : 1;
    }

    public static function commentairesAsc(Article $a, Article $b)
    {
        if ($a->getCommentCount() == $b->getCommentCount()) {
            return 0;
        }
        return ($a->getCommentCount() < $b->getCommentCount()) ? -1 : 1;
    }

    public static function commentairesDesc(Article $a, Article $b)
    {
        if ($a->getCommentCount() == $b->getCommentCount()) {
            return 0;
        }
        return ($a->getCommentCount() > $b->getCommentCount()) ? -1 : 1;
    }

    public static function PublicationAsc(Article $a, Article $b)
    {
        if ($a->getDateCreation() == $b->getDateCreation()) {
            return 0;
        }
        return ($a->getDateCreation() < $b->getDateCreation()) ? -1 : 1;
    }

    public static function PublicationDesc(Article $a, Article $b)
    {
        if ($a->getDateCreation() == $b->getDateCreation()) {
            return 0;
        }
        return ($a->getDateCreation() > $b->getDateCreation()) ? -1 : 1;
    }
}
