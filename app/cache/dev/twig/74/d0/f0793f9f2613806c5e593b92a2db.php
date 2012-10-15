<?php

/* FrontFrontBundle:Account:Report/report_list.html.twig */
class __TwigTemplate_74d0f0793f9f2613806c5e593b92a2db extends Twig_Template
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
        echo "    <h1>Report list</h1>
    <br />
    Choose project: 
    <select name=\"hash\" onchange=\"window.location='";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_report_list"), "html", null, true);
        echo "?hash='+this.value\">
        <option value=\"0\">[All projects]</option>
        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
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
        // line 11
        echo "    </select>
    <div class=\"sep\"></div>
    <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_modify_add_report"), "html", null, true);
        echo "\" class=\"btn btn-success\">Create report</a>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>Report title</th>
            <th>Report description</th>
            <th>Frequency</th>
            <th>Next Report</th>
            <th>Project</th>
            <th>Actions</th>
        </tr>
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "reports"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "report_title"), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "report_desc"), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "frequency"), "html", null, true);
            echo "</td>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "last_sent"), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "html", null, true);
            echo "</td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cnt_keywords"), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"\">Edit</a> |
                    <a href=\"\" onclick=\"return confirm('Please confirm');\">Delete</a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 38
        echo "    </table>
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/projects.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Report/report_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 44,  134 => 43,  130 => 42,  125 => 41,  122 => 40,  117 => 38,  104 => 31,  100 => 30,  96 => 29,  92 => 28,  88 => 27,  84 => 26,  81 => 25,  77 => 24,  63 => 13,  59 => 11,  44 => 9,  40 => 8,  35 => 6,  30 => 3,  27 => 2,);
    }
}
