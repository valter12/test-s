<?php

/* SensioDistributionBundle:Configurator:form.html.twig */
class __TwigTemplate_845f25e665e4c1a6338e86966fb33bb0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'field_rows' => array($this, 'block_field_rows'),
            'field_row' => array($this, 'block_field_row'),
            'field_label' => array($this, 'block_field_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field_rows($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"symfony-form-errors\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    </div>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "form"), "children"));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "        ";
            echo $this->env->getExtension('form')->renderRow($this->getContext($context, "child"));
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 12
    public function block_field_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"symfony-form-row\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderLabel($this->getContext($context, "form"));
        echo "
        <div class=\"symfony-form-field\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "form"));
        echo "
            <div class=\"symfony-form-errors\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 24
    public function block_field_label($context, array $blocks = array())
    {
        // line 25
        echo "    <label for=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
        ";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
        echo "
        ";
        // line 27
        if ($this->getContext($context, "required")) {
            // line 28
            echo "            <span class=\"symfony-form-required\" title=\"This field is required\">*</span>
        ";
        }
        // line 30
        echo "    </label>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 37,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  106 => 35,  83 => 26,  150 => 43,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  271 => 124,  262 => 121,  258 => 120,  255 => 119,  250 => 118,  248 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  222 => 90,  217 => 87,  213 => 85,  207 => 91,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  164 => 63,  118 => 36,  114 => 34,  170 => 63,  157 => 55,  154 => 55,  151 => 54,  140 => 48,  130 => 48,  119 => 39,  100 => 32,  56 => 14,  45 => 9,  68 => 20,  36 => 5,  66 => 19,  76 => 24,  112 => 58,  110 => 39,  85 => 28,  65 => 16,  61 => 16,  21 => 3,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 58,  148 => 57,  145 => 49,  141 => 55,  134 => 50,  132 => 44,  127 => 46,  123 => 35,  109 => 36,  93 => 28,  90 => 31,  54 => 12,  133 => 49,  124 => 41,  111 => 37,  80 => 26,  60 => 14,  52 => 13,  26 => 3,  72 => 21,  64 => 21,  53 => 13,  42 => 8,  34 => 5,  97 => 30,  95 => 30,  88 => 32,  78 => 25,  71 => 20,  25 => 5,  40 => 8,  224 => 91,  215 => 90,  211 => 88,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 47,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 21,  47 => 12,  32 => 5,  22 => 3,  23 => 3,  17 => 1,  92 => 23,  86 => 30,  79 => 24,  29 => 5,  24 => 3,  19 => 1,  69 => 21,  63 => 17,  58 => 16,  49 => 11,  43 => 8,  37 => 8,  20 => 2,  139 => 47,  131 => 48,  128 => 68,  125 => 41,  121 => 40,  115 => 39,  107 => 36,  99 => 33,  96 => 34,  91 => 27,  82 => 25,  77 => 23,  75 => 21,  57 => 13,  50 => 13,  46 => 11,  44 => 10,  39 => 7,  33 => 4,  30 => 7,  27 => 3,  135 => 41,  129 => 43,  122 => 48,  116 => 42,  113 => 40,  108 => 38,  104 => 40,  102 => 51,  94 => 32,  89 => 28,  87 => 26,  84 => 29,  81 => 24,  73 => 23,  70 => 18,  67 => 18,  62 => 17,  59 => 21,  55 => 14,  51 => 18,  48 => 12,  41 => 7,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
