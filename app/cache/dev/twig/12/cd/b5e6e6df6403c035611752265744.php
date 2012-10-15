<?php

/* FrontFrontBundle:login_register:register_step3.html.twig */
class __TwigTemplate_12cdb5e6e6df6403c035611752265744 extends Twig_Template
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("register_step_3"), "html", null, true);
        echo "\" method=\"post\">
        <label for=\"f_name\">First name:</label>
        <input type=\"text\" name=\"f_name\" id=\"f_name\" required=\"required\">
        <div class=\"sep\"></div>
        <label for=\"l_name\">Last name:</label>
        <input type=\"text\" name=\"l_name\" id=\"l_name\" required=\"required\">
        <div class=\"sep\"></div>
        <input type=\"submit\" value=\"Continue >>\" class=\"btn btn-success\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:login_register:register_step3.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,);
    }
}
