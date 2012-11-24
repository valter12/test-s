<?php

namespace Front\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Front\FrontBundle\Security\Auth as Auth;

class ProjectCategoryController extends Controller {

    /**
     * "project list" page
     * @return type
     * routing account_project_categories
     */
    public function categoriesAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }

        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $category_list = $em->getRepository('FrontFrontBundle:ProjectCategory')->getProjectCategoriesByUserId(Auth::getAuthParam('id'));

        return $this->render('FrontFrontBundle:Account:ProjectCategories/project_categories_list.html.twig', array('categories_list' => $category_list));
    }

    /**
     * 
     * @return type
     * routing account_delete_project
     */
    public function deleteProjectCategoryAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $category_id = $request->get('category_id');
        if (!is_numeric($category_id)) {
            $this->get('session')->setFlash('error', 'The request is incorrect.');
            return $this->redirect($this->generateUrl('account_project_categories'));
        }
        $em->getRepository('FrontFrontBundle:ProjectCategory')->deleteProjectCategoryById(Auth::getAuthParam('id'), $category_id);
        $this->get('session')->setFlash('notice', 'The category was deleted.');
        return $this->redirect($this->generateUrl('account_project_categories'));
    }

    /**
     * modifies a project
     * @return type
     * routing account_execute_modify_project
     */
    public function executeAddModifyCategoryAction() {
        if (!Auth::isAuth()) {
            return $this->redirect($this->generateUrl('login_register'));
        }
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $category_name = $request->get('category_name');
        $todo = $request->get('action');

        if ($todo == 'new') {
            $em->getRepository('FrontFrontBundle:ProjectCategory')->createProjectCategory(Auth::getAuthParam('id'), $category_name);
            $this->get('session')->setFlash('notice', 'The category was created.');
        } elseif ($todo == 'modify') {
            $category_id = $request->get('category_id');
            $em->getRepository('FrontFrontBundle:ProjectCategory')->modifyProjectCategory(Auth::getAuthParam('id'), $category_id, $category_name);
            $this->get('session')->setFlash('notice', 'The project was updated.');
        }
        return $this->redirect($this->generateUrl('account_project_categories'));
    }

}
