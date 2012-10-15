<?php

/* SensioDistributionBundle:Configurator/Step:secret.html.twig */
class __TwigTemplate_2db11b92ffb88db848769d08fdf74fad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Symfony - Configure global Secret";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        echo $this->env->getExtension('form')->setTheme($this->getContext($context, "form"), array("SensioDistributionBundle::Configurator/form.html.twig", ));
        // line 7
        echo "    ";
        $this->env->loadTemplate("SensioDistributionBundle::Configurator/steps.html.twig")->display(array_merge($context, array("index" => $this->getContext($context, "index"), "count" => $this->getContext($context, "count"))));
        // line 8
        echo "
    <h1>Global Secret</h1>
    <p>Configure the global secret for your website (the secret is used for the CSRF protection among other things):</p>

    ";
        // line 12
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "
    <form action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_configurator_step", array("index" => $this->getContext($context, "index"))), "html", null, true);
        echo " \" method=\"POST\">
        <div class=\"symfony-form-row\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderLabel($this->getAttribute($this->getContext($context, "form"), "secret"));
        echo "
            <div class=\"symfony-form-field\">
                ";
        // line 17
        echo $this->env->getExtension('form')->renderWidget($this->getAttribute($this->getContext($context, "form"), "secret"));
        echo "
                <a class=\"symfony-button-grey\" href=\"#\" onclick=\"generateSecret(); return false;\">Generate</a>
                <div class=\"symfony-form-errors\">
                    ";
        // line 20
        echo $this->env->getExtension('form')->renderErrors($this->getAttribute($this->getContext($context, "form"), "secret"));
        echo "
                </div>
            </div>
        </div>

        ";
        // line 25
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "

        <div class=\"symfony-form-footer\">
            <p><input type=\"submit\" value=\"Next Step\" class=\"symfony-button-grey\" /></p>
            <p>* mandatory fields</p>
        </div>

    </form>

    <script type=\"text/javascript\">
        function generateSecret()
        {
            var result = '';
            for (i=0; i < 32; i++) {
                result += Math.round(Math.random()*16).toString(16);
            }
            document.getElementById('distributionbundle_secret_step_secret').value = result;
        }
    </script>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator/Step:secret.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 107,  228 => 103,  221 => 99,  214 => 95,  143 => 49,  150 => 43,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  271 => 124,  262 => 121,  258 => 120,  255 => 119,  250 => 118,  248 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  222 => 90,  217 => 87,  213 => 85,  207 => 91,  203 => 81,  201 => 80,  194 => 76,  183 => 69,  180 => 68,  175 => 66,  164 => 63,  118 => 36,  114 => 34,  170 => 63,  157 => 55,  154 => 55,  151 => 54,  140 => 48,  130 => 48,  119 => 39,  100 => 32,  56 => 14,  68 => 20,  36 => 6,  76 => 25,  106 => 35,  83 => 26,  101 => 26,  98 => 25,  66 => 19,  45 => 9,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 28,  65 => 18,  61 => 17,  21 => 3,  209 => 84,  205 => 82,  196 => 77,  192 => 78,  189 => 73,  178 => 71,  176 => 70,  165 => 63,  161 => 58,  152 => 58,  148 => 57,  145 => 49,  141 => 55,  134 => 50,  132 => 44,  127 => 46,  123 => 35,  109 => 36,  93 => 31,  90 => 36,  54 => 13,  133 => 49,  124 => 41,  111 => 37,  80 => 25,  60 => 16,  52 => 13,  26 => 3,  72 => 17,  64 => 21,  53 => 23,  42 => 8,  34 => 5,  97 => 26,  95 => 30,  88 => 32,  78 => 25,  71 => 20,  25 => 5,  40 => 8,  224 => 91,  215 => 90,  211 => 88,  204 => 84,  200 => 87,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 75,  179 => 72,  177 => 67,  171 => 67,  162 => 63,  158 => 57,  156 => 56,  153 => 59,  146 => 55,  142 => 48,  137 => 47,  126 => 39,  120 => 37,  117 => 44,  103 => 28,  74 => 21,  47 => 11,  32 => 6,  22 => 3,  23 => 3,  17 => 1,  92 => 23,  86 => 27,  79 => 28,  29 => 4,  24 => 3,  19 => 2,  69 => 21,  63 => 28,  58 => 16,  49 => 12,  43 => 10,  37 => 8,  20 => 2,  139 => 47,  131 => 48,  128 => 68,  125 => 41,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 31,  82 => 27,  77 => 22,  75 => 18,  57 => 15,  50 => 12,  46 => 11,  44 => 10,  39 => 7,  33 => 5,  30 => 7,  27 => 3,  135 => 41,  129 => 43,  122 => 48,  116 => 42,  113 => 43,  108 => 40,  104 => 40,  102 => 51,  94 => 32,  89 => 28,  87 => 32,  84 => 29,  81 => 29,  73 => 23,  70 => 26,  67 => 31,  62 => 17,  59 => 21,  55 => 14,  51 => 18,  48 => 12,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
