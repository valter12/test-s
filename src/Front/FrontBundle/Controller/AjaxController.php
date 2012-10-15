<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class AjaxController extends Controller {

    /**
     * gets project data for modification
     * @return type
     */
    public function ajaxAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $todo = $request->get('todo');
        switch ($todo) {
            case 'project_modify_data':
                if (!Auth::isAuth()) {
                    die;
                }
                $project_hash = $request->get('hash');
                $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
                $project_categories = $em->getRepository('FrontFrontBundle:ProjectCategory')->getProjectCategoriesByUserId(Auth::getAuthParam('id'));
                return $this->render('FrontFrontBundle:Ajax:project_modification.html.twig', array('project_data' => $project_data, 'project_categories' => $project_categories, 'action' => 'modify'));
                break;
            case 'project_create':
                if (!Auth::isAuth()) {
                    die;
                }
                $cnt_user_projects = $em->getRepository('FrontFrontBundle:Project')->cntProjects(Auth::getAuthParam('id'));
                if ($cnt_user_projects >= Auth::getMaxDomains()) {
                    $this->get('session')->setFlash('error', 'Your projects count has reached the limit. You cannot add more projects. Please upgrade.');
                    return $this->render('FrontFrontBundle:Ajax:error_popup.html.twig', array('message' => array('title' => 'You cannot create projects', 'body' => 'You have reached the maximum project count for the chosen package. Please upgrade.')));
                }
                $project_categories = $em->getRepository('FrontFrontBundle:ProjectCategory')->getProjectCategoriesByUserId(Auth::getAuthParam('id'));
                $project_data = array('id' => '', 'project_name' => '', 'project_description' => '', 'project_hash' => '', 'category_id' => '');
                return $this->render('FrontFrontBundle:Ajax:project_modification.html.twig', array('project_data' => $project_data, 'project_categories' => $project_categories, 'action' => 'new'));
                break;
            case 'project_category_modify':
                if (!Auth::isAuth()) {
                    die;
                }
                $project_category_id = $request->get('category_id');
                $project_category = $em->getRepository('FrontFrontBundle:ProjectCategory')->getProjectCategoryByUserId(Auth::getAuthParam('id'), $project_category_id);
                return $this->render('FrontFrontBundle:Ajax:project_category.html.twig', array('category_data' => $project_category, 'action' => 'modify'));
                break;
            case 'project_category_create':
                if (!Auth::isAuth()) {
                    die;
                }
                $category_data = array('id' => '', 'category_name' => '');
                return $this->render('FrontFrontBundle:Ajax:project_category.html.twig', array('category_data' => $category_data, 'action' => 'new'));
                break;
            case 'get_track_changes':
                if (!Auth::isAuth()) {
                    die;
                }
                $track_id = $request->get('track_id');
                $competitor_id = $request->get('c_id');
                if(!is_numeric($track_id) || !is_numeric($competitor_id)) {
                    die('Err649');
                }
                if($competitor_id == 0) { // our project, NOT competitor
                    $changes = $em->getRepository('FrontFrontBundle:KeywordTrack')->getDescriptionChanges(Auth::getAuthParam('id'), $track_id);
                } else {
                    $changes = $em->getRepository('FrontFrontBundle:KeywordTrack')->getDescriptionChangesCompetitor(Auth::getAuthParam('id'), $track_id);
                }
                return $this->render('FrontFrontBundle:Ajax:other_changes.html.twig', array('changes' => $changes));
                break;
            case 'get_project_keywords':
                if (!Auth::isAuth()) {
                    die;
                }
                $project_hash = $request->get('hash');
                $keyword_id = $request->get('keyword_id', 0);
                if(trim($project_hash) == '') {
                    die('Erm723');
                }
                $keywords = $em->getRepository('FrontFrontBundle:Keyword')->getKeywordsByProjectHash(Auth::getAuthParam('id'), $project_hash);
                return $this->render('FrontFrontBundle:Ajax:keyword_list.html.twig', array('keywords' => $keywords, 'keyword_id' => $keyword_id));
                break;
            case 'get_project_keyword_competitors':
                if (!Auth::isAuth()) {
                    die('mr');
                }
                $project_hash = $request->get('hash');
                
                $competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorByProjectHash(Auth::getAuthParam('id'), $project_hash);
                return $this->render('FrontFrontBundle:Account:Keyword/incl_keyword_competitors.html.twig', array('competitors' => $competitors));
                break;
            case 'project_competitor_create':
                if (!Auth::isAuth()) {
                    die('mr');
                }
                $project_hash = $request->get('hash');
                if(!$project_hash) {
                    die('Err UYh');
                }
                $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
                if(empty($project_data)) { // user does not own this project or project does not exist
                    die('Err mbh');
                }
                $max_competitors = Auth::getMaxCompetitors();
                $project_competitors = $em->getRepository('FrontFrontBundle:Competitor')->getCntProjectCompetitorsById($project_data['id']);
                if($project_competitors >= $max_competitors) {
                    return $this->render('FrontFrontBundle:Ajax:error_popup.html.twig', array('message' => array('title' => 'Error creating competitor', 'body' => 'You have reached the maximum competitor count for the chosen. Please upgrade.')));
                }
                
                return $this->render('FrontFrontBundle:Ajax:competitor_modification.html.twig', array('project_data' => $project_data, 'action' => 'new', 'competitor_data' => ''));
                break;
            case 'project_competitor_modify':
                if (!Auth::isAuth()) {
                    die;
                }
                $project_hash = $request->get('hash');
                if(!$project_hash) {
                    die('Err UYh2');
                }
                $project_data = $em->getRepository('FrontFrontBundle:Project')->getProjectByHash(Auth::getAuthParam('id'), $project_hash);
                if(empty($project_data)) { // user does not own this project or project does not exist
                    die('Err mbh2');
                }
                
                $competitor_id = $request->get('id');
                if(!is_numeric($competitor_id)) {
                    die('Err sadfg8');
                }
                
                $competitor_data = $em->getRepository('FrontFrontBundle:Competitor')->getCompetitorById(Auth::getAuthParam('id'), $competitor_id);
                return $this->render('FrontFrontBundle:Ajax:competitor_modification.html.twig', array('project_data' => $project_data, 'action' => 'modify', 'competitor_data' => $competitor_data));
                break;
            case 'get_record_notes'; 
                if (!Auth::isAuth()) {
                    die;
                }
                $keyword_id = $request->get('keyword_id');
                $for_date = $request->get('for_date');
                if(!is_numeric($keyword_id)) {
                    die('Err utah3');
                }
                if(!$for_date) {
                    die('Err hgutah3');
                }
                $user_owns_keyword = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
                if(!$user_owns_keyword['cnt']) { // user does not own this keyword
                    die('Err not3kdr');
                }
                $keyword_data = $em->getRepository('FrontFrontBundle:Keyword')->getKeywordById($keyword_id);
                $keyword_notes = $em->getRepository('FrontFrontBundle:KeywordNote')->getKeywordNotes($keyword_id, $for_date);
                
                return $this->render('FrontFrontBundle:Ajax:keyword_note.html.twig', array('keyword_data' => $keyword_data, 'keyword_notes' => $keyword_notes));
                break;
            default:
                break;
        }
        
    }

}
