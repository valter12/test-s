<?php

/* FrontFrontBundle:Account:Competitor/project_competitors.html.twig */
class __TwigTemplate_6907af9833e7c183f5e4387f6279d871 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::account_base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::account_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"sep\"></div>
    <select name=\"\" onchange=\"window.location='";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_competitors"), "html", null, true);
        echo "?hash='+this.value\">
        ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 6
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "hash"), "method") == $this->getAttribute($this->getContext($context, "item"), "project_hash"))) {
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
        // line 8
        echo "    </select>
    <br />
    Competitors for \"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
        echo "\" project.
    <br />
    You currently have ";
        // line 12
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "project_competitors")), "html", null, true);
        echo " of possible ";
        echo twig_escape_filter($this->env, $this->getContext($context, "max_competitors"), "html", null, true);
        echo " competitors.
    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"addProjectCompetitorModal('";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
        echo "');\" class=\"btn btn-success\">Add competitor</a>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>#</th>
            <th>Competitor name</th>
            <th>Competitor domain</th>
            <th>Creation date</th>
            <th>Operations</th>
        </tr>
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_competitors"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "competitor_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "competitor_domain"), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"javascript:;\" onclick=\"showModifyModal('";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
            echo "')\">Modify</a>
                    <br />
                    <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_delete_project_competitor"), "html", null, true);
            echo "?id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('Please confirm you want to delete this competitor. (All statistics associated with it will be deleted also)')\">Delete</a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 37
        echo "    </table>
    <a href=\"javascript:;\" onclick=\"addProjectCompetitorModal('";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
        echo "');\" class=\"btn btn-success\">Add competitor</a>
";
    }

    // line 40
    public function block_javascripts($context, array $blocks = array())
    {
        // line 41
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/competitor.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Competitor/project_competitors.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 43,  145 => 42,  140 => 41,  137 => 40,  131 => 38,  128 => 37,  116 => 33,  109 => 31,  104 => 29,  100 => 28,  96 => 27,  92 => 26,  89 => 25,  85 => 24,  72 => 14,  65 => 12,  60 => 10,  56 => 8,  41 => 6,  37 => 5,  33 => 4,  30 => 3,  27 => 2,);
    }
}
