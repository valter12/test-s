<?php

/* FrontFrontBundle:Ajax:keyword_list.html.twig */
class __TwigTemplate_7172fd38da958959be6099085a97d0c0 extends Twig_Template
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
        echo "<select name=\"keyword_id\" id=\"keyword_list\">
    <option value=\"\">[Choose keyword]</option>
    ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "keywords"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            echo "        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
            echo "\" ";
            if (($this->getContext($context, "keyword_id") == $this->getAttribute($this->getContext($context, "item"), "id"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "keyword"), "html", null, true);
            echo "</option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 6
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:keyword_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  25 => 4,  21 => 3,  17 => 1,);
    }
}
