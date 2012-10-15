<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // captcha
        if ($pathinfo === '/captcha') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::captchaAction',  '_route' => 'captcha',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::homepageAction',  '_route' => 'homepage',);
        }

        // plans
        if ($pathinfo === '/plans') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::plansAction',  '_route' => 'plans',);
        }

        // login_register
        if ($pathinfo === '/login-register') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::loginRegisterAction',  '_route' => 'login_register',);
        }

        // execute_login
        if ($pathinfo === '/execute-login') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::executeLoginAction',  '_route' => 'execute_login',);
        }

        // execute_register_1
        if ($pathinfo === '/register') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::registerStep2Action',  '_route' => 'execute_register_1',);
        }

        // register_step_3
        if ($pathinfo === '/register-account-data') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::registerStep3Action',  '_route' => 'register_step_3',);
        }

        // email_activation
        if ($pathinfo === '/activate-email') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::activateEmailAction',  '_route' => 'email_activation',);
        }

        // resend_activation_hash
        if ($pathinfo === '/resend-activation-hash') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::resendActivationEmailAction',  '_route' => 'resend_activation_hash',);
        }

        // password_recovery
        if ($pathinfo === '/password-recovery') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::passwordRecoveryAction',  '_route' => 'password_recovery',);
        }

        // account_dashboard
        if ($pathinfo === '/dashboard') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\AccountController::dashboardAction',  '_route' => 'account_dashboard',);
        }

        // account_projects
        if ($pathinfo === '/projects') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::projectsAction',  '_route' => 'account_projects',);
        }

        // account_delete_project
        if ($pathinfo === '/delete-project') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::deleteProjectAction',  '_route' => 'account_delete_project',);
        }

        // account_execute_modify_project
        if ($pathinfo === '/execute-modify-project') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::executeModifyAction',  '_route' => 'account_execute_modify_project',);
        }

        // ajax
        if ($pathinfo === '/ajax') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\AjaxController::ajaxAction',  '_route' => 'ajax',);
        }

        // account_project_categories
        if ($pathinfo === '/project-categories') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::categoriesAction',  '_route' => 'account_project_categories',);
        }

        // account_delete_project_category
        if ($pathinfo === '/delete-project-category') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::deleteProjectCategoryAction',  '_route' => 'account_delete_project_category',);
        }

        // account_modify_add_project_category
        if ($pathinfo === '/add-modify-category') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::executeAddModifyCategoryAction',  '_route' => 'account_modify_add_project_category',);
        }

        // account_keywords
        if ($pathinfo === '/keywords') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::keywordsAction',  '_route' => 'account_keywords',);
        }

        // account_execute_add_keywords
        if ($pathinfo === '/execute-add-keywords') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::addKeywordsAction',  '_route' => 'account_execute_add_keywords',);
        }

        // account_delete_keyword
        if ($pathinfo === '/delete-keyword') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::deleteKeywordAction',  '_route' => 'account_delete_keyword',);
        }

        // account_execute_modify_keyword
        if ($pathinfo === '/execute-modify-keyword') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::executeModifyAction',  '_route' => 'account_execute_modify_keyword',);
        }

        // account_keyword_stats
        if ($pathinfo === '/keyword-stats') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordTrackController::keywordStatsAction',  '_route' => 'account_keyword_stats',);
        }

        // account_competitors
        if ($pathinfo === '/project-competitors') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::projectCompetitorsAction',  '_route' => 'account_competitors',);
        }

        // account_delete_project_competitor
        if ($pathinfo === '/delete-competitor') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::deleteCompetitorAction',  '_route' => 'account_delete_project_competitor',);
        }

        // account_execute_modify_project_competitor
        if ($pathinfo === '/execute-modify-project-competitor') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::executeModifyAction',  '_route' => 'account_execute_modify_project_competitor',);
        }

        // account_keyword_charts
        if ($pathinfo === '/keyword-chart') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ChartController::keywordChartAction',  '_route' => 'account_keyword_charts',);
        }

        // account_uptime
        if ($pathinfo === '/uptime') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UptimeController::uptimeAction',  '_route' => 'account_uptime',);
        }

        // account_delete_keyword_note
        if ($pathinfo === '/delete-keyword-note') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordNoteController::deleteKeywordNoteAction',  '_route' => 'account_delete_keyword_note',);
        }

        // account_modify_add_keyoword_note
        if ($pathinfo === '/add-modify-keyword-note') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordNoteController::executeAddModifyNoteAction',  '_route' => 'account_modify_add_keyoword_note',);
        }

        // account_report_list
        if ($pathinfo === '/report-list') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectReportController::reportListAction',  '_route' => 'account_report_list',);
        }

        // account_modify_add_report
        if ($pathinfo === '/add-modify-report') {
            return array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectReportController::addModifyAction',  '_route' => 'account_modify_add_report',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }
                return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]+?)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::showAction',)), array('_route' => 'user_show'));
            }

            // user_new
            if ($pathinfo === '/user/new') {
                return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }

            // user_create
            if ($pathinfo === '/user/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }
                return array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]+?)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::editAction',)), array('_route' => 'user_edit'));
            }

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]+?)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_update;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::updateAction',)), array('_route' => 'user_update'));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]+?)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_delete;
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::deleteAction',)), array('_route' => 'user_delete'));
            }
            not_user_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
