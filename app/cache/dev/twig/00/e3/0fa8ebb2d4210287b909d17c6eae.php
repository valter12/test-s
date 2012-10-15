<?php

/* FrontFrontBundle:Account:Keyword/keyword_stats_pagination.html.twig */
class __TwigTemplate_00e30fa8ebb2d4210287b909d17c6eae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div style=\"float: right;\">
    ";
        // line 2
        if ($this->getContext($context, "prev_page")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, $this->getContext($context, "prev_page"), "html", null, true);
            echo "\" class=\"btn\"><i class=\"icon-circle-arrow-left\"></i></a>";
        }
        // line 3
        echo "    ";
        if ($this->getContext($context, "next_page")) {
            echo "<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
            echo "?";
            echo twig_escape_filter($this->env, $this->getContext($context, "next_page"), "html", null, true);
            echo "\" class=\"btn\"><i class=\"icon-circle-arrow-right\"></i></a>";
        }
        // line 4
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/keyword_stats_pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  20 => 2,  17 => 1,  389 => 113,  380 => 111,  376 => 110,  373 => 109,  370 => 108,  364 => 106,  360 => 105,  356 => 104,  351 => 103,  348 => 102,  340 => 99,  337 => 98,  323 => 87,  321 => 86,  317 => 84,  311 => 83,  303 => 80,  297 => 79,  293 => 78,  290 => 77,  286 => 75,  283 => 74,  276 => 73,  274 => 72,  270 => 71,  267 => 70,  263 => 68,  260 => 67,  253 => 66,  251 => 65,  247 => 64,  244 => 63,  240 => 61,  237 => 60,  230 => 59,  228 => 58,  224 => 57,  221 => 56,  217 => 54,  214 => 53,  211 => 52,  204 => 51,  201 => 50,  198 => 49,  191 => 48,  189 => 47,  175 => 46,  172 => 45,  168 => 43,  165 => 42,  162 => 41,  155 => 40,  152 => 39,  149 => 38,  142 => 37,  140 => 36,  126 => 35,  123 => 34,  119 => 32,  116 => 31,  113 => 30,  106 => 29,  103 => 28,  100 => 27,  93 => 26,  91 => 25,  77 => 24,  72 => 23,  68 => 22,  62 => 21,  59 => 20,  55 => 19,  40 => 6,  37 => 4,  35 => 4,  32 => 3,  29 => 2,);
    }
}
