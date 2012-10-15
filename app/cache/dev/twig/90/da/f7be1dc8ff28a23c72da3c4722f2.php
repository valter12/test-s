<?php

/* FrontFrontBundle:Account:Chart/chart.html.twig */
class __TwigTemplate_90daf7be1dc8ff28a23c72da3c4722f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::account_base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'inline_javascripts' => array($this, 'block_inline_javascripts'),
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
        echo "    <div class=\"sep\"></div>
    <form action=\"\" method=\"GET\">
        <select name=\"project\" onchange=\"getProjectKeywords(this.value);getKeywordCompetitors(this.value);\">
            <option value=\"0\">[Choose project]</option>
            ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "project"), "method") == $this->getAttribute($this->getContext($context, "item"), "project_hash"))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_name"), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 10
        echo "        </select>
        <span id=\"keywords_placeholder\"></span>
        <div class=\"sep\"></div>
        <span id=\"competitor_list_placeholder\"></span>
        <div class=\"sep\"></div>
        Period from <input type=\"text\" style=\"width:100px;\" name=\"from_date\" id=\"from_date\" class=\"datepicker\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "from_date"), "method"), "html", null, true);
        echo "\"> 
        to <input type=\"text\" style=\"width:100px;\" name=\"to_date\" id=\"to_date\" class=\"datepicker\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "to_date"), "method"), "html", null, true);
        echo "\">
        <div class=\"sep\"></div>
        <input type=\"checkbox\" name=\"search_engine[]\" ";
        // line 18
        if ((twig_in_filter("google", $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "search_engine"), "method")) || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "all_search_engines"), "method"))) {
            echo "checked=\"checked\"";
        }
        echo " value=\"google\"> Google<br />
        <input type=\"checkbox\" name=\"search_engine[]\" ";
        // line 19
        if ((twig_in_filter("bing", $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "search_engine"), "method")) || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "all_search_engines"), "method"))) {
            echo "checked=\"checked\"";
        }
        echo " value=\"bing\"> Bing<br />
        <input type=\"checkbox\" name=\"search_engine[]\" ";
        // line 20
        if ((twig_in_filter("yahoo", $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "search_engine"), "method")) || $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "all_search_engines"), "method"))) {
            echo "checked=\"checked\"";
        }
        echo " value=\"yahoo\"> Yahoo<br />
        
        <input type=\"hidden\" value=\"1\" name=\"show_chart\">
        <div class=\"sep\"></div>
        <input type=\"submit\" value=\"Apply\" class=\"btn btn-primary\">
    </form>
    <div class=\"sep\"></div>
    <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_stats"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, $this->getContext($context, "stats_link"), "html", null, true);
        echo "\">See stats for this page</a>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div id=\"container_0\" style=\"min-width: 400px; height: 400px; margin: 0 auto\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div id=\"container_1\" style=\"min-width: 400px; height: 400px; margin: 0 auto\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div id=\"container_2\" style=\"min-width: 400px; height: 400px; margin: 0 auto\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
";
    }

    // line 46
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 47
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"../css/jquery-ui-1.8.22.custom.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.22.custom.min_datepicker.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/chart.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/keyword_stats.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js_hh634h56/chart.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 58
    public function block_inline_javascripts($context, array $blocks = array())
    {
        // line 59
        echo "    <script>
        jQuery(document).ready(function(){
            jQuery('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
            ";
        // line 62
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "show_chart"), "method")) {
            // line 63
            echo "                
                ";
            // line 64
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "axes"));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 65
                echo "                    var chart_";
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo ";
                    chart_";
                // line 66
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo " = new Highcharts.Chart({
                        chart: {
                            renderTo: 'container_";
                // line 68
                echo twig_escape_filter($this->env, $this->getContext($context, "key"), "html", null, true);
                echo "',
                            type: 'spline',
                            zoomType: 'x'
                        },
                        title: {
                            text: '";
                // line 73
                echo $this->getAttribute($this->getContext($context, "item"), "x_title");
                echo "',
                            x: -20 //center
                        },
                        subtitle: {
                            text: '',
                            x: -20
                        },
                        xAxis: {
                            categories: ";
                // line 81
                echo $this->getAttribute($this->getContext($context, "item"), "xAxis");
                echo ",
                            overflow: 'undefined',
                            labels: {
                                rotation: -45,
                                aligh: 'right',
                                x: -20,
                                y: 35,
                                style: {
                                    fontSize: '11px'
                                }
                            }
                        },
                        yAxis: {
                            reversed:true,
                            title: {
                                text: '";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "y_title"), "html", null, true);
                echo "'
                            },
                            min:1,
                            max:100
                        },
                        tooltip: {
                            crosshairs: true,
                            shared: true
                        },
                        plotOptions: {
                            spline: {
                                marker: {
                                    radius: 4,
                                    lineColor: '#666666',
                                    lineWidth: 1
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 50,
                            borderWidth: 0
                        },
                        series: [
                            ";
                // line 123
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "item"), "yAxis"));
                foreach ($context['_seq'] as $context["index"] => $context["data"]) {
                    // line 124
                    echo "                                {
                                    name: '";
                    // line 125
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "name"), "html", null, true);
                    echo "',
                                    data: ";
                    // line 126
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "data"), "html", null, true);
                    echo "
                                }
                                ";
                    // line 128
                    if (($this->getContext($context, "index") != (twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "yAxis")) - 1))) {
                        echo ",";
                    }
                    // line 129
                    echo "                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['index'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 130
                echo "                        ]
                    });
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 133
            echo "            ";
        }
        // line 134
        echo "        });
        ";
        // line 135
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "project"), "method")) {
            // line 136
            echo "            getProjectKeywords('";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "project"), "method"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "keyword_id"), "method"), "html", null, true);
            echo "');
            getKeywordCompetitors('";
            // line 137
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "project"), "method"), "html", null, true);
            echo "');
            ";
            // line 138
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "competitor_ids"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 139
                echo "                addCompetitor(";
                echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
                echo ");
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 141
            echo "        ";
        }
        // line 142
        echo "    </script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Chart/chart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  326 => 142,  323 => 141,  314 => 139,  310 => 138,  306 => 137,  299 => 136,  297 => 135,  294 => 134,  291 => 133,  283 => 130,  277 => 129,  273 => 128,  268 => 126,  264 => 125,  261 => 124,  257 => 123,  227 => 96,  209 => 81,  198 => 73,  190 => 68,  185 => 66,  180 => 65,  176 => 64,  173 => 63,  171 => 62,  166 => 59,  163 => 58,  157 => 56,  153 => 55,  149 => 54,  145 => 53,  141 => 52,  136 => 51,  133 => 50,  125 => 47,  122 => 46,  97 => 27,  85 => 20,  79 => 19,  73 => 18,  68 => 16,  64 => 15,  57 => 10,  42 => 8,  38 => 7,  32 => 3,  29 => 2,);
    }
}
