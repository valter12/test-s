<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class CompetitorController extends Controller {

    /**
     * "project list" page
     * @return type
     * routing account_competitors
     */
    public function projectCompetitorsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $project_hash = $request->get('hash', $project_list[0]['project_hash']);
        if (!$project_hash) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }
        
        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if(empty($project_data)) {
            $this->get('session')->setFlash('error', 'You have no projects. Please create one.');
            return $this->redirect($this->generateUrl('account_projects'));
        }
        
        $project_competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorByProjectHash(Auth::getAuthParam('id'), $project_hash);
        
        $max_competitors = Auth::getMaxCompetitors();
        
        return $this->render('FrontFrontBundle:Account:Competitor/project_competitors.html.twig', array('project_data' => $project_data, 'project_competitors' => $project_competitors, 'max_competitors' => $max_competitors, 'project_list' => $project_list));
    }

    /**
     * 
     * @return type
     * routing account_delete_project_category
     */
    public function deleteCompetitorAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();

        $competitor_id = $request->get('id');
        if (!$competitor_id) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('FrontFrontBundle:Competitor')->deleteCompetitorById(Auth::getAuthParam('id'), $competitor_id);
        $this->get('session')->setFlash('notice', 'The competitor was deleted.');
        return $this->redirect($this->generateUrl('account_competitors'));
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
        $competitor_name = $request->get('competitor_name');
        $competitor_id = $request->get('competitor_id', 0); // when modifying
        $competitor_domain = $request->get('competitor_domain');
        $todo = $request->get('action');

        if(!$project_hash) {
            $this->get('session')->setFlash('error', 'Wrong project hash.');
            return $this->redirect($this->generateUrl('account_competitors'));
        }
        
        if($todo == 'new') {
            $max_competitors = Auth::getMaxCompetitors();
            $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
            $project_competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCntProjectCompetitorsById($project_data['id']);
            if($project_competitors >= $max_competitors) {
                $this->get('session')->setFlash('error', 'The competitor count for the chosen project has been reached. Please upgrade.');
                return $this->redirect($this->generateUrl('account_competitors').'?hash='.$project_hash);
            }
            $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
            if(empty($project_data)) {
                $this->get('session')->setFlash('error', 'Incorrenct project hash.');
                return $this->redirect($this->generateUrl('account_competitors'));
            }
            $em->getRepository('FrontFrontBundle:Competitor')->createCompetitor($project_data['id'], $competitor_name, $competitor_domain);
            $this->get('session')->setFlash('notice', 'The competitor was created.');
        } elseif($todo == 'modify') {
            
            $em->getRepository('FrontFrontBundle:Competitor')->modifyCompetitor(Auth::getAuthParam('id'), $competitor_id, $project_hash, $competitor_name);
            $this->get('session')->setFlash('notice', 'The competitor was updated.');
        }
        return $this->redirect($this->generateUrl('account_competitors').'?hash='.$project_hash);
    }

}
