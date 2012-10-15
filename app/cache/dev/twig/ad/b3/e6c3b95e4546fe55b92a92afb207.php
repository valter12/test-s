<?php

/* FrontFrontBundle:Ajax:project_category.html.twig */
class __TwigTemplate_adb3e6c3b95e4546fe55b92a92afb207 extends Twig_Template
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
        echo "<div class=\"modal hide\" id=\"modal_box\">
    <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">×</button>
        ";
        // line 4
        if (($this->getContext($context, "action") == "new")) {
            // line 5
            echo "            <h3>Create project category</h3>
        ";
        } else {
            // line 7
            echo "            <h3>Modify project category \"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category_data"), "category_name"), "html", null, true);
            echo "\"</h3>
        ";
        }
        // line 9
        echo "    </div>
    <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_modify_add_project_category"), "html", null, true);
        echo "\" method=\"post\" style=\"margin:0\">
        <div class=\"modal-body\">
            <label for=\"category_name\">Category name</label>
            <input type=\"text\" name=\"category_name\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category_data"), "category_name"), "html", null, true);
        echo "\" id=\"category_name\" required=\"required\">
            <div class=\"sep\"></div>
            <input type=\"hidden\" name=\"category_id\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "category_data"), "id"), "html", null, true);
        echo "\">
            <input type=\"hidden\" name=\"action\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, "action"), "html", null, true);
        echo "\">
        </div>
        <div class=\"modal-footer\">
            <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
            <input type=\"submit\" class=\"btn btn-primary\" value=\"Save changes\">
        </div>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:project_category.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 16,  48 => 15,  43 => 13,  37 => 10,  34 => 9,  28 => 7,  24 => 5,  22 => 4,  17 => 1,);
    }
}
