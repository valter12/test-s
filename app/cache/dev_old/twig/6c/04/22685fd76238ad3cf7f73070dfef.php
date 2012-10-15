<?php

/* SensioDistributionBundle:Configurator:steps.html.twig */
class __TwigTemplate_6c0422685fd76238ad3cf7f73070dfef extends Twig_Template
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
        echo "<div class=\"symfony-block-steps\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "count")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 3
            echo "
      ";
            // line 4
            if (($this->getContext($context, "i") == ($this->getContext($context, "index") + 1))) {
                // line 5
                echo "          <span class=\"selected\">Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            } else {
                // line 7
                echo "          <span>Step ";
                echo twig_escape_filter($this->env, $this->getContext($context, "i"), "html", null, true);
                echo "</span>
      ";
            }
            // line 9
            echo "
      ";
            // line 10
            if (($this->getContext($context, "i") != $this->getContext($context, "count"))) {
                // line 11
                echo "        &gt;
      ";
            }
            // line 13
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:steps.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 37,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  106 => 35,  83 => 26,  150 => 43,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  271 => 124,  262 => 121,  258 => 120,  255 => 119,  250 => 118,  248 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  222 => 90,  217 => 87,  213 => 85,  207 => 91,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  164 => 63,  118 => 36,  114 => 34,  170 => 63,  157 => 55,  154 => 55,  151 => 54,  140 => 48,  130 => 48,  119 => 39,  100 => 32,  56 => 14,  45 => 9,  68 => 20,  36 => 7,  66 => 19,  76 => 24,  112 => 58,  110 => 39,  85 => 28,  65 => 18,  61 => 16,  21 => 3,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 58,  148 => 57,  145 => 49,  141 => 55,  134 => 50,  132 => 44,  127 => 46,  123 => 35,  109 => 36,  93 => 33,  90 => 31,  54 => 13,  133 => 49,  124 => 41,  111 => 37,  80 => 26,  60 => 16,  52 => 13,  26 => 3,  72 => 22,  64 => 21,  53 => 23,  42 => 8,  34 => 5,  97 => 26,  95 => 30,  88 => 32,  78 => 25,  71 => 20,  25 => 5,  40 => 8,  224 => 91,  215 => 90,  211 => 88,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 47,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 21,  47 => 12,  32 => 5,  22 => 3,  23 => 3,  17 => 1,  92 => 23,  86 => 30,  79 => 28,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 17,  58 => 16,  49 => 16,  43 => 11,  37 => 8,  20 => 2,  139 => 47,  131 => 48,  128 => 68,  125 => 41,  121 => 40,  115 => 39,  107 => 36,  99 => 33,  96 => 34,  91 => 31,  82 => 27,  77 => 22,  75 => 21,  57 => 15,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 5,  30 => 7,  27 => 4,  135 => 41,  129 => 43,  122 => 48,  116 => 42,  113 => 40,  108 => 38,  104 => 40,  102 => 51,  94 => 32,  89 => 28,  87 => 32,  84 => 29,  81 => 24,  73 => 23,  70 => 21,  67 => 15,  62 => 17,  59 => 21,  55 => 14,  51 => 18,  48 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
