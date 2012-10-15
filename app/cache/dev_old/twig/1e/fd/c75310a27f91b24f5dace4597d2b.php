<?php

/* FrontFrontBundle:Default:homepage.html.twig */
class __TwigTemplate_1efdc75310a27f91b24f5dace4597d2b extends Twig_Template
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
        echo "    Homepage text
    <br />
    <a href=\"\">Login</a>
    <br />
    <a class=\"btn btn-primary\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("plans"), "html", null, true);
        echo "\">See our Plans</a>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Default:homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 7,  29 => 3,  26 => 2,);
    }
}
