<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectCategoryRepository extends EntityRepository {

    /**
     * returns the list of projects of a user
     * @return type
     */
    public function createGenericCategory($user_id) {
        $query = "INSERT INTO project_category(user_id, category_name, is_generic) VALUES(:user_id, :category_name, 1)";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_name' => 'General'));
    }

    public function getProjectCategoriesByUserId($user_id) {
        $query = "SELECT * FROM project_category WHERE user_id=:user_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id));

        $result = $q->fetchAll(2);
        return $result;
    }

    public function userOwnsCategory($user_id, $project_category) {
        $query = "SELECT COUNT(id) as cnt FROM project_category WHERE user_id=:user_id AND id=:category_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_id' => $project_category));

        $result = $q->fetch(2);
        return $result['cnt'];
    }

    public function createProjectCategory($user_id, $category_name) {
        $query = "INSERT INTO project_category(user_id, category_name, is_generic) VALUES(:user_id, :category_name, 0)";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_name' => $category_name));
    }

    public function modifyProjectCategory($user_id, $category_id, $category_name) {
        $query = "
            UPDATE project_category
            SET category_name=:category_name
            WHERE id=:category_id
            AND user_id=:user_id
        ";

        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_id' => $category_id, ':category_name' => $category_name));
    }
    
    public function getProjectCategoryByUserId($user_id, $category_id) {
        $query = "SELECT * FROM project_category WHERE user_id=:user_id AND id=:category_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_id' => $category_id));

        $result = $q->fetch(2);
        return $result;
    }


    public function deleteProjectCategoryById($user_id, $category_id) {
        $query = "DELETE FROM project_category WHERE user_id=:user_id AND is_generic=0 AND id=:category_id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id, ':category_id' => $category_id));
    }

}