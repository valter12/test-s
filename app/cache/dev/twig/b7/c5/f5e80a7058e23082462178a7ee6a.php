<?php

/* ::account_base.html.twig */
class __TwigTemplate_b7c5f5e80a7058e23082462178a7ee6a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'left_menu' => array($this, 'block_left_menu'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
            'inline_javascripts' => array($this, 'block_inline_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "        <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
        <link rel=\"shortcut icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div class=\"container-fluid\">
            <div class=\"row-fluid\">
                <div class=\"span2\" style=\"width:154px;\">
                    ";
        // line 17
        $this->displayBlock('left_menu', $context, $blocks);
        // line 54
        echo "                </div>
                <div class=\"span10\">
                    ";
        // line 56
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 57
            echo "                        <div class=\"sep\"></div>
                        <div class=\"flash-notice alert alert-success\">
                            ";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
                        </div>
                    ";
        }
        // line 62
        echo "                    ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "hasFlash", array(0 => "error"), "method")) {
            // line 63
            echo "                        <div class=\"sep\"></div>
                        <div class=\"flash-danger alert alert-danger\">
                            ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "error"), "method"), "html", null, true);
            echo "
                        </div>
                    ";
        }
        // line 68
        echo "                    ";
        $this->displayBlock('body', $context, $blocks);
        // line 69
        echo "                </div>
            </div>
        </div>
            
        ";
        // line 73
        $this->displayBlock('javascripts', $context, $blocks);
        // line 79
        echo "        ";
        $this->displayBlock('inline_javascripts', $context, $blocks);
        // line 81
        echo "         <div id=\"modal_placeholder\"></div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link href=\"../css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
            <link href=\"../css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />
        ";
    }

    // line 17
    public function block_left_menu($context, array $blocks = array())
    {
        // line 18
        echo "                        <ul class=\"nav nav-list\" style=\"margin-top: 22px;\">
                            <li>
                                <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_dashboard"), "html", null, true);
        echo "\"><i class=\"icon-th\"></i>Dashboard</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_projects"), "html", null, true);
        echo "\"><i class=\"icon-list-alt\"></i>Projects</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_project_categories"), "html", null, true);
        echo "\"><i class=\"icon-indent-right\"></i>Project categories</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keywords"), "html", null, true);
        echo "\"><i class=\"icon-screenshot\"></i>Keywords</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_charts"), "html", null, true);
        echo "\"><i class=\"icon-align-left\"></i>Charts</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_report_list"), "html", null, true);
        echo "\"><i class=\"icon-tasks\"></i>Scheduled reports</a>
                            </li>
                            <li>
                                <a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_uptime"), "html", null, true);
        echo "\"><i class=\"icon-time\"></i>Uptime</a>
                            </li>
                            <li>
                                <a href=\"\"><i class=\"icon-wrench\"></i>Account settings</a>
                            </li>
                            <li>
                                <a href=\"\"><i class=\"icon-book\"></i>Knowledge-base</a>
                            </li>
                            <li>
                                <a href=\"\"><i class=\"icon-inbox\"></i>Submit a ticket</a>
                            </li>
                            <li>
                                <a href=\"\"><i class=\"icon-circle-arrow-up\"></i>Upgrade account</a>
                            </li>
                        </ul>
                    ";
    }

    // line 68
    public function block_body($context, array $blocks = array())
    {
    }

    // line 73
    public function block_javascripts($context, array $blocks = array())
    {
        // line 74
        echo "             <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-popover.js"), "html", null, true);
        echo "\"></script>
             <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/common.js"), "html", null, true);
        echo "\"></script>
             <script>ajax_url = \"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("ajax"), "html", null, true);
        echo "\"</script>
        ";
    }

    // line 79
    public function block_inline_javascripts($context, array $blocks = array())
    {
        // line 80
        echo "        ";
    }

    public function getTemplateName()
    {
        return "::account_base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 80,  204 => 79,  198 => 77,  194 => 76,  190 => 75,  185 => 74,  182 => 73,  177 => 68,  157 => 38,  151 => 35,  145 => 32,  139 => 29,  133 => 26,  127 => 23,  121 => 20,  117 => 18,  114 => 17,  108 => 7,  105 => 6,  99 => 5,  92 => 81,  89 => 79,  87 => 73,  81 => 69,  78 => 68,  72 => 65,  68 => 63,  65 => 62,  59 => 59,  55 => 57,  53 => 56,  49 => 54,  47 => 17,  38 => 11,  35 => 10,  33 => 6,  29 => 5,  23 => 1,);
    }
}
