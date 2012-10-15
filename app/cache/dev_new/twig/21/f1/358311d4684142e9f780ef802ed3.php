<?php

/* WebProfilerBundle:Collector:events.html.twig */
class __TwigTemplate_21f1358311d4684142e9f780ef802ed3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["__internal_21f1358311d4684142e9f780ef802ed3_1"] = $this;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\"><img src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webprofiler/images/profiler/events.png"), "html", null, true);
        echo "\" alt=\"Events\" /></span>
    <strong>Events</strong>
</span>
";
    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        // line 13
        echo "    <h2>Called Listeners</h2>

    <table>
        <tr>
            <th>Event name</th>
            <th>Listener</th>
        </tr>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "calledlisteners"));
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 21
            echo "            <tr>
                <td><code>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "event"), "html", null, true);
            echo "</code></td>
                <td><code>";
            // line 23
            echo $context["__internal_21f1358311d4684142e9f780ef802ed3_1"]->getdisplay_listener($this->getContext($context, "listener"));
            echo "</code></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 26
        echo "    </table>

    ";
        // line 28
        if ($this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners")) {
            // line 29
            echo "        <h2>Not Called Listeners</h2>

        <table>
            <tr>
                <th>Event name</th>
                <th>Listener</th>
            </tr>
            ";
            // line 36
            $context["listeners"] = $this->getAttribute($this->getContext($context, "collector"), "notcalledlisteners");
            // line 37
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(twig_get_array_keys_filter($this->getContext($context, "listeners"))));
            foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
                // line 38
                echo "                <tr>
                    <td><code>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"), "event"), "html", null, true);
                echo "</code></td>
                    <td><code>";
                // line 40
                echo $context["__internal_21f1358311d4684142e9f780ef802ed3_1"]->getdisplay_listener($this->getAttribute($this->getContext($context, "listeners"), $this->getContext($context, "listener"), array(), "array"));
                echo "</code></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 43
            echo "        </table>
    ";
        }
    }

    // line 47
    public function getdisplay_listener($listener = null)
    {
        $context = $this->env->mergeGlobals(array(
            "listener" => $listener,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 48
            echo "    ";
            if (($this->getAttribute($this->getContext($context, "listener"), "type") == "Closure")) {
                // line 49
                echo "        Closure
    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Function")) {
                // line 51
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 52
                echo "        ";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "function"), "html", null, true);
                }
                // line 53
                echo "    ";
            } elseif (($this->getAttribute($this->getContext($context, "listener"), "type") == "Method")) {
                // line 54
                echo "        ";
                $context["link"] = $this->env->getExtension('code')->getFileLink($this->getAttribute($this->getContext($context, "listener"), "file"), $this->getAttribute($this->getContext($context, "listener"), "line"));
                // line 55
                echo "        ";
                echo $this->env->getExtension('code')->abbrClass($this->getAttribute($this->getContext($context, "listener"), "class"));
                echo "::";
                if ($this->getContext($context, "link")) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "link"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                    echo "</a>";
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "listener"), "method"), "html", null, true);
                }
                // line 56
                echo "    ";
            }
        } catch(Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ob_get_clean();
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:events.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 56,  157 => 55,  154 => 54,  151 => 53,  140 => 52,  130 => 48,  119 => 47,  100 => 39,  56 => 14,  68 => 22,  36 => 8,  76 => 39,  106 => 41,  83 => 24,  101 => 26,  98 => 25,  66 => 23,  45 => 9,  136 => 103,  105 => 27,  112 => 58,  110 => 42,  85 => 33,  65 => 28,  61 => 28,  21 => 3,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 69,  127 => 46,  123 => 44,  109 => 28,  93 => 31,  90 => 36,  54 => 13,  133 => 49,  124 => 41,  111 => 37,  80 => 26,  60 => 16,  52 => 12,  26 => 3,  72 => 17,  64 => 21,  53 => 23,  42 => 10,  34 => 11,  97 => 38,  95 => 24,  88 => 32,  78 => 25,  71 => 37,  25 => 5,  40 => 8,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 55,  142 => 54,  137 => 51,  126 => 46,  120 => 63,  117 => 44,  103 => 36,  74 => 38,  47 => 17,  32 => 6,  22 => 3,  23 => 3,  17 => 1,  92 => 37,  86 => 28,  79 => 28,  29 => 5,  24 => 3,  19 => 2,  69 => 21,  63 => 28,  58 => 26,  49 => 11,  43 => 12,  37 => 8,  20 => 2,  139 => 26,  131 => 48,  128 => 68,  125 => 42,  121 => 40,  115 => 45,  107 => 36,  99 => 34,  96 => 34,  91 => 33,  82 => 28,  77 => 25,  75 => 26,  57 => 27,  50 => 18,  46 => 13,  44 => 14,  39 => 12,  33 => 7,  30 => 7,  27 => 3,  135 => 50,  129 => 53,  122 => 48,  116 => 42,  113 => 43,  108 => 40,  104 => 40,  102 => 51,  94 => 33,  89 => 34,  87 => 32,  84 => 29,  81 => 29,  73 => 23,  70 => 26,  67 => 31,  62 => 22,  59 => 21,  55 => 20,  51 => 18,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
