<?php

namespace Front\FrontBundle\Repository\Backend;

use Doctrine\ORM\EntityRepository;

class BackendUserRepository extends EntityRepository {

    public function getAllUsers() {
        $query = "
            SELECT u.*, 
                (SELECT COUNT(p.id) FROM project p WHERE p.user_id=u.id) AS project_cnt,
                (SELECT COUNT(k.id) FROM keyword k, project p1 WHERE p1.user_id=u.id AND k.project_id=p1.id) AS keyword_cnt
            FROM user u 
            ORDER BY u.added DESC";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function getUserDataById($id) {
        $query = "SELECT u.* FROM user u WHERE u.id=:id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $id));

        $result = $q->fetch(2);
        return $result;
    }
    
    public function getAllPackages() {
        $query = "SELECT p.* FROM package p";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());

        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function updateUserData($id, $data) {
        $query = "
            UPDATE user SET 
                package_id=:package_id,
                email=:email,
                f_name=:f_name,
                l_name=:l_name,
                pass=:pass,
                has_activated_email=:has_activated_email,
                activation_hash=:activation_hash,
                has_payed=:has_payed,
                is_deleted=:is_deleted,
                secret_hash=:secret_hash,
                next_pay_date=:next_pay_date,
                is_trial=:is_trial,
                trial_start=:trial_start
            WHERE id=:id
        ";
        $params = array(
            ':id' => $id,
            ':package_id' => $data['package_id'],
            ':email' => $data['email'],
            ':f_name' => $data['f_name'],
            ':l_name' => $data['l_name'],
            ':pass' => $data['pass'],
            ':has_activated_email' => $data['has_activated_email'],
            ':activation_hash' => $data['activation_hash'],
            ':has_payed' => $data['has_payed'],
            ':is_deleted' => $data['is_deleted'],
            ':secret_hash' => $data['secret_hash'],
            ':next_pay_date' => $data['next_pay_date'],
            ':is_trial' => $data['is_trial'],
            ':trial_start' => $data['trial_start'],
        );
        $this->getEntityManager()->getConnection()->executeQuery($query, $params);
    }

}