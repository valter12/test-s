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
    
    public function getAllUsersChart() {
        $query = "
            SELECT 
                DATE_FORMAT(u.added, '%Y-%m-%d') as date,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d')) as cnt_users
            FROM user u
            GROUP BY DATE_FORMAT(u.added, '%Y-%m-%d')
            ORDER BY DATE_FORMAT(u.added, '%Y-%m-%d') ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * gets the trial users over time and trial users that had become clients
     */
    public function getTrialVsRealUsersChart() {
        $query = "
            SELECT 
                DATE_FORMAT(u.added, '%Y-%m-%d') as date,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.is_trial=1) as cnt_trial_users,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.was_trial=1) as cnt_real_users
            FROM user u
            GROUP BY DATE_FORMAT(u.added, '%Y-%m-%d')
            ORDER BY DATE_FORMAT(u.added, '%Y-%m-%d') ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * gets the trial users over time and trial users that had left the site without becoming clients
     */
    public function getTrialVsGoneUsersChart() {
        $query = "
            SELECT 
                DATE_FORMAT(u.added, '%Y-%m-%d') as date,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.is_trial=1) as cnt_trial_users,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.is_trial=1 AND u1.is_deleted=1) as cnt_gone_users
            FROM user u
            GROUP BY DATE_FORMAT(u.added, '%Y-%m-%d')
            ORDER BY DATE_FORMAT(u.added, '%Y-%m-%d') ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * gets the real users over time and real users that had left the site (not paying)
     */
    public function getRealVsGoneUsersChart() {
        $query = "
            SELECT 
                DATE_FORMAT(u.added, '%Y-%m-%d') as date,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.is_trial=0) as cnt_real_users,
                (SELECT COUNT(u1.id) FROM user u1 WHERE DATE_FORMAT(u1.added, '%Y-%m-%d')<=DATE_FORMAT(u.added, '%Y-%m-%d') AND u1.is_trial=0 AND u1.is_deleted=1) as cnt_gone_users
            FROM user u
            GROUP BY DATE_FORMAT(u.added, '%Y-%m-%d')
            ORDER BY DATE_FORMAT(u.added, '%Y-%m-%d') ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    /**
     * get percentage of used packages
     */
    public function getUserPackagesPercentageChart() {
        $query = "
            SELECT 
                p.package_name, 
                ROUND(COUNT(u.package_id)*100/(SELECT COUNT(id) FROM user WHERE is_deleted=0)) AS percent
            FROM user u, package p
            WHERE u.package_id=p.id
            AND u.is_deleted=0
            GROUP BY p.id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array());
        $result = $q->fetchAll(2);
        return $result;
    }
    
    public function deleteUser($user_id, $deleted=1) {
        $query = "
            UPDATE user SET is_deleted=:deleted WHERE id=:id
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':deleted' => $deleted, ':id' => $user_id));
    }
    
    /**
     * get user payments
     */
    public function getUserPayments($user_id) {
        $query = "
            SELECT pa.*, p.package_name as package, u.f_name, u.l_name
            FROM payments pa LEFT JOIN package p ON pa.package_id=p.id, user u
            WHERE u.id=pa.user_id
            AND u.id=:user_id
            ORDER BY pa.added ASC
        ";
        
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':user_id' => $user_id));
        $result = $q->fetchAll(2);
        return $result;
    }

}