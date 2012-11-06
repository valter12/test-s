<?php

namespace Backend\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PaymentsController extends Controller {

    private function checkLogin() {
        $session = $this->getRequest()->getSession();
        if ($session->get('auth') !== 'in') {
            return $this->redirect($this->generateUrl('BackendBackendBundle_login'));
        }
    }

    /**
     * all payments
     */
    public function indexAction() {
        if ($this->checkLogin()) {
            return $this->checkLogin();
        }
        $request = $this->getRequest();
        
        $filter_params = array();
        
        $request->get('from_date')?($filter_params['from_date']=$request->get('from_date')):'';
        $request->get('to_date')?($filter_params['to_date']=$request->get('to_date')):'';
        $request->get('user_id')?($filter_params['user_id']=$request->get('user_id')):'';
        $request->get('package_id')?($filter_params['package_id']=$request->get('package_id')):'';
        $request->get('payment_method')?($filter_params['payment_method']=$request->get('payment_method')):'';
        
        $payement_methods = array(
            'moneybookers',
            'paypal',
            'credit card',
        );
        
        $em = $this->getDoctrine()->getEntityManager();
        
        
        
        $payments = $em->getRepository('FrontFrontBundle:Payments')->getAllPayments($filter_params);
        $users = $em->getRepository('FrontFrontBundle:User')->getAllUsers();
        $packages = $em->getRepository('FrontFrontBundle:User')->getAllPackages();
        $payment_stats = $em->getRepository('FrontFrontBundle:Payments')->getPaymentsStats($filter_params);
        $payment_stats_per_method = $em->getRepository('FrontFrontBundle:Payments')->getPaymentsStatsPerMethod();
        $payment_method_percent = $em->getRepository('FrontFrontBundle:Payments')->getPaymentsMethodPercentage($filter_params);
        
        return $this->render('BackendBackendBundle:Payments:index.html.twig', array(
                                                                                    'payments' => $payments, 
                                                                                    'users' => $users, 
                                                                                    'packages' => $packages, 
                                                                                    'payement_methods' => $payement_methods,
                                                                                    'payment_stats' => $payment_stats,
                                                                                    'payment_stats_per_method' => $payment_stats_per_method,
                                                                                    'payment_method_percent' => $payment_method_percent,
                                                                                ));
    }

}
