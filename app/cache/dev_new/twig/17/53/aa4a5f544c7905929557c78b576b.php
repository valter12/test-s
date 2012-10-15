<?php

/* WebProfilerBundle:Profiler:search.html.twig */
class __TwigTemplate_1753aa4a5f544c7905929557c78b576b extends Twig_Template
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
        echo "<div class=\"search clearfix\">
    <h3>
        <img style=\"margin: 0 5px 0 0; vertical-align: middle;\" width=\"16\" height=\"16\" alt=\"Search\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/search.png"), "html", null, true);
        echo "\" />
        Search
    </h3>
    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler_search"), "html", null, true);
        echo "\" method=\"get\">
        <label for=\"ip\">IP</label>
        <input type=\"text\" name=\"ip\" id=\"ip\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getContext($context, "ip"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"url\">URL</label>
        <input type=\"text\" name=\"url\" id=\"url\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"token\">Token</label>
        <input type=\"text\" name=\"token\" id=\"token\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" />
        <div class=\"clear_fix\"></div>
        <label for=\"limit\">Limit</label>
        <select name=\"limit\" id=\"limit\">
            ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => 10, 1 => 50, 2 => 100));
        foreach ($context['_seq'] as $context["_key"] => $context["l"]) {
            // line 19
            echo "                <option";
            echo ((($this->getContext($context, "l") == $this->getContext($context, "limit"))) ? (" selected=\"selected\"") : (""));
            echo ">";
            echo twig_escape_filter($this->env, $this->getContext($context, "l"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['l'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 21
        echo "        </select>

        <button type=\"submit\">
            <span class=\"border_l\">
                <span class=\"border_r\">
                    <span class=\"btn_bg\">SEARCH</span>
                </span>
            </span>
        </button>
        <div class=\"clear_fix\"></div>
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 39,  106 => 41,  83 => 24,  101 => 26,  98 => 25,  66 => 21,  45 => 15,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 28,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 31,  90 => 23,  54 => 19,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 5,  72 => 17,  64 => 35,  53 => 23,  42 => 7,  34 => 5,  97 => 34,  95 => 24,  88 => 43,  78 => 25,  71 => 37,  25 => 7,  40 => 9,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 38,  47 => 8,  32 => 8,  22 => 3,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 20,  29 => 3,  24 => 6,  19 => 2,  69 => 16,  63 => 28,  58 => 26,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 43,  77 => 31,  75 => 18,  57 => 27,  50 => 18,  46 => 19,  44 => 14,  39 => 6,  33 => 5,  30 => 7,  27 => 6,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 7,  81 => 6,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 19,  51 => 18,  48 => 10,  41 => 9,  38 => 11,  35 => 6,  31 => 10,  28 => 2,);
    }
}
