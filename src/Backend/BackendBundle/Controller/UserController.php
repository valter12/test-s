<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth;

class UserController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }

    /**
     * list of users
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $users = $em->getRepository('FrontFrontBundle:User')->getAllUsers();
        return $this->render('BackendBackendBundle:User:index.html.twig', array('users' => $users));
    }

    public function userActionsAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $id = $request->get('id');
        $todo = $request->get('todo');

        $data = $em->getRepository('FrontFrontBundle:User')->getUserDataById($id);
        
        Auth::setAuth();
        Auth::setAuthParam('id', $data['id']);
        Auth::setAuthParam('f_name', $data['f_name']);
        Auth::setAuthParam('l_name', $data['l_name']);
        Auth::setAuthParam('is_trial', $data['is_trial']);
        Auth::setAuthParam('package_id', $data['package_id']);
        
        if (!is_numeric($id) || !$todo) {
            die('Request must have an id and todo variable.');
        }

        switch ($todo) {
            case 'modify':
                return $this->__modifyUser();
                break;
            case 'projects':
                return $this->__userProjects();
                break;
            case 'reports':
                return $this->redirect($this->generateUrl('account_report_list'));
                break;
            case 'payments':
                return $this->__userPayments();
                break;
            case 'delete':
                $em = $this->getDoctrine()->getEntityManager();
                $em->getRepository('FrontFrontBundle:User')->deleteUser($id, 1);
                return $this->redirect($this->generateUrl('BackendBackendBundle_user'));
                break;
            case 'undelete':
                $em = $this->getDoctrine()->getEntityManager();
                $em->getRepository('FrontFrontBundle:User')->deleteUser($id, 0);
                return $this->redirect($this->generateUrl('BackendBackendBundle_user'));
                break;
        }
    }

    protected function __userPayments() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $id = $request->get('id');

        $user_payments = $em->getRepository('FrontFrontBundle:User')->getUserPayments($id);
        return $this->render('BackendBackendBundle:User:user_payments.html.twig', array('user_payments' => $user_payments));
    }

    protected function __modifyUser() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $id = $request->get('id');
        $execute_todo = $request->get('execute_todo');

        if ($execute_todo == 'save_user') {
            $em->getRepository('FrontFrontBundle:User')->updateUserData($id, $_POST);
            return $this->redirect($this->generateUrl('BackendBackendBundle_user'));
        }

        $user = $em->getRepository('FrontFrontBundle:User')->getUserDataById($id);
        $packages = $em->getRepository('FrontFrontBundle:User')->getAllPackages();
        return $this->render('BackendBackendBundle:User:modify_user.html.twig', array('user' => $user, 'packages' => $packages));
    }

    protected function __userProjects() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $id = $request->get('id');

        $projects = $em->getRepository('FrontFrontBundle:Project')->getProjects($id);
        return $this->render('BackendBackendBundle:User:user_projects.html.twig', array('project_list' => $projects));
    }
    
    public function userChartsAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $project_user_stats = $em->getRepository('FrontFrontBundle:Project')->getProjectStats();
        $package_stats = $em->getRepository('FrontFrontBundle:Project')->getPackageStats();
/**** REGISTERED USERS ****/
        $registered_users = $em->getRepository('FrontFrontBundle:User')->getAllUsersChart();
        
        $dates = $final_result = array();
        $cnt = count($registered_users);
        for($i=0;$i<$cnt;$i++) {
            $dates[] = $registered_users[$i]['date'];
            $final_result[] = $registered_users[$i]['cnt_users'];
        }
        
        $registered_users_params = array(
            'cht' => 'lc',
            'chtt' => 'Registered users over time',
            'chs' => '700x300',
            'chxt' => 'x,y',
            'chd' => 't:' . implode(',', $final_result),
            'chxl' => '0:|' . implode('|', $dates)//. '|1:||1||'.(max($final_result)+5),
        );
        
        $registered_user_param = $this->__formChartUrl($registered_users_params);
        
/**** TRIAL VS REAL USERS (trial users and trial users that have become clients) ****/
        $trial_vs_real = $em->getRepository('FrontFrontBundle:User')->getTrialVsRealUsersChart();
        $dates = $trial_users = $real_users = array();
        $cnt = count($trial_vs_real);
        for($i=0;$i<$cnt;$i++) {
            $dates[] = $trial_vs_real[$i]['date'];
            $trial_users[] = $trial_vs_real[$i]['cnt_trial_users'];
            $real_users[] = $trial_vs_real[$i]['cnt_real_users'];
        }
        $trial_vs_real_params = array(
            'cht' => 'lc',
            'chtt' => 'Trial users and Trial that become clients',
            'chs' => '700x300',
            'chxt' => 'x,y',
            'chd' => 't:' . implode(',', $trial_users).'|'. implode(',', $real_users),
            'chco' => 'FF0000,00C000',
            'chdl' => 'trial users|trial users that became clients',
            'chxl' => '0:|' . implode('|', $dates)//. '|1:||1||'.(max(max($real_users), max($trial_users))+5),
        );
        
        $trial_vs_real_param = $this->__formChartUrl($trial_vs_real_params);
        
/**** TRIAL USERS AND TRIAL USERS THAT HAVE CHOSEN TO LEAVE THE SITE ****/
        $trial_vs_gone = $em->getRepository('FrontFrontBundle:User')->getTrialVsGoneUsersChart();
        $dates = $trial_users = $gone_users = array();
        $cnt = count($trial_vs_gone);
        for($i=0;$i<$cnt;$i++) {
            $dates[] = $trial_vs_gone[$i]['date'];
            $trial_users[] = $trial_vs_gone[$i]['cnt_trial_users'];
            $gone_users[] = $trial_vs_gone[$i]['cnt_gone_users'];
        }
        $trial_vs_gone_params = array(
            'cht' => 'lc',
            'chtt' => 'Trial users and Trial users that didn\'t upgrade',
            'chs' => '700x300',
            'chxt' => 'x,y',
            'chd' => 't:' . implode(',', $trial_users).'|'. implode(',', $gone_users),
            'chco' => 'FF0000,00C000',
            'chdl' => 'trial users|trial users that left the site',
            'chxl' => '0:|' . implode('|', $dates)//. '|1:||1||'.(max(max($trial_users), max($gone_users))+5),
        );
        
        $trial_vs_gone_param = $this->__formChartUrl($trial_vs_gone_params);
        
/**** REAL USERS AND REAL USERS THAT HAVE CHOSEN TO LEAVE THE SITE ****/
        $real_vs_gone = $em->getRepository('FrontFrontBundle:User')->getRealVsGoneUsersChart();
        $dates = $real_users = $gone_users = array();
        $cnt = count($real_vs_gone);
        for($i=0;$i<$cnt;$i++) {
            $dates[] = $real_vs_gone[$i]['date'];
            $real_users[] = $real_vs_gone[$i]['cnt_real_users'];
            $gone_users[] = $real_vs_gone[$i]['cnt_gone_users'];
        }
        $real_vs_gone_params = array(
            'cht' => 'lc',
            'chtt' => 'Real users and Real users that didn\'t pay',
            'chs' => '700x300',
            'chxt' => 'x,y',
            'chd' => 't:' . implode(',', $real_users).'|'. implode(',', $gone_users),
            'chco' => 'FF0000,00C000',
            'chdl' => 'real users|real users that left the site',
            'chxl' => '0:|' . implode('|', $dates),
            
        );
        
        $real_vs_gone_param = $this->__formChartUrl($real_vs_gone_params);
        
/**** PERCENTAGE OF USED PACKAGES ****/
        $packages = $em->getRepository('FrontFrontBundle:User')->getUserPackagesPercentageChart();
        $percentage = $labels = array();
        $cnt = count($packages);
        for($i=0;$i<$cnt;$i++) {
            $percentage[] = $packages[$i]['percent'];
            $labels[] = $packages[$i]['package_name'].' '.$packages[$i]['percent'].'%';
        }
        $packages_params = array(
            'cht' => 'p',
            'chtt' => 'Percentage of used packages',
            'chs' => '700x300',
            'chxt' => 'x,y',
            'chd' => 't:' . implode(',', $percentage),
            'chco' => '3072F3',
            'chdl' => implode('|', $labels),
            'chl' => implode('|', $labels),
            
        );
        
        $packages_param = $this->__formChartUrl($packages_params);
        return $this->render('BackendBackendBundle:User:user_charts.html.twig', array(
                                                                                    'registered_users' => $registered_user_param,
                                                                                    'trial_vs_real_param' => $trial_vs_real_param,
                                                                                    'trial_vs_gone_param' => $trial_vs_gone_param,
                                                                                    'real_vs_gone_param' => $real_vs_gone_param,
                                                                                    'packages_param' => $packages_param,
                                                                                    'project_user_stats' => $project_user_stats,
                                                                                    'package_stats' => $package_stats,
                                                                                ));
    }
    
    protected function __formChartUrl($chart_params) {
        $fields_string = '';
        foreach ($chart_params as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');
        return $fields_string;
    }
    
}
