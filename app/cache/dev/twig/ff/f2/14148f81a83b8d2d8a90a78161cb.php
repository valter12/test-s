<?php

/* FrontFrontBundle:Account:Keyword/incl_keyword_stats_filter.html.twig */
class __TwigTemplate_fff214148f81a83b8d2d8a90a78161cb extends Twig_Template
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
        echo "<div class=\"sep\"></div>
    <select name=\"\" onchange=\"window.location='";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keywords"), "html", null, true);
        echo "?hash='+this.value\">
       ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "all_projects"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            echo "           <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, "project_data"), "id") == $this->getAttribute($this->getContext($context, "item"), "id"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_name"), "html", null, true);
            echo "</option>
       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 6
        echo "    </select> 
    <i class=\"icon-arrow-right\"></i> 
    <select name=\"keyword_id\" onchange=\"window.location='";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
        echo "?keyword_id='+this.value\">
        ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "all_keywords"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 10
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, "keyword_data"), "id") == $this->getAttribute($this->getContext($context, "item"), "id"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "keyword"), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "     </select> 
    <i>(Last track on ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "keyword_data"), "last_track"), "html", null, true);
        echo ")</i>
    <br />
<div class=\"sep\"></div>
<div class=\"well\">
    <form action=\"\" method=\"get\" style=\"margin: 0\">
        <input type=\"hidden\" name=\"keyword_id\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "keyword_id"), "method"), "html", null, true);
        echo "\">
        Period from <input type=\"text\" style=\"width:100px;\" name=\"from_date\" id=\"from_date\" class=\"datepicker\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "from_date"), "method"), "html", null, true);
        echo "\"> 
        to <input type=\"text\" style=\"width:100px;\" name=\"to_date\" id=\"to_date\" class=\"datepicker\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "to_date"), "method"), "html", null, true);
        echo "\">
        &nbsp;&nbsp;&nbsp;Results per page: 
        <select name=\"results_per_page\" style=\"width: 70px;\">
            <option value=\"10\" ";
        // line 23
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "results_per_page"), "method") == 10)) {
            echo "selected=\"selected\"";
        }
        echo ">10</option>
            <option value=\"20\" ";
        // line 24
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "results_per_page"), "method") == 20)) {
            echo "selected=\"selected\"";
        }
        echo ">20</option>
        </select>
        ";
        // line 26
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/incl_keyword_competitors.html.twig")->display($context);
        // line 27
        echo "        <br />
        <input type=\"submit\" value=\"Apply\" class=\"btn btn-primary\">
    </form>
</div>
<a class=\"label label-info popup_hover_simple_click\" id=\"legend_a\" href=\"javascript:;\" data-original-title=\"Legend\">
    <i class=\"icon-info-sign icon-white\"></i>&nbsp;Legend
</a>
<div id=\"legend_div\" style=\"display: none;\">
    <span style='padding:7px;padding-right:15px;padding-left:15px;background-color:#96FF47;margin:3px;float:left;'>7/+2</span> - this means that the position in a search engine for the date displayed at left is 7 and it is 2 positions UP in comparision to last time
    <div class=\"sep\"></div>
    <br />
    <span style='padding:7px;padding-right:15px;padding-left:15px;background-color:#FFA5A5;margin:3px;float:left;'>8/-3</span> - this means that the position in a search engine for the date displayed at left is 8 and it is 3 positions DOWN in comparision to last time
    <div class=\"sep\"></div>
    <br />
    <span style='padding:7px;padding-right:15px;padding-left:15px;'>\"-\"</span> - the keyword was not found in first 10 pages of the coresponding search engine
</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/incl_keyword_stats_filter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 27,  108 => 26,  101 => 24,  95 => 23,  85 => 19,  81 => 18,  73 => 13,  70 => 12,  55 => 10,  51 => 9,  47 => 8,  43 => 6,  28 => 4,  24 => 3,  20 => 2,  17 => 1,  278 => 70,  269 => 68,  265 => 67,  258 => 62,  255 => 61,  249 => 59,  245 => 58,  241 => 57,  236 => 56,  233 => 55,  225 => 52,  222 => 51,  218 => 49,  215 => 48,  200 => 45,  192 => 44,  184 => 43,  176 => 42,  173 => 41,  170 => 40,  163 => 39,  160 => 38,  157 => 37,  151 => 36,  139 => 35,  136 => 34,  133 => 33,  126 => 32,  123 => 31,  120 => 30,  114 => 29,  102 => 28,  99 => 27,  96 => 26,  89 => 20,  86 => 24,  83 => 23,  77 => 22,  65 => 21,  61 => 20,  58 => 19,  54 => 18,  40 => 6,  37 => 5,  35 => 4,  32 => 3,  29 => 2,);
    }
}
