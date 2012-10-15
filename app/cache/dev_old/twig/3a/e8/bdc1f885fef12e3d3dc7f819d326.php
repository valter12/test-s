<?php

/* SensioDistributionBundle:Configurator:final.html.twig */
class __TwigTemplate_3ae8bdc1f885fef12e3d3dc7f819d326 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'content_class' => array($this, 'block_content_class'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content_class($context, array $blocks = array())
    {
        echo "config_done";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <h1>Well done!</h1>
    ";
        // line 6
        if ($this->getContext($context, "is_writable")) {
            // line 7
            echo "    <h2>Your distribution is configured!</h2>
    ";
        } else {
            // line 9
            echo "    <h2 class=\"configure-error\">Your distribution is almost configured but...</h2>
    ";
        }
        // line 11
        echo "    <h3>
        <span>
            ";
        // line 13
        if ($this->getContext($context, "is_writable")) {
            // line 14
            echo "                Your parameters.ini has been overwritten with these parameters (in <em>";
            echo twig_escape_filter($this->env, $this->getContext($context, "ini_path"), "html", null, true);
            echo "</em>):
            ";
        } else {
            // line 16
            echo "                Your parameters.ini file is not writeable! Here are the parameters you can copy and paste in <em>";
            echo twig_escape_filter($this->env, $this->getContext($context, "ini_path"), "html", null, true);
            echo "</em>:
            ";
        }
        // line 18
        echo "        </span>
    </h3>

    <textarea class=\"symfony-configuration\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, "parameters"), "html", null, true);
        echo "</textarea>

    ";
        // line 23
        if ($this->getContext($context, "welcome_url")) {
            // line 24
            echo "        <ul>
            <li><a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getContext($context, "welcome_url"), "html", null, true);
            echo "\">Go to the Welcome page</a></li>
        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:final.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 37,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  106 => 35,  83 => 26,  150 => 43,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  271 => 124,  262 => 121,  258 => 120,  255 => 119,  250 => 118,  248 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  222 => 90,  217 => 87,  213 => 85,  207 => 91,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  164 => 63,  118 => 36,  114 => 34,  170 => 63,  157 => 55,  154 => 55,  151 => 54,  140 => 48,  130 => 48,  119 => 39,  100 => 32,  56 => 14,  45 => 9,  68 => 20,  36 => 5,  66 => 19,  76 => 24,  112 => 58,  110 => 39,  85 => 28,  65 => 18,  61 => 16,  21 => 3,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 58,  148 => 57,  145 => 49,  141 => 55,  134 => 50,  132 => 44,  127 => 46,  123 => 35,  109 => 36,  93 => 33,  90 => 31,  54 => 13,  133 => 49,  124 => 41,  111 => 37,  80 => 26,  60 => 16,  52 => 13,  26 => 3,  72 => 21,  64 => 21,  53 => 13,  42 => 8,  34 => 5,  97 => 26,  95 => 30,  88 => 32,  78 => 25,  71 => 20,  25 => 5,  40 => 8,  224 => 91,  215 => 90,  211 => 88,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 47,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 21,  47 => 12,  32 => 5,  22 => 3,  23 => 3,  17 => 1,  92 => 23,  86 => 30,  79 => 24,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 17,  58 => 16,  49 => 11,  43 => 11,  37 => 8,  20 => 2,  139 => 47,  131 => 48,  128 => 68,  125 => 41,  121 => 40,  115 => 39,  107 => 36,  99 => 33,  96 => 34,  91 => 31,  82 => 25,  77 => 23,  75 => 21,  57 => 15,  50 => 13,  46 => 11,  44 => 10,  39 => 6,  33 => 4,  30 => 7,  27 => 3,  135 => 41,  129 => 43,  122 => 48,  116 => 42,  113 => 40,  108 => 38,  104 => 40,  102 => 51,  94 => 32,  89 => 28,  87 => 32,  84 => 29,  81 => 24,  73 => 23,  70 => 21,  67 => 18,  62 => 17,  59 => 21,  55 => 14,  51 => 18,  48 => 12,  41 => 7,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
