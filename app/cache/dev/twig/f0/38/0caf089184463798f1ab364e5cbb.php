<?php

/* FrontFrontBundle:Account:Keyword/choose_project.html.twig */
class __TwigTemplate_f0380caf089184463798f1ab364e5cbb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::account_base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
        echo "    <i>Reminder: you can add ";
        echo twig_escape_filter($this->env, $this->getContext($context, "max_keyword"), "html", null, true);
        echo " keywords per project.</i>
    <br />
    Please choose a project from the list below:
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>#</th>
            <th>Project name</th>
            <th>Keyword count</th>
            <th>Category</th>
            <th>Domain</th>
        </tr>
        ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 16
            echo "            <tr>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, ($this->getContext($context, "key") + 1), "html", null, true);
            echo "</td>
                <td><a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keywords"), "html", null, true);
            echo "?hash=";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_name"), "html", null, true);
            echo "</a></td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "cnt_keywords"), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "category_name"), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_domain"), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "    </table>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/choose_project.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 24,  72 => 21,  68 => 20,  64 => 19,  56 => 18,  52 => 17,  49 => 16,  45 => 15,  29 => 3,  26 => 2,);
    }
}
