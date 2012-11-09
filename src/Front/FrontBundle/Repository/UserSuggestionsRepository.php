<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserSuggestionsRepository extends EntityRepository {

    public function saveSuggestion($title, $content, $email) {
        $query = "
            INSERT INTO user_suggestions(email, title, content, added)
            VALUES(:email, :title, :content, NOW())
        ";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $email, ':content' => $content, ':title'=> $title));
    }

}