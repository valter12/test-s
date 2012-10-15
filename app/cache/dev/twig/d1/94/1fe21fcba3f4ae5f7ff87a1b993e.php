<?php

/* FrontFrontBundle:Account:Project/project_list.html.twig */
class __TwigTemplate_d1941fe21fcba3f4ae5f7ff87a1b993e extends Twig_Template
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
        echo "    Project list
    <br />
    You currently have ";
        // line 5
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "project_list")), "html", null, true);
        echo " of possible ";
        echo twig_escape_filter($this->env, $this->getContext($context, "max_packages"), "html", null, true);
        echo " projects.
    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"addProjectModal();\" class=\"btn btn-success\">Add project</a>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>#</th>
            <th>Project name</th>
            <th>Category</th>
            <th>Domain</th>
            <th>Hash <a href=\"javascript:;\" data-original-title=\"Project HASH\" data-content=\"You will need this hash when using <a href=''>Google bot tracker</a>.\" class=\"popup_hover\"><i class=\"icon-question-sign\"></i></a></th>
            <th>Creation date</th>
            <th>Keyword count</th>
            <th style=\"padding-left:20px;text-align:left !important\">Options</th>
        </tr>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 21
            echo "            <tr>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "category_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_domain"), "html", null, true);
            echo "</td>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "</td>
                <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "added"), "html", null, true);
            echo "</td>
                <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cnt_keywords"), "html", null, true);
            echo "</td>
                <td width=\"150\" style=\"padding:0\">
                    <ul class=\"nav nav-pills\" style=\"margin:0\">
                        <li class=\"dropdown\">
                            <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                Options
                                <b class=\"caret\"></b>
                            </a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"javascript:;\" onclick=\"showModifyModal('";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "')\"><i class=\"icon-edit\"></i>&nbsp;Modify</a></li>
                                <li><a href=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keywords"), "html", null, true);
            echo "?hash=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\"><i class=\"icon-screenshot\"></i>&nbsp;Keywords</a></li>
                                <li><a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_competitors"), "html", null, true);
            echo "?hash=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\"><i class=\"icon-random\"></i>&nbsp;Competitors</a></li>
                                <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_uptime"), "html", null, true);
            echo "?hash=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\"><i class=\"icon-time\"></i>&nbsp;Uptime</a></li>
                                <li><a href=\"\"><i class=\"icon-globe\"></i>&nbsp;Google bot tracker</a></li>
                                <li class=\"divider\"></li>
                                <li><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_delete_project"), "html", null, true);
            echo "?hash=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\" onclick=\"return confirm('Please confirm you want to delete this project. (The keywords and all statistics associated with it will be deleted also)')\"><i class=\"icon-trash\"></i>&nbsp;Delete</a></li>
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
        // line 50
        echo "    </table>
    <a href=\"javascript:;\" onclick=\"addProjectModal();\" class=\"btn btn-success\">Add project</a>
";
    }

    // line 53
    public function block_javascripts($context, array $blocks = array())
    {
        // line 54
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/projects.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Project/project_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 57,  154 => 56,  150 => 55,  145 => 54,  142 => 53,  136 => 50,  121 => 43,  113 => 40,  107 => 39,  101 => 38,  97 => 37,  85 => 28,  81 => 27,  77 => 26,  73 => 25,  69 => 24,  65 => 23,  61 => 22,  58 => 21,  54 => 20,  34 => 5,  30 => 3,  27 => 2,);
    }
}
