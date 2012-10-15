<?php

/* FrontFrontBundle:User:show.html.twig */
class __TwigTemplate_ff2b84c972ecc238413658de72a01477 extends Twig_Template
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
        echo "<h1>User</h1>

<table class=\"record_properties\">
    <tbody>
        <tr>
            <th>Id</th>
            <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "email"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Fname</th>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "fName"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Lname</th>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "lName"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Pass</th>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "pass"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Hasactivatedemail</th>
            <td>";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "hasActivatedEmail"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Activationhash</th>
            <td>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "activationHash"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Haspayed</th>
            <td>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "hasPayed"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Isdeleted</th>
            <td>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "isDeleted"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Secrethash</th>
            <td>";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "secretHash"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Nextpaydate</th>
            <td>";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "nextPayDate"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>Added</th>
            <td>";
        // line 51
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "added"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>

<ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user"), "html", null, true);
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\">
            Edit
        </a>
    </li>
    <li>
        <form action=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_delete", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
        echo "\" method=\"post\">
            ";
        // line 69
        echo $this->env->getExtension('form')->renderWidget($this->getContext($context, "delete_form"));
        echo "
            <button type=\"submit\">Delete</button>
        </form>
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:User:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 27,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 39,  93 => 33,  90 => 32,  54 => 14,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 3,  72 => 16,  64 => 15,  53 => 23,  42 => 7,  34 => 5,  97 => 34,  95 => 47,  88 => 43,  78 => 25,  71 => 14,  25 => 7,  40 => 22,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 35,  47 => 24,  32 => 11,  22 => 2,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 40,  29 => 4,  24 => 3,  19 => 2,  69 => 29,  63 => 18,  58 => 9,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 31,  75 => 24,  57 => 26,  50 => 18,  46 => 19,  44 => 23,  39 => 15,  33 => 5,  30 => 4,  27 => 4,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 28,  81 => 39,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 14,  51 => 13,  48 => 10,  41 => 9,  38 => 12,  35 => 7,  31 => 4,  28 => 3,);
    }
}
