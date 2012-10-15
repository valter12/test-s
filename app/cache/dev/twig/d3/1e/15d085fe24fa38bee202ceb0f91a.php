<?php

/* FrontFrontBundle:Ajax:too_many_projects.html.twig */
class __TwigTemplate_d31e15d085fe24fa38bee202ceb0f91a extends Twig_Template
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
        <h3>You cannot create projects</h3>
    </div>
    <div class=\"modal-body\">
        You have reached the maximum project count for the chosen package. Please upgrade.
    </div>
    <div class=\"modal-footer\">
        <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:too_many_projects.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  17 => 1,);
    }
}
