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
        <input type=\"text\" name=\"f_name\" id=\"f_name\">
        <div class=\"sep\"></div>
        <label for=\"l_name\">Last name:</label>
        <input type=\"text\" name=\"l_name\" id=\"l_name\">
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
        return array (  106 => 41,  83 => 24,  101 => 26,  98 => 25,  66 => 24,  45 => 15,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 12,  21 => 1,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 31,  90 => 23,  54 => 19,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 2,  72 => 16,  64 => 13,  53 => 23,  42 => 7,  34 => 5,  97 => 34,  95 => 24,  88 => 43,  78 => 25,  71 => 14,  25 => 7,  40 => 13,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 47,  47 => 8,  32 => 5,  22 => 4,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 23,  29 => 3,  24 => 6,  19 => 2,  69 => 16,  63 => 23,  58 => 9,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 31,  75 => 5,  57 => 20,  50 => 18,  46 => 19,  44 => 23,  39 => 6,  33 => 6,  30 => 4,  27 => 5,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 7,  81 => 6,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 10,  51 => 9,  48 => 10,  41 => 9,  38 => 12,  35 => 7,  31 => 3,  28 => 2,);
    }
}
