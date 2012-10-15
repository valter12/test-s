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
        return array (  106 => 41,  83 => 24,  101 => 26,  98 => 25,  66 => 24,  45 => 15,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 12,  21 => 1,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 31,  90 => 23,  54 => 19,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 3,  72 => 16,  64 => 13,  53 => 23,  42 => 7,  34 => 5,  97 => 34,  95 => 24,  88 => 43,  78 => 25,  71 => 14,  25 => 7,  40 => 13,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 47,  47 => 8,  32 => 5,  22 => 4,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 23,  29 => 4,  24 => 6,  19 => 2,  69 => 16,  63 => 23,  58 => 9,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 31,  75 => 5,  57 => 20,  50 => 18,  46 => 19,  44 => 23,  39 => 6,  33 => 6,  30 => 4,  27 => 5,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 7,  81 => 6,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 10,  51 => 9,  48 => 10,  41 => 9,  38 => 12,  35 => 7,  31 => 3,  28 => 2,);
    }
}
