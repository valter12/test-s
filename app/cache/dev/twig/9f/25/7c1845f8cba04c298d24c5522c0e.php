<?php

/* FrontFrontBundle:Account:Keyword/incl_keyword_competitor.html.twig */
class __TwigTemplate_9f257c1845f8cba04c298d24c5522c0e extends Twig_Template
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
        return "FrontFrontBundle:Account:Keyword/incl_keyword_competitor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  27 => 5,  23 => 4,  19 => 2,  17 => 1,);
    }
}
