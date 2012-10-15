<?php

/* FrontFrontBundle:Ajax:error_popup.html.twig */
class __TwigTemplate_2503fa2c7a1c20a861cb27d569eaf9f9 extends Twig_Template
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
        <h3>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "title"), "html", null, true);
        echo "</h3>
    </div>
    <div class=\"modal-body\">
        ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "message"), "body"), "html", null, true);
        echo "
    </div>
    <div class=\"modal-footer\">
        <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:error_popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 7,  22 => 4,  17 => 1,);
    }
}
