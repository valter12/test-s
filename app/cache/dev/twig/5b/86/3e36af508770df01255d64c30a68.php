<?php

/* FrontFrontBundle:login_register:password_recovery.html.twig */
class __TwigTemplate_5b863e36af508770df01255d64c30a68 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <h2>Password recovery</h2>
    Please enter your email
    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("password_recovery"), "html", null, true);
        echo "\" method=\"post\">
        <label for=\"email\">Email</label>
        <input type=\"email\" name=\"email\" id=\"email\" required=\"required\">
        <br />
        <input type=\"submit\" class=\"btn btn-success\" value=\"send password\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:login_register:password_recovery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 6,  29 => 4,  26 => 3,);
    }
}
