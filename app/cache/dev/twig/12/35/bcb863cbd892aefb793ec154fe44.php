<?php

/* FrontFrontBundle:login_register:login_register.html.twig */
class __TwigTemplate_1235bcb863cbd892aefb793ec154fe44 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"../css/jquery.validation.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 6
    public function block_javascripts($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.validation.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/validation.rules-en.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/login_register.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"row\">
        <div class=\"span8\">
            <h2>Login</h2>
            <form action=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("execute_login"), "html", null, true);
        echo "\" method=\"post\">
                <label for=\"login_email\">Email</label>
                <input type=\"email\" name=\"login_email\" id=\"login_email\" required=\"required\" />
                <div class=\"sep\"></div>
                <label for=\"login_pass\">Password</label>
                <input type=\"password\" name=\"login_pass\" id=\"login_pass\" required=\"required\" />
                <div class=\"sep\"></div>
                <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("password_recovery"), "html", null, true);
        echo "\">Password recovery</a><br />
                <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("resend_activation_hash"), "html", null, true);
        echo "\">Resend activation code</a>
                <div class=\"sep\"></div>
                <input type=\"submit\" class=\"btn btn-success\" value=\"Login\">
            </form>
        </div>
        <div class=\"span8\">
            <h2>Register</h2>
            <form action=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("execute_register_1"), "html", null, true);
        echo "\" method=\"post\" id=\"register_form\">
                <label for=\"register_email\">Email</label>
                <input type=\"email\" name=\"register_email\" id=\"register_email\" class=\"popup_focus\" data-original-title=\"Required\" data-content=\"You will receive a confirmation code on this email.\" required=\"required\"/>
                <div class=\"sep\"></div>
                <label for=\"register_pass\">Password</label>
                <input type=\"password\" name=\"register_pass\" id=\"register_pass\" class=\"popup_focus validate[required,minSize[6]]\" data-original-title=\"Required\" data-content=\"Please choose a strong passoword that contains numbers and letters. <br /><i>Not less than 6 characters</i>.\" required=\"required\" />
                <div class=\"sep\"></div>
                <label for=\"register_repass\">rePassword</label>
                <input type=\"password\" name=\"register_repass\" id=\"register_repass\" class=\"popup_focus validate[required,minSize[6], equals[register_pass]]\" data-original-title=\"Required\" data-content=\"Please repeat the password.\" required=\"required\" />
                <div class=\"sep\"></div>
                <img src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("captcha"), "html", null, true);
        echo "\" onclick=\"refreshCaptcha(this, '";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("captcha"), "html", null, true);
        echo "')\">
                <input type=\"text\" name=\"captcha\" class=\"validate[required]\" style=\"width:104px;\" required=\"required\">
                <div class=\"sep\"></div>
                <input type=\"submit\" class=\"btn btn-success\" value=\"Next step >>\">
                <input type=\"hidden\" name=\"package_id\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "package_id"), "method"), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"is_trial\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "trial"), "method"), "html", null, true);
        echo "\">
            </form>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:login_register:login_register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 46,  115 => 45,  106 => 41,  93 => 31,  83 => 24,  79 => 23,  69 => 16,  64 => 13,  61 => 12,  55 => 10,  51 => 9,  47 => 8,  42 => 7,  39 => 6,  31 => 3,  28 => 2,);
    }
}
