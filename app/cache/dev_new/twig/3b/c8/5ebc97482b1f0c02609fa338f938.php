<?php

/* FrontFrontBundle:Emails:email_confirmation.html.twig */
class __TwigTemplate_3bc85ebc97482b1f0c02609fa338f938 extends Twig_Template
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
        echo "Hello!
<br/>
<br/>
to finish the registration process on <a href=\"http://www.seowatchman.com\">www.SEOwatchman.com</a> please click on the following link: <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "activation_link"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "activation_link"), "html", null, true);
        echo "</a>
<br/>
<br/>
<i><span style=\"font-size: 11px\">If you did not register on www.SEOwatchman.com please ignore this message, your email will be soon deleted from our database.</span></i>
<br/>
<br/>
Have a beautiful day!
<br/>
SEOwatchman TEAM";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Emails:email_confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 26,  98 => 25,  66 => 24,  45 => 15,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 27,  21 => 1,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 33,  90 => 23,  54 => 19,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 27,  52 => 12,  26 => 2,  72 => 16,  64 => 15,  53 => 23,  42 => 14,  34 => 5,  97 => 34,  95 => 24,  88 => 43,  78 => 25,  71 => 14,  25 => 7,  40 => 13,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 47,  47 => 24,  32 => 11,  22 => 4,  23 => 3,  17 => 1,  92 => 20,  86 => 28,  79 => 40,  29 => 8,  24 => 6,  19 => 2,  69 => 30,  63 => 23,  58 => 9,  49 => 11,  43 => 15,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 27,  77 => 31,  75 => 5,  57 => 20,  50 => 18,  46 => 19,  44 => 23,  39 => 15,  33 => 10,  30 => 4,  27 => 5,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 40,  108 => 40,  104 => 39,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 7,  81 => 6,  73 => 30,  70 => 26,  67 => 31,  62 => 24,  59 => 23,  55 => 14,  51 => 18,  48 => 10,  41 => 9,  38 => 12,  35 => 7,  31 => 6,  28 => 3,);
    }
}
