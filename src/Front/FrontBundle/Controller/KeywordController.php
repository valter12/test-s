<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

/**
 * Keyword controller.
 *
 */
class KeywordController extends Controller {

    /**
     * "keyword list" page
     * @return type
     * routing account_keywords
     */
    public function keywordsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }

        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $project_list = $em->getRepository('FrontFrontBundle:Project')->getProjects(Auth::getAuthParam('id'));
        $project_hash = $request->get('hash', $project_list[0]['project_hash']);
        if(empty($project_list)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if (!count($project_data)) { // user does not own this project
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_keywords'));
        }

        $keyword_list = $em->getRepository('FrontFrontBundle:Keyword')->getKeywordsByProject($project_data['id']);
        $max_keywords = Auth::getMaxKeywords();

        return $this->render('FrontFrontBundle:Account:Keyword/keyword_list.html.twig', array('keyword_list' => $keyword_list, 'max_keywords' => $max_keywords, 'project_data' => $project_data, 'project_list' => $project_list));
    }

    /**
     * account_execute_add_keywords
     */
    public function addKeywordsAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $keywords = $request->get('keywords');
        
        $keywords = explode("\n", $keywords);
//        echo '<pre>';print_r($keywords);die;
        
        $project_hash = $request->get('project_hash');
        $em = $this->getDoctrine()->getEntityManager();
        $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
        if (!count($project_data)) { // user does not own this project
            $this->get('session')->setFlash('error', 'The project hash was incorrect. Keywords were NOT added.');
            return $this->redirect($request->headers->get('referer'));
        }

        $keyword_cnt = $em->getRepository('FrontFrontBundle:Keyword')->getProjectKeywordCount($project_data['id']);
        $max_allowed_keywords = Auth::getMaxKeywords();
        if ($keyword_cnt >= $max_allowed_keywords) {
            $this->get('session')->setFlash('error', 'Sorry, your keyword count for this project has reached maximum value. Please upgrade.');
            return $this->redirect($request->headers->get('referer'));
        }

        for ($i = 0; $i < count($keywords); $i++) {
            if($i + $keyword_cnt >= $max_allowed_keywords) { // check if not reaching maximum allowed keyword count
                $this->get('session')->setFlash('error', 'Maximum keyword count for this project had been reached. Some keywords were not inserted.');
                return $this->redirect($request->headers->get('referer'));
            }
            if(trim($keywords[$i]) == '') {
                continue;
            }
            $keyword_clean = preg_replace('/(?:\r\n|[\r\n])/', '', $keywords[$i]);
            $keyword_clean = str_replace(array("\n", "\t"), array('', ''), $keyword_clean);
            $em->getRepository('FrontFrontBundle:Keyword')->createKeyword($project_data['id'], $keyword_clean);
        }

        $this->get('session')->setFlash('notice', 'All keywords were inserted.');
        return $this->redirect($request->headers->get('referer'));
        
    }

    /**
     * 
     * @return type
     * routing account_delete_keyword
     */
    public function deleteKeywordAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $keyword_id = $request->get('id');
        if (!is_numeric($keyword_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $keyword_exists = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
        if(!$keyword_exists['cnt']) {
            $this->get('session')->setFlash('error', 'The request is incorrect (E22).');
            return $this->redirect($request->headers->get('referer'));
        }
        
        $em->getRepository('FrontFrontBundle:Keyword')->deleteKeywordById($keyword_id);
        
        $this->get('session')->setFlash('notice', 'The keyword was deleted.');
        return $this->redirect($request->headers->get('referer'));
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

        if (!is_numeric($project_category)) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $user_owns_category = $em->getRepository('FrontFrontBundle:ProjectCategory')->userOwnsCategory(Auth::getAuthParam('id'), $project_category);

        if (!$user_owns_category) {
            $this->get('session')->setFlash('error', 'Wrong category.');
            return $this->redirect($this->generateUrl('account_projects'));
        }

        $cnt_user_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
        if ($cnt_user_projects >= Auth::getMaxDomains()) {
            $this->get('session')->setFlash('error', 'Your projects count has reached the limit. You cannot add more projects. Please upgrade.');
            return $this->redirect($this->generateUrl('account_projects'));
        }


        if ($todo == 'new') {
            $em->getRepository('FrontFrontBundle:Project')->createProject(Auth::getAuthParam('id'), $project_name, $project_desc, $project_domain, $project_category);
            $this->get('session')->setFlash('notice', 'The project was created.');
        } elseif ($todo == 'modify') {
            $em->getRepository('FrontFrontBundle:Project')->modifyProject(Auth::getAuthParam('id'), $project_hash, $project_name, $project_desc, $project_category);
            $this->get('session')->setFlash('notice', 'The project was updated.');
        }
        return $this->redirect($this->generateUrl('account_projects'));
    }

}
