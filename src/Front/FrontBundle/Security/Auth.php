<?php

namespace Front\FrontBundle\Security;

class Auth {

    static private $_not_allowed_params = array('login_status');

    static public function setAuth($status = true) {
        if ($status) {
            $_SESSION['seowatchman']['auth']['login_status'] = 'in';
        } else {
            unset($_SESSION['seowatchman']['auth']);
        }
    }

    static public function isAuth() {
        return @$_SESSION['seowatchman']['auth']['login_status'] == 'in';
    }

    static public function setAuthParam($param_name, $param_value) {
        if (in_array($param_name, self::$_not_allowed_params)) {
            throw new Exception('Param not allowed');
        }
        $_SESSION['seowatchman']['auth'][$param_name] = $param_value;
    }

    static public function getAuthParam($param_name) {
        return @$_SESSION['seowatchman']['auth'][$param_name];
    }

    static public function getMaxDomains() {
        $packages_projects = array(1 => '1', 2 => '5', 3 => '20');

        $package_id = self::getAuthParam('package_id');
        if (self::getAuthParam('is_trial') == 1) {
            $max_domains = 1;
        } else {
            $max_domains = $packages_projects[$package_id];
        }
        return $max_domains;
    }
    
    static public function getMaxCompetitors() {
        $packages_competitors = array(1 => '1', 2 => '5', 3 => '20');

        $package_id = self::getAuthParam('package_id');
        if (self::getAuthParam('is_trial') == 1) {
            $max_competitors = 5;
        } else {
            $max_competitors = $packages_competitors[$package_id];
        }
        return $max_competitors;
    }

    static public function getMaxKeywords() {
        $packages_projects = array(1 => '3', 2 => '20', 3 => '200');

        $package_id = self::getAuthParam('package_id');
        if (self::getAuthParam('is_trial') == 1) {
            $max_keywords = 10;
        } else {
            $max_keywords = $packages_projects[$package_id];
        }
        return $max_keywords;
    }

}

?>
