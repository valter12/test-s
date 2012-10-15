<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'captcha' => true,
       'homepage' => true,
       'plans' => true,
       'login_register' => true,
       'execute_login' => true,
       'execute_register_1' => true,
       'register_step_3' => true,
       'email_activation' => true,
       'resend_activation_hash' => true,
       'password_recovery' => true,
       'account_dashboard' => true,
       'account_projects' => true,
       'account_delete_project' => true,
       'account_execute_modify_project' => true,
       'ajax' => true,
       'account_project_categories' => true,
       'account_delete_project_category' => true,
       'account_modify_add_project_category' => true,
       'account_keywords' => true,
       'account_execute_add_keywords' => true,
       'account_delete_keyword' => true,
       'account_execute_modify_keyword' => true,
       'account_keyword_stats' => true,
       'account_competitors' => true,
       'account_delete_project_competitor' => true,
       'account_execute_modify_project_competitor' => true,
       'account_keyword_charts' => true,
       'account_uptime' => true,
       'account_delete_keyword_note' => true,
       'account_modify_add_keyoword_note' => true,
       'account_report_list' => true,
       'account_modify_add_report' => true,
       'user' => true,
       'user_show' => true,
       'user_new' => true,
       'user_create' => true,
       'user_edit' => true,
       'user_update' => true,
       'user_delete' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getcaptchaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::captchaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/captcha',  ),));
    }

    private function gethomepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::homepageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getplansRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\DefaultController::plansAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/plans',  ),));
    }

    private function getlogin_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::loginRegisterAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login-register',  ),));
    }

    private function getexecute_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::executeLoginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/execute-login',  ),));
    }

    private function getexecute_register_1RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::registerStep2Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register',  ),));
    }

    private function getregister_step_3RouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::registerStep3Action',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register-account-data',  ),));
    }

    private function getemail_activationRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::activateEmailAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/activate-email',  ),));
    }

    private function getresend_activation_hashRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::resendActivationEmailAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/resend-activation-hash',  ),));
    }

    private function getpassword_recoveryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::passwordRecoveryAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/password-recovery',  ),));
    }

    private function getaccount_dashboardRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\AccountController::dashboardAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/dashboard',  ),));
    }

    private function getaccount_projectsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::projectsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/projects',  ),));
    }

    private function getaccount_delete_projectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::deleteProjectAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete-project',  ),));
    }

    private function getaccount_execute_modify_projectRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectController::executeModifyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/execute-modify-project',  ),));
    }

    private function getajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\AjaxController::ajaxAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/ajax',  ),));
    }

    private function getaccount_project_categoriesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::categoriesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/project-categories',  ),));
    }

    private function getaccount_delete_project_categoryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::deleteProjectCategoryAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete-project-category',  ),));
    }

    private function getaccount_modify_add_project_categoryRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectCategoryController::executeAddModifyCategoryAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-modify-category',  ),));
    }

    private function getaccount_keywordsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::keywordsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/keywords',  ),));
    }

    private function getaccount_execute_add_keywordsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::addKeywordsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/execute-add-keywords',  ),));
    }

    private function getaccount_delete_keywordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::deleteKeywordAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete-keyword',  ),));
    }

    private function getaccount_execute_modify_keywordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordController::executeModifyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/execute-modify-keyword',  ),));
    }

    private function getaccount_keyword_statsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordTrackController::keywordStatsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/keyword-stats',  ),));
    }

    private function getaccount_competitorsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::projectCompetitorsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/project-competitors',  ),));
    }

    private function getaccount_delete_project_competitorRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::deleteCompetitorAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete-competitor',  ),));
    }

    private function getaccount_execute_modify_project_competitorRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\CompetitorController::executeModifyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/execute-modify-project-competitor',  ),));
    }

    private function getaccount_keyword_chartsRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ChartController::keywordChartAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/keyword-chart',  ),));
    }

    private function getaccount_uptimeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UptimeController::uptimeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/uptime',  ),));
    }

    private function getaccount_delete_keyword_noteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordNoteController::deleteKeywordNoteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/delete-keyword-note',  ),));
    }

    private function getaccount_modify_add_keyoword_noteRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\KeywordNoteController::executeAddModifyNoteAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-modify-keyword-note',  ),));
    }

    private function getaccount_report_listRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectReportController::reportListAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/report-list',  ),));
    }

    private function getaccount_modify_add_reportRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\ProjectReportController::addModifyAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add-modify-report',  ),));
    }

    private function getuserRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/',  ),));
    }

    private function getuser_showRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::showAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/show',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_newRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::newAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/user/new',  ),));
    }

    private function getuser_createRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::createAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/user/create',  ),));
    }

    private function getuser_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_updateRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::updateAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/update',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }

    private function getuser_deleteRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Front\\FrontBundle\\Controller\\UserController::deleteAction',), array (  '_method' => 'post',), array (  0 =>   array (    0 => 'text',    1 => '/delete',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/user',  ),));
    }
}
