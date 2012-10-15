<?php

/* FrontFrontBundle:Ajax:competitor_modification.html.twig */
class __TwigTemplate_dd385bc24dff99f7db0d19ae2b1d7ce3 extends Twig_Template
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
            echo "            <h3>Add competitor</h3>
        ";
        } else {
            // line 7
            echo "            <h3>Modify competitor \"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "competitor_data"), "competitor_name"), "html", null, true);
            echo "\"</h3>
        ";
        }
        // line 9
        echo "    </div>
    <form action=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_execute_modify_project_competitor"), "html", null, true);
        echo "\" method=\"post\">
        <div class=\"modal-body\">
            Project name: ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_name"), "html", null, true);
        echo "
            <div class=\"sep\"></div>
            <label for=\"competitor_name\">Competitor name</label>
            <input type=\"text\" name=\"competitor_name\" value=\"";
        // line 15
        if ($this->getContext($context, "competitor_data")) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "competitor_data"), "competitor_name"), "html", null, true);
        }
        echo "\" id=\"competitor_name\" required=\"required\" >
            ";
        // line 16
        if (($this->getContext($context, "action") == "new")) {
            // line 17
            echo "                <div class=\"sep\"></div>
                <label for=\"competitor_domain\">Competitor domain</label>
                <input type=\"text\" name=\"competitor_domain\" value=\"\" id=\"competitor_domain\" class=\"popup_focus\" data-original-title=\"ATTENTION!\" data-content=\"Please double check the domain name, after the system will begin to track it you will not be able to change it.\" required=\"required\" >
            ";
        }
        // line 21
        echo "            <div class=\"sep\"></div>
            <input type=\"hidden\" name=\"project_hash\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "project_data"), "project_hash"), "html", null, true);
        echo "\">
            <input type=\"hidden\" name=\"action\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getContext($context, "action"), "html", null, true);
        echo "\">
            ";
        // line 24
        if ($this->getContext($context, "competitor_data")) {
            // line 25
            echo "                <input type=\"hidden\" name=\"competitor_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "competitor_data"), "id"), "html", null, true);
            echo "\">
            ";
        }
        // line 27
        echo "        </div>
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
        return "FrontFrontBundle:Ajax:competitor_modification.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 27,  75 => 25,  73 => 24,  69 => 23,  65 => 22,  62 => 21,  56 => 17,  54 => 16,  48 => 15,  42 => 12,  37 => 10,  34 => 9,  28 => 7,  24 => 5,  22 => 4,  17 => 1,);
    }
}
