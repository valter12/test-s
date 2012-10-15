<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

/**
 * User controller.
 *
 */
class ProjectController extends Controller {

    /**
     * "project list" page
     * @return type
     * routing account_projects
     */
    public function projectsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $max_domains = Auth::getMaxDomains();
        
        return $this->render('FrontFrontBundle:Account:Project/project_list.html.twig', array('project_list' => $project_list, 'max_packages' => $max_domains));
    }

    /**
     * 
     * @return type
     * routing account_delete_project
     */
    public function deleteProjectAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $project_hash = $request->get('hash');
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        $em->getRepository('FrontFrontBundle:Project')->deleteProjectByHash(Auth::getAuthParam('id'), $project_hash);
        $this->get('session')->setFlash('notice', 'The project was deleted.');
        return $this->redirect($this->generateUrl('account_projects'));
    }

    /**
     * modifies a project
     * @return type
     * routing account_execute_modify_project
     */
    public function executeModifyAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $project_hash = $request->get('project_hash');
        $project_name = $request->get('project_name');
        $project_desc = $request->get('project_desc');
        $project_category = $request->get('project_category');
        $project_domain = $request->get('project_domain');
        $todo = $request->get('action');

        if(!is_numeric($project_category)) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        $user_owns_category = $em->getRepository('FrontFrontBundle:ProjectCategory')->userOwnsCategory(Auth::getAuthParam('id'), $project_category);
        
        if(!$user_owns_category) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        if($todo == 'new') {
            $cnt_user_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
            if($cnt_user_projects >= Auth::getMaxDomains()) {
                $this->get('session')->setFlash('error', 'Your projects count has reached the limit. You cannot add more projects. Please upgrade.');
                return $this->redirect($this->generateUrl('account_projects'));
            }
            if(Auth::getAuthParam('is_trial') == 1) { // if user is trial
                $domain_was_trial = $em->getRepository('FrontFrontBundle:TrialDomain')->domainWasTrial($project_domain);
                if($domain_was_trial) { // if this domain was used in a trial before we dont add it
                    $this->get('session')->setFlash('error', 'You cannot add this domain in trial mode.');
                    return $this->redirect($this->generateUrl('account_projects'));
                }
            }
            $em->getRepository('FrontFrontBundle:Project')->createProject(Auth::getAuthParam('id'), $project_name, $project_desc, $project_domain, $project_category);
            $this->get('session')->setFlash('notice', 'The project was created.');
        } elseif($todo == 'modify') {
            $em->getRepository('FrontFrontBundle:Project')->modifyProject(Auth::getAuthParam('id'), $project_hash, $project_name, $project_desc, $project_category);
            $this->get('session')->setFlash('notice', 'The project was updated.');
        }
        return $this->redirect($this->generateUrl('account_projects'));
    }

}
