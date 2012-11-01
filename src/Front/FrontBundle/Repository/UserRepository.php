<?php

namespace Front\FrontBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    /**
     * checks if email exists in DB
     * @return type
     */
    public function checkEmailExists($email) {
        $query = "SELECT COUNT(id) AS cnt FROM user WHERE email=:email";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $email));

        $result = $q->fetch(2);
        return $result['cnt'];
    }

    /**
     * checks if user had trial
     * @return type
     */
    public function userHadTrial($email) {
        $query = "SELECT COUNT(id) AS cnt FROM user WHERE email=:email AND is_trial=2";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $email));

        $result = $q->fetch(2);
        return $result['cnt'];
    }

    /**
     * checks if hash exists in DB
     * @return type
     */
    public function checkHashExists($hash) {
        $query = "SELECT COUNT(id) AS hash_exists, is_trial FROM user WHERE activation_hash=:hash AND has_activated_email=0";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':hash' => $hash));

        $result = $q->fetch(2);
        return $result;
    }

    /**
     * activated email
     * @return type
     */
    public function actiavateHash($hash, $trial=false) {
        $sql = false;
        if($trial) {
            $sql = ", trial_start=NOW()";
        }
        $query = "UPDATE user SET has_activated_email=1".$sql." WHERE activation_hash=:hash";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':hash' => $hash));
    }

    /**
     * 
     * @return type
     */
    public function setHasCompletedProfile($user_id) {
        $query = "UPDATE user SET has_completed_profile=1 WHERE id=:id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':id' => $user_id));
    }

    /**
     * create a user for the first step
     * @param string $email
     * @param string $pass
     * @param int $package_id
     */
    public function createUser($email, $pass, $package_id, $is_trial) {
        $hash_length = 10;
        $string = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $string = str_shuffle($string);
        $rand = rand(0, strlen($string) - $hash_length);
        $secret_hash = substr($string, $rand, $hash_length);

        while ($this->secretHashExists($secret_hash)) {
            $string = str_shuffle($string);
            $rand = rand(0, strlen($string) - $hash_length);
            $secret_hash = substr($string, $rand, $hash_length);
        }

        $query = "
            INSERT INTO user(package_id, email, pass, activation_hash, secret_hash, has_activated_email, has_payed, is_deleted, has_completed_profile, is_trial, added)
            VALUES(:package_id, :email, :pass, :activation_hash, :secret_hash, 0, 0, 0, 0, :is_trial, NOW())
        ";
        
        
        $params = array(
            ':package_id' => $package_id,
            ':email' => $email,
            ':pass' => $pass,
            ':activation_hash' => md5($email . $pass . $package_id . rand(0, 9000)),
            ':secret_hash' => strtoupper($secret_hash),
            ':is_trial' => (int)$is_trial,
        );
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, $params);
        $params[':last_insert_id'] = $this->getEntityManager()->getConnection()->lastInsertId();
        
        return $params;
    }

    /**
     * checks if secret hash exists
     * @param string $secret_hash
     * @return type
     */
    public function secretHashExists($secret_hash) {
        $query = "SELECT COUNT(id) AS cnt FROM user WHERE secret_hash=:secret_hash";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':secret_hash' => $secret_hash));

        $result = $q->fetch(2);
        return $result['cnt'];
    }

    /**
     * returns secret_hash by email
     * @param string $email
     * @return type
     */
    public function getSecretHashByEmail($email) {
        $query = "SELECT activation_hash, is_deleted, has_activated_email FROM user WHERE email=:email";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $email));

        $result = $q->fetch(2);
        return $result;
    }

    /**
     * returns password by email
     * @param string $email
     * @return type
     */
    public function getPasswordByEmail($email) {
        $query = "SELECT is_deleted, has_activated_email, pass FROM user WHERE email=:email";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $email));

        $result = $q->fetch(2);
        return $result;
    }

    /**
     * returns user by email+password
     * @param string $login_email
     * @param string $login_pass
     * @return type
     */
    public function getUserAuth($login_email, $login_pass) {
        $query = "SELECT id, f_name, l_name, is_deleted, has_activated_email, has_completed_profile, is_trial, package_id FROM user WHERE email=:email AND pass=:pass";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':email' => $login_email, ':pass' => $login_pass));

        $result = $q->fetch(2);
        return $result;
    }

    /**
     * for step 3 registration: adds more user data in db
     * @param integer $id
     * @param string $f_name
     * @param string $l_name
     * @return type
     */
    public function getAddUserData($id, $f_name, $l_name) {
        $query = "UPDATE user SET f_name=:f_name, l_name=:l_name WHERE id=:id";
        $q = $this->getEntityManager()->getConnection()->executeQuery($query, array(':f_name' => $f_name, ':l_name' => $l_name, ':id' => $id));
    }

}