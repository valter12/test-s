<?php

/* FrontFrontBundle:Ajax:other_changes.html.twig */
class __TwigTemplate_3617f45df4497a6247400ae6365dd4f3 extends Twig_Template
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
        <h3>You have changes on this track item:</h3>
    </div>
    <div class=\"modal-body\">
        ";
        // line 7
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "google_description_change", array(), "array")) {
            // line 8
            echo "            <span class=\"label label-success\">Google description</span>
            <table width=\"100%\">
                <tr>
                    <td width=\"50%\" valign=\"top\">
                        <h5>Before</h5>
                        ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 1, array(), "array"), "google_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <h5>After</h5>
                        ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "google_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                </tr>
            </table>
            <div class=\"sep\"></div>
        ";
        }
        // line 23
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "bing_description_change", array(), "array")) {
            // line 24
            echo "            <span class=\"label label-success\">Bing description</span>
            <table width=\"100%\">
                <tr>
                    <td width=\"50%\" valign=\"top\">
                        <h5>Before</h5>
                        ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 1, array(), "array"), "bing_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <h5>After</h5>
                        ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "bing_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                </tr>
            </table>
            <div class=\"sep\"></div>
        ";
        }
        // line 39
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "yahoo_description_change", array(), "array")) {
            // line 40
            echo "            <span class=\"label label-success\">Yahoo description</span>
            <table width=\"100%\">
                <tr>
                    <td width=\"50%\" valign=\"top\">
                        <h5>Before</h5>
                        ";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 1, array(), "array"), "yahoo_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <h5>After</h5>
                        ";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "changes"), 0, array(), "array"), "yahoo_description", array(), "array"), "html", null, true);
            echo "
                    </td>
                </tr>
            </table>
            <div class=\"sep\"></div>
        ";
        }
        // line 55
        echo "    </div>
    <div class=\"modal-footer\">
        <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:other_changes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 55,  93 => 49,  86 => 45,  79 => 40,  76 => 39,  67 => 33,  60 => 29,  53 => 24,  50 => 23,  41 => 17,  34 => 13,  27 => 8,  25 => 7,  17 => 1,);
    }
}
