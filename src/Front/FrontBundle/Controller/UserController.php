<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

/**
 * User controller.
 *
 */
class UserController extends Controller {

    /**
     * 
     * @return type
     * routing login_register
     */
    public function loginRegisterAction() {
        return $this->render('FrontFrontBundle:login_register:login_register.html.twig');
    }
    
    public function logoutAction() {
        Auth::setAuth(false);
        return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * "registration process"
     * @return type
     * routing execute_register_1
     */
    public function registerStep2Action() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $allowed_package_ids = array(1, 2, 3);

        $email = $request->get('register_email');
        $pass = $request->get('register_pass');
        $repass = $request->get('register_repass');
        $captcha = $request->get('captcha');
        $package_id = $request->get('package_id');
        $is_trial = $request->get('is_trial', 0);
        if ($is_trial) { // this variable must be 0 or 1
            $package_id = 2;
        }

        /**
         * @TODO
         * for testing period the package will be 2
         * remove this when in production and payment system implemented
         */
        $package_id = 2;

        if (!in_array($package_id, $allowed_package_ids)) {
            $package_id = 2;
        }

        $email_exists = $em->getRepository('FrontFrontBundle:User')->checkEmailExists($email);
        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
            $this->get('session')->setFlash('error', 'The email "' . $email . '" is not a valid email.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        if ($is_trial) {
            $user_was_trial = $em->getRepository('FrontFrontBundle:User')->userHadTrial($email);
            if ($user_was_trial) {
                $this->get('session')->setFlash('error', 'You cannot have trial multiple times. Please register.');
                return $this->redirect($this->generateUrl('login_register'));
            }
        }

        if ($email_exists) {
            $this->get('session')->setFlash('error', 'The email "' . $email . '" is already registered in our database. If you forgot your password please use "Restore password" function.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        if (strlen($pass) < 6) {
            $this->get('session')->setFlash('error', 'The lenght is too short. Please use a password with a length not less than 6 caracters.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        if ($pass != $repass) {
            $this->get('session')->setFlash('error', 'Your password does not match.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        if ($captcha != $_SESSION['security_number']) {
            $this->get('session')->setFlash('error', 'The security code was invalid.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        $user_data = $em->getRepository('FrontFrontBundle:User')->createUser($email, $pass, $package_id, $is_trial);
        $em->getRepository('FrontFrontBundle:ProjectCategory')->createGenericCategory($user_data[':last_insert_id']);

        $this->sendActivationEmail($email, $user_data[':activation_hash']);

        return $this->render('FrontFrontBundle:login_register:thankyou.html.twig');
    }

    /**
     * sends activation email
     * @param string $email
     * @param string $activation_hash
     */
    private function sendActivationEmail($email, $activation_hash) {
        echo $this->renderView('FrontFrontBundle:Emails:email_confirmation.html.twig', array('activation_link' => 'http://www.seowatchman.com/activate-email?hash=' . $activation_hash));
        return '';
        $message = \Swift_Message::newInstance()
                ->setSubject('SEOwatchman.com - email confirmation')
                ->setFrom('noreply@seowatchman.com')
                ->setTo($email)
                ->setBody($this->renderView('FrontFrontBundle:Emails:email_confirmation.html.twig', array('activation_link' => 'http://www.seowatchman.com/activate-email?hash=' . $activation_hash)))
        ;
        $this->get('mailer')->send($message);
    }

    private function sendPasswordEmail($email, $password) {
        return '';
        $message = \Swift_Message::newInstance()
                ->setSubject('SEOwatchman.com - password recovery')
                ->setFrom('noreply@seowatchman.com')
                ->setTo($email)
                ->setBody($this->renderView('FrontFrontBundle:Emails:password_recovery.html.twig', array('email' => $email, 'password' => $password)))
        ;
        $this->get('mailer')->send($message);
    }

    /**
     * "activate email" page
     * @return type
     * routing email_activation
     */
    public function activateEmailAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $hash = $request->get('hash');
        $hash_exists = $em->getRepository('FrontFrontBundle:User')->checkHashExists($hash);
        if ($hash_exists['hash_exists']) {
            $em->getRepository('FrontFrontBundle:User')->actiavateHash($hash, $hash_exists['is_trial']);
            $message = 'Your account had been activated';
        } else {
            $message = 'The hash does not exist. If you had registered more than 30 days ago without activating the email then your email is deleted from our database. Please register one more time.';
        }
        return $this->render('FrontFrontBundle:login_register:email_activation.html.twig', array('message' => $message));
    }

    /**
     * "resend activation email" page
     * @return type
     * routing resend_activation_hash
     */
    public function resendActivationEmailAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $email = $request->get('email');
            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
                $this->get('session')->setFlash('error', 'The security code was invalid.');
                return $this->redirect($this->generateUrl('resend_activation_hash'));
            }
            $secret_hash = $em->getRepository('FrontFrontBundle:User')->getSecretHashByEmail($email);
            if ($secret_hash['is_deleted'] == 1 || !$secret_hash) { // if user is deleted or doesnt exist at all
                $this->get('session')->setFlash('error', 'This email does not exist in our database. Please register.');
                return $this->redirect($this->generateUrl('resend_activation_hash'));
            }
            if ($secret_hash['has_activated_email'] == 1) { // if user already had activated the email
                $this->get('session')->setFlash('error', 'You do not need activation email because your accound is active. If you think you lost your password please use "Password recovery" function.');
                return $this->redirect($this->generateUrl('resend_activation_hash'));
            }
            $this->sendActivationEmail($email, $secret_hash['activation_hash']);
            $this->get('session')->setFlash('notice', 'The activation email had been send to you. Please check "spam" folder also.');
            return $this->redirect($this->generateUrl('resend_activation_hash'));
        }
        return $this->render('FrontFrontBundle:login_register:resend_activation_email.html.twig');
    }

    /**
     * "password recovery" page
     * routing password_recovery
     */
    public function passwordRecoveryAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $email = $request->get('email');
            if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
                $this->get('session')->setFlash('error', 'The email you provided (' . $email . ') is invalid.');
                return $this->redirect($this->generateUrl('password_recovery'));
            }
            $data = $em->getRepository('FrontFrontBundle:User')->getPasswordByEmail($email);
            if ($data['is_deleted'] == 1 || !$data) { // if user is deleted or doesnt exist at all
                $this->get('session')->setFlash('error', 'This email does not exist in our database. Please register.');
                return $this->redirect($this->generateUrl('password_recovery'));
            }
            if ($data['has_activated_email'] == 0) { // if user already had activated the email
                $this->get('session')->setFlash('error', 'Your email is in our database but you didnt activate it. Please open the email you received from us and click the activation link. <i>If you did not receive the email please user "Resend activation code".</i>');
                return $this->redirect($this->generateUrl('password_recovery'));
            }

            $this->sendPasswordEmail($email, $data['pass']);
            $this->get('session')->setFlash('notice', 'The has has been send to your email. Please check "spam" folder also.');
            return $this->redirect($this->generateUrl('password_recovery'));
        }
        return $this->render('FrontFrontBundle:login_register:password_recovery.html.twig');
    }

    /**
     * "executes login"
     * routing execute_login
     */
    public function executeLoginAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() != 'POST') {
            return $this->redirect($this->generateUrl('execute_login'));
        }
        $login_email = $request->get('login_email');
        $login_pass = $request->get('login_pass');

        if ($login_pass == '') {
            $this->get('session')->setFlash('error', 'Please provide a password.');
            return $this->redirect($this->generateUrl('execute_login'));
        }

        if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $login_email)) {
            $this->get('session')->setFlash('error', 'The email you provided (' . $login_email . ') is invalid.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        $data = $em->getRepository('FrontFrontBundle:User')->getUserAuth($login_email, $login_pass);

        if ($data['is_deleted'] == 1 || !$data) {
            $this->get('session')->setFlash('error', 'User with such combination of email/password does not exist in our database.');
            return $this->redirect($this->generateUrl('login_register'));
        }

        if ($data['has_activated_email'] == 0) {
            $this->get('session')->setFlash('error', 'Your email is in our database but you didnt activate it. Please open the email you received from us and click the activation link. <i>If you did not receive the email please user "Resend activation code".</i>');
            return $this->redirect($this->generateUrl('login_register'));
        }

        Auth::setAuth();
        Auth::setAuthParam('id', $data['id']);
        Auth::setAuthParam('f_name', $data['f_name']);
        Auth::setAuthParam('l_name', $data['l_name']);
        Auth::setAuthParam('is_trial', $data['is_trial']);
        Auth::setAuthParam('package_id', $data['package_id']);
        Auth::setAuthParam('pass', $login_pass);
        Auth::setAuthParam('date_format', $data['user_date_format']);

        if ($data['has_completed_profile'] == 0) { // logins first time and did not complete profile
            return $this->redirect($this->generateUrl('register_step_3'));
        }

        return $this->redirect($this->generateUrl('account_dashboard'));
    }

    /**
     * "registration step3" page (user loggs in first time)
     * routing register_step_3
     */
    public function registerStep3Action() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $f_name = $request->get('f_name');
            $l_name = $request->get('l_name');

            if (trim($f_name) == '' || trim($l_name) == '') {
                $this->get('session')->setFlash('error', 'The first and last name are require fields.');
                return $this->redirect($this->generateUrl('register_step_3'));
            }

            $em->getRepository('FrontFrontBundle:User')->getAddUserData(Auth::getAuthParam('id'), $f_name, $l_name);
            $em->getRepository('FrontFrontBundle:User')->setHasCompletedProfile(Auth::getAuthParam('id'));

            return $this->redirect($this->generateUrl('account_dashboard'));
        }

        return $this->render('FrontFrontBundle:login_register:register_step3.html.twig');
    }

    /**
     * "registration step3" page (user loggs in first time)
     * routing register_step_3
     */
    public function settingsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $todo = $request->get('todo');

            switch($todo) {
                case 'change_pass':
                    $old_pass = $request->get('old_pass');
                    if($old_pass != Auth::getAuthParam('pass')) {
                        $this->get('session')->setFlash('error', 'The old password is incorrect.');
                        return $this->redirect($request->headers->get('referer'));
                    }
                    $new_pass = $request->get('new_pass');
                    $renew_pass = $request->get('renew_pass');
                    if($new_pass != $renew_pass) {
                        $this->get('session')->setFlash('error', 'The new passwords do not match.');
                        return $this->redirect($request->headers->get('referer'));
                    }
                    if(strlen($new_pass) < 6) {
                        $this->get('session')->setFlash('error', 'The new password is too short. It must be equal or greather than 6 caracters.');
                        return $this->redirect($request->headers->get('referer'));
                    }
                    $em->getRepository('FrontFrontBundle:User')->updateUserPassword(Auth::getAuthParam('id'), $new_pass);
                    Auth::setAuthParam('pass', $new_pass);
                    $this->get('session')->setFlash('notice', 'The password was successfully changed.');
                    return $this->redirect($request->headers->get('referer'));
                    break;
                case 'set_date_format':
                    $date_format = $request->get('date_format');
                    $em->getRepository('FrontFrontBundle:User')->updateUserDateFormat(Auth::getAuthParam('id'), $date_format);
                    Auth::setAuthParam('date_format', $date_format);
                    $this->get('session')->setFlash('notice', 'The date format was successfully updated.');
                    return $this->redirect($request->headers->get('referer'));
                    break;
                case 'delete_account':
                    $delete_code = $request->get('delete_code');
                    if($delete_code != 'delete my account') {
                        $this->get('session')->setFlash('error', 'Wrong string. Please use "delete my account" to delete your account.');
                        return $this->redirect($request->headers->get('referer'));
                    }
                    $em->getRepository('FrontFrontBundle:User')->deleteAllUserData(Auth::getAuthParam('id'));
                    
                    break;
            }


            return $this->redirect($this->generateUrl('dashboard'));
        }

        return $this->render('FrontFrontBundle:Account/User:user_settings.html.twig', array('date_format' => Auth::getAuthParam('date_format')));
    }

}
