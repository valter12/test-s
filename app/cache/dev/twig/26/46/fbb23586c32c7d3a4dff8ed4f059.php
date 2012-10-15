<?php

/* FrontFrontBundle:Ajax:competitor_list.html.twig */
class __TwigTemplate_2646fbb23586c32c7d3a4dff8ed4f059 extends Twig_Template
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
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/incl_keyword_competitor.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:competitor_list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  17 => 1,);
    }
}
