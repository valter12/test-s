<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_ac2cd434f3465517c7d1ab0e3426e3da extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 11,  25 => 5,  17 => 1,  198 => 82,  192 => 80,  188 => 79,  184 => 78,  179 => 77,  176 => 76,  171 => 71,  139 => 29,  121 => 20,  117 => 18,  114 => 17,  108 => 7,  105 => 6,  99 => 5,  92 => 84,  89 => 82,  87 => 76,  81 => 72,  78 => 71,  72 => 68,  65 => 65,  59 => 62,  55 => 60,  53 => 59,  49 => 57,  47 => 17,  38 => 11,  35 => 10,  33 => 6,  23 => 1,  363 => 99,  354 => 97,  350 => 96,  347 => 95,  344 => 94,  338 => 92,  334 => 91,  330 => 90,  325 => 89,  322 => 88,  314 => 85,  311 => 84,  301 => 77,  295 => 76,  279 => 72,  269 => 71,  259 => 70,  256 => 69,  253 => 68,  246 => 67,  243 => 66,  240 => 65,  234 => 64,  220 => 63,  217 => 62,  214 => 61,  207 => 60,  204 => 59,  201 => 83,  195 => 57,  181 => 56,  178 => 55,  175 => 54,  168 => 53,  165 => 52,  162 => 51,  156 => 50,  142 => 49,  137 => 48,  133 => 26,  127 => 23,  124 => 45,  120 => 44,  103 => 29,  97 => 25,  86 => 23,  82 => 22,  77 => 19,  75 => 18,  68 => 66,  62 => 15,  56 => 12,  52 => 11,  48 => 10,  36 => 5,  32 => 3,  29 => 5,);
    }
}
