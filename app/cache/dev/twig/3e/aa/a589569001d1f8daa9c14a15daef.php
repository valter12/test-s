<?php

/* FrontFrontBundle:Account:Keyword/keyword_list.html.twig */
class __TwigTemplate_3eaaa589569001d1f8daa9c14a15daef extends Twig_Template
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
    <div class=\"sep\"></div>
    <select name=\"hash\" onchange=\"window.location='";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keywords"), "html", null, true);
        echo "?hash='+this.value\">
        <option value=\"0\">[Choose project]</option>
        ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
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
        // line 10
        echo "    </select>
    <div class=\"sep\"></div>
    Keywords for project \"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
        echo "\"
    <br />
    You currently have ";
        // line 14
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "keyword_list")), "html", null, true);
        echo " of possible ";
        echo twig_escape_filter($this->env, $this->getContext($context, "max_keywords"), "html", null, true);
        echo " keywords.
    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"\$('#add_keywords_div').toggle();\" class=\"btn btn-success\">Add Keywords</a>
    <br />
    <br />
    <div id=\"add_keywords_div\" style=\"display: none;\">
        <form action=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_execute_add_keywords"), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"project_hash\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
        echo "\">
            <div class=\"add_group\">
                Enter one keyword per line:
                <br />
                <textarea name=\"keywords\"></textarea>
            </div>
            <div class=\"sep\"></div>
            <input type=\"submit\" class=\"btn btn-primary\" value=\"Save keywords\">
        </form>
    </div>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>#</th>
            <th>Keyword</th>
            <th>Last track</th>
            <th>Creation date</th>
            <th style=\"padding-left:20px;text-align:left !important\">Options</th>
        </tr>
        ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "keyword_list"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 41
            echo "            <tr>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</td>
                <td><a title=\"Show keyword stats\" href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
            echo "?keyword_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "keyword"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "last_track"), "html", null, true);
            echo "</td>
                <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "html", null, true);
            echo "</td>
                <td width=\"150\" style=\"padding:0\">
                    <ul class=\"nav nav-pills\" style=\"margin:0\">
                        <li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                Options
                                <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
            echo "?keyword_id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\"><i class=\"icon-align-left\"></i>&nbsp;Keyword stats</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_delete_keyword"), "html", null, true);
            echo "?id=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" onclick=\"return confirm('Please confirm you want to delete this keyword. (All statistics associated with it will be deleted also)')\"><i class=\"icon-trash\"></i>&nbsp;Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 63
        echo "    </table>
";
    }

    // line 65
    public function block_javascripts($context, array $blocks = array())
    {
        // line 66
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/keyword-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/keyword_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 69,  178 => 68,  174 => 67,  169 => 66,  166 => 65,  161 => 63,  146 => 56,  139 => 54,  127 => 45,  123 => 44,  115 => 43,  111 => 42,  108 => 41,  104 => 40,  82 => 21,  78 => 20,  67 => 14,  62 => 12,  58 => 10,  43 => 8,  39 => 7,  34 => 5,  30 => 3,  27 => 2,);
    }
}
