<?php

/* FrontFrontBundle:Ajax:project_modification.html.twig */
class __TwigTemplate_61dfd0d3437a841eb58753b60012cffd extends Twig_Template
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
            echo "            <h3>Create project</h3>
        ";
        } else {
            // line 7
            echo "            <h3>Modify project \"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
            echo "\"</h3>
        ";
        }
        // line 9
        echo "    </div>
    <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_execute_modify_project"), "html", null, true);
        echo "\" method=\"post\" style=\"margin:0\">
        <div class=\"modal-body\">
            <label for=\"project_category\">Project category</label>
            <select name=\"project_category\" id=\"project_category\">
                ";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_categories"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 15
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getContext($context, "project_data"), "category_id") == $this->getAttribute($this->getContext($context, "item"), "id"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "category_name"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "            </select>
            <div class=\"sep\"></div>
            <label for=\"project_name\">Project name</label>
            <input type=\"text\" name=\"project_name\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
        echo "\" id=\"project_name\" required=\"required\">
            ";
        // line 21
        if (($this->getContext($context, "action") == "new")) {
            // line 22
            echo "                <div class=\"sep\"></div>
                <label for=\"project_domain\">Project domain</label>
                <input type=\"url\" name=\"project_domain\" value=\"\" id=\"project_domain\" class=\"popup_focus\" data-original-title=\"ATTENTION!\" data-content=\"Please double check the domain name, after the system will begin to track it you will not be able to change it.\" required=\"required\" >
            ";
        }
        // line 26
        echo "            <div class=\"sep\"></div>
            <label for=\"project_desc\">Project description</label>
            <textarea name=\"project_desc\" id=\"project_desc\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_description"), "html", null, true);
        echo "</textarea>
            <div class=\"sep\"></div>
            <input type=\"hidden\" name=\"project_hash\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
        echo "\">
            <input type=\"hidden\" name=\"action\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, "action"), "html", null, true);
        echo "\">
        </div>
        <div class=\"modal-footer\">
            <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
            <input type=\"submit\" class=\"btn btn-primary\" value=\"Save changes\">
        </div>
    </form>
</div>
<script>
    jQuery(document).ready(function(){
        \$('.popup_focus').popover({
            'trigger': 'focus'
        });
    });
</script>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:project_modification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 31,  89 => 30,  84 => 28,  80 => 26,  74 => 22,  72 => 21,  68 => 20,  63 => 17,  48 => 15,  44 => 14,  37 => 10,  34 => 9,  28 => 7,  24 => 5,  22 => 4,  17 => 1,);
    }
}
