<?php

/* WebProfilerBundle:Profiler:toolbar_item.html.twig */
class __TwigTemplate_618c039da76ab86c33a7da904fa352d7 extends Twig_Template
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
        if ($this->getContext($context, "link")) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        <a style=\"text-decoration: none; margin: 0; padding: 0;\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => $this->getContext($context, "token"), "panel" => $this->getContext($context, "name"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "icon"), "html", null, true);
            echo "</a>
    ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 6
        echo "<span style=\"white-space:nowrap; color:#2f2f2f; display:inline-block; min-height:24px; border-right:1px solid #cdcdcd; padding:5px 7px 5px 4px; \">
     ";
        // line 7
        echo twig_escape_filter($this->env, ((array_key_exists("icon", $context)) ? (_twig_default_filter($this->getContext($context, "icon"), "")) : ("")), "html", null, true);
        echo "
     ";
        // line 8
        echo twig_escape_filter($this->env, ((array_key_exists("text", $context)) ? (_twig_default_filter($this->getContext($context, "text"), "")) : ("")), "html", null, true);
        echo "
</span>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 39,  106 => 41,  83 => 24,  101 => 26,  98 => 25,  66 => 21,  45 => 15,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 28,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 31,  90 => 23,  54 => 19,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 5,  72 => 17,  64 => 35,  53 => 23,  42 => 7,  34 => 7,  97 => 34,  95 => 24,  88 => 43,  78 => 25,  71 => 37,  25 => 7,  40 => 9,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 38,  47 => 15,  32 => 8,  22 => 3,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 20,  29 => 3,  24 => 6,  19 => 2,  69 => 16,  63 => 28,  58 => 26,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 43,  77 => 31,  75 => 18,  57 => 27,  50 => 18,  46 => 19,  44 => 14,  39 => 12,  33 => 9,  30 => 7,  27 => 9,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 7,  81 => 6,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 19,  51 => 18,  48 => 10,  41 => 9,  38 => 8,  35 => 6,  31 => 6,  28 => 7,);
    }
}
