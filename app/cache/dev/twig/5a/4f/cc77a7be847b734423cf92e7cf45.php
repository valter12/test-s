<?php

/* WebProfilerBundle:Profiler:notfound.html.twig */
class __TwigTemplate_5a4fcc77a7be847b734423cf92e7cf45 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"content\">
        ";
        // line 5
        $this->env->loadTemplate("WebProfilerBundle:Profiler:header.html.twig")->display(array());
        // line 6
        echo "
        <div id=\"resume\">
            <p>
                <strong>No request matching the token \"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\".</strong>
            </p>
        </div>

        <div id=\"main\">
            <div class=\"clear_fix\">
                <div id=\"collector_wrapper\">
                    <div id=\"collector_content\">
                        ";
        // line 17
        $this->displayBlock('panel', $context, $blocks);
        // line 23
        echo "                    </div>
                </div>
                <div id=\"navigation\">
                    ";
        // line 26
        echo $this->env->getExtension('actions')->renderAction("WebProfilerBundle:Profiler:searchBar", array("token" => $this->getContext($context, "token")), array());
        // line 27
        echo "                    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:admin.html.twig")->display(array("token" => $this->getContext($context, "token")));
        // line 28
        echo "                </div>
            </div>
        </div>
    </div>

";
    }

    // line 17
    public function block_panel($context, array $blocks = array())
    {
        // line 18
        echo "                            <h2>Token not found</h2>
                            <p>
                                <em>No request matching the token \"";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\".</em>
                            </p>
                        ";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:notfound.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 13,  45 => 20,  112 => 58,  110 => 42,  85 => 18,  65 => 28,  61 => 12,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 39,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 2,  72 => 17,  64 => 13,  53 => 23,  42 => 7,  34 => 5,  97 => 34,  95 => 47,  88 => 43,  78 => 25,  71 => 14,  25 => 7,  40 => 9,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 15,  47 => 8,  32 => 11,  22 => 2,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 20,  29 => 3,  24 => 3,  19 => 2,  69 => 16,  63 => 28,  58 => 26,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 16,  75 => 18,  57 => 6,  50 => 18,  46 => 19,  44 => 23,  39 => 6,  33 => 5,  30 => 4,  27 => 3,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 28,  81 => 17,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 10,  51 => 17,  48 => 10,  41 => 9,  38 => 12,  35 => 6,  31 => 10,  28 => 2,);
    }
}
