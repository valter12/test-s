<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_b2a8c51a37d02d6daa8870d1e703bd36 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Redirection Intercepted";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"sf-exceptionreset\">
        <div class=\"block_exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "location"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "location"), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 6,  76 => 39,  66 => 21,  45 => 20,  112 => 58,  110 => 42,  85 => 18,  65 => 28,  61 => 28,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 39,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 5,  72 => 17,  64 => 35,  53 => 23,  42 => 7,  34 => 11,  97 => 34,  95 => 47,  88 => 43,  78 => 25,  71 => 37,  25 => 5,  40 => 8,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 38,  47 => 15,  32 => 8,  22 => 3,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 20,  29 => 3,  24 => 3,  19 => 2,  69 => 16,  63 => 28,  58 => 26,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 43,  77 => 16,  75 => 18,  57 => 27,  50 => 18,  46 => 19,  44 => 14,  39 => 12,  33 => 5,  30 => 7,  27 => 3,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 28,  81 => 17,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 19,  51 => 18,  48 => 10,  41 => 9,  38 => 8,  35 => 6,  31 => 6,  28 => 7,);
    }
}
