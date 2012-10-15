<?php

/* FrontFrontBundle:Account:ProjectCategories/project_categories_list.html.twig */
class __TwigTemplate_fedf4393cad281f5f08eb78cb47f5c83 extends Twig_Template
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
        echo "    Project category list
    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"addProjectCategoryModal();\" class=\"btn btn-success\">Add category</a>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>#</th>
            <th>Category name</th>
            <th>Operations</th>
        </tr>
        ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "categories_list"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 14
            echo "            <tr>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</td>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "category_name"), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"javascript:;\" onclick=\"showModifyModal('";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "')\">Modify</a>
                    ";
            // line 19
            if (($this->getAttribute($this->getContext($context, "item"), "is_generic") != 1)) {
                // line 20
                echo "                        <br />
                        <a href=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_delete_project_category"), "html", null, true);
                echo "?category_id=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
                echo "\" onclick=\"return confirm('Please confirm you want to delete this project category. (The projects, keywords and all statistics associated with it will be deleted also)')\">Delete</a>
                    ";
            }
            // line 23
            echo "                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "    </table>
    <a href=\"javascript:;\" onclick=\"addProjectCategoryModal();\" class=\"btn btn-success\">Add category</a>
";
    }

    // line 29
    public function block_javascripts($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/project-category.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:ProjectCategories/project_categories_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 32,  96 => 31,  91 => 30,  88 => 29,  82 => 26,  74 => 23,  67 => 21,  64 => 20,  62 => 19,  58 => 18,  53 => 16,  49 => 15,  46 => 14,  42 => 13,  30 => 3,  27 => 2,);
    }
}
