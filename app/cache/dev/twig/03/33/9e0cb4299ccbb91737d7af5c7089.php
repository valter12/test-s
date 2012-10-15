<?php

/* FrontFrontBundle:Account:Keyword/incl_keyword_competitors.html.twig */
class __TwigTemplate_03339e0cb4299ccbb91737d7af5c7089 extends Twig_Template
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
        if ($this->getContext($context, "competitors")) {
            // line 2
            echo "    <div>
        <select name=\"competitor_list\" id=\"competitors\">
            ";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "competitors"));
            foreach ($context['_seq'] as $context["_key"] => $context["competitor"]) {
                // line 5
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "competitor"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "competitor"), "competitor_name"), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['competitor'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 7
            echo "        </select>
        <a href=\"javascript:;\" onclick=\"addCompetitor()\"><i class=\"icon-plus\"></i> add competitor</a> 
        <span id=\"competitor_containter\"></span>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/incl_keyword_competitors.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  27 => 5,  23 => 4,  19 => 2,  110 => 27,  108 => 26,  101 => 24,  95 => 23,  89 => 20,  85 => 19,  81 => 18,  73 => 13,  70 => 12,  55 => 10,  51 => 9,  47 => 8,  43 => 6,  28 => 4,  24 => 3,  20 => 2,  17 => 1,);
    }
}
