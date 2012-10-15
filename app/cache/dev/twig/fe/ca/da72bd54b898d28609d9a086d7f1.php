<?php

/* FrontFrontBundle:Account:Uptime/project_uptime.html.twig */
class __TwigTemplate_fecada72bd54b898d28609d9a086d7f1 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_uptime"), "html", null, true);
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
    Uptime stats for \"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
        echo "\" project.
    <div class=\"sep\"></div>
    <table>
            <tr>
                <th>Date</th>
                <th>&nbsp;</th>
                <th align=\"right\">Total offline</th>
            </tr>
        ";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_uptime"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 19
            echo "            <tr>
                <td width=\"100\">";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "summary_date"), "html", null, true);
            echo "</td>
                <td>
                    <div class=\"uptime_all\">
                        ";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "item"), "summary"));
            foreach ($context['_seq'] as $context["_key"] => $context["summary_data"]) {
                // line 24
                echo "                            <div class=\"uptime_";
                if (($this->getAttribute($this->getContext($context, "summary_data"), "site_status") == "DOWN")) {
                    echo "UP ";
                } else {
                    echo "DOWN tooltip_el";
                }
                echo "\" data-original-title=\"Site down between ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "summary_data"), "between_hours"), "html", null, true);
                echo "\" style=\"width:";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "summary_data"), "width_percent"), "html", null, true);
                echo "%\"></div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['summary_data'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 26
            echo "                    </div>
                </td>
                <td width=\"100\" align=\"right\">
                    ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "total_down"), "html", null, true);
            echo " hours (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "total_down_percent"), "html", null, true);
            echo "%)
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 33
        echo "    </table>
";
    }

    // line 35
    public function block_javascripts($context, array $blocks = array())
    {
        // line 36
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-tooltip.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.22.custom.min_datepicker.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/project_uptime.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Uptime/project_uptime.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 39,  139 => 38,  135 => 37,  130 => 36,  127 => 35,  122 => 33,  110 => 29,  105 => 26,  88 => 24,  84 => 23,  78 => 20,  75 => 19,  71 => 18,  60 => 10,  56 => 8,  41 => 6,  37 => 5,  33 => 4,  30 => 3,  27 => 2,);
    }
}
