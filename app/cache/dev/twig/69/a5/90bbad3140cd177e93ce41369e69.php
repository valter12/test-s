<?php

/* FrontFrontBundle:login_register:resend_activation_email.html.twig */
class __TwigTemplate_69a590bbad3140cd177e93ce41369e69 extends Twig_Template
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
        echo "    If you did not receive the activation email please enter your email below:
    <form action=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("resend_activation_hash"), "html", null, true);
        echo "\" method=\"post\">
        <label for=\"email\">Email</label>
        <input type=\"email\" name=\"email\" id=\"email\" required=\"required\">
        <br />
        <input type=\"submit\" class=\"btn btn-success\" value=\"resend\">
    </form>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:login_register:resend_activation_email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 5,  29 => 4,  26 => 3,);
    }
}
