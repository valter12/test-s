<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class KeywordNoteController extends Controller {

    /**
     * @return type
     * account_delete_keyword_note
     */
    public function deleteKeywordNoteAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $note_id = $request->get('note_id');
        if (!is_numeric($note_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($request->headers->get('referer'));
        }
        $em->getRepository('FrontFrontBundle:KeywordNote')->deleteNoteById(Auth::getAuthParam('id'), $note_id);
        $this->get('session')->setFlash('notice', 'The note was deleted.');
        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * modifies a project
     * @return type
     * routing account_modify_add_keyoword_note
     */
    public function executeAddModifyNoteAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();

        $keyword_id = $request->get('keyword_id');
        $todo = $request->get('todo');
        $note = $request->get('note');
        $for_date = $request->get('for_date');

        if(!is_numeric($keyword_id)) {
            $this->get('session')->setFlash('error', 'Wrong keyword.');
            return $this->redirect($request->headers->get('referer'));
        }
        $em = $this->getDoctrine()->getEntityManager();
        
        $user_owns_keyword = $em->getRepository('FrontFrontBundle:Keyword')->userOwnsKeyword(Auth::getAuthParam('id'), $keyword_id);
        if(!$user_owns_keyword['cnt']) { // user does not own this keyword
            $this->get('session')->setFlash('error', 'You do not own this keyword.');
            return $this->redirect($request->headers->get('referer'));
        }
        
        if($todo == 'new') {
            $em->getRepository('FrontFrontBundle:KeywordNote')->createNote($keyword_id, $note, $for_date);
            $this->get('session')->setFlash('notice', 'The note was created.');
        } elseif($todo == 'modify') {
            $em->getRepository('FrontFrontBundle:Project')->modifyProject(Auth::getAuthParam('id'), $project_hash, $project_name, $project_desc, $project_category);
            $this->get('session')->setFlash('notice', 'The note was updated.');
        }
        return $this->redirect($request->headers->get('referer'));
    }

}
