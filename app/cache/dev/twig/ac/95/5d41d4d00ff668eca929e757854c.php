<?php

/* FrontFrontBundle:Account:Keyword/keyword_stats.html.twig */
class __TwigTemplate_ac955d41d4d00ff668eca929e757854c extends Twig_Template
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
    ";
        // line 4
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/incl_keyword_stats_filter.html.twig")->display($context);
        // line 5
        echo "    ";
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/keyword_stats_pagination.html.twig")->display($context);
        // line 6
        echo "    <div class=\"sep\"></div>
    <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_keyword_charts"), "html", null, true);
        echo twig_escape_filter($this->env, $this->getContext($context, "chart_page"), "html", null, true);
        echo "&show_chart=1&all_search_engines=1\">See chart</a>
    <div class=\"sep\"></div>
    <table class=\"table\">
        <tr>
            <th>Track date <a href=\"javascript:;\" class=\"popup_hover_simple\" data-original-title=\"Track date\" data-content=\"The date and time when the keyword was tracked.\"><i class=\"icon-question-sign\"></i></a></th>
            <th>Google <a href=\"javascript:;\" class=\"popup_hover_simple\" data-original-title=\"Position in search engines\" data-content=\"Shows the position in a search engine and the fluctuations from last time.\"><i class=\"icon-question-sign\"></i></a></th>
            <th>Bing</th>
            <th>Yahoo</th>
            <th>Google link</th>
            <th>Bing link</th>
            <th>Yahoo link</th>
            <th>Other</th>
        </tr>
        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "keyword_stats"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 21
            echo "            <tr>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "track_date"), "html", null, true);
            echo "</td>
                <td ";
            // line 23
            if (($this->getAttribute($this->getContext($context, "item"), "google_change") != 0)) {
                echo "style=\"background-color:";
                if (($this->getAttribute($this->getContext($context, "item"), "google_change") > 0)) {
                    echo "#96FF47";
                } else {
                    echo "#FFA5A5";
                }
                echo "\"";
            }
            echo ">
                    ";
            // line 24
            if ($this->getAttribute($this->getContext($context, "item"), "google_position")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "google_position"), "html", null, true);
            } else {
                echo "-";
            }
            // line 25
            echo "                    ";
            if (($this->getAttribute($this->getContext($context, "item"), "google_change") != 0)) {
                // line 26
                echo "                        /
                        ";
                // line 27
                if (($this->getAttribute($this->getContext($context, "item"), "google_change") > 0)) {
                    echo "+";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "google_change"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "google_change"), "html", null, true);
                }
                // line 28
                echo "                    ";
            }
            // line 29
            echo "                </td>
                <td ";
            // line 30
            if (($this->getAttribute($this->getContext($context, "item"), "bing_change") != 0)) {
                echo "style=\"background-color:";
                if (($this->getAttribute($this->getContext($context, "item"), "bing_change") > 0)) {
                    echo "#96FF47";
                } else {
                    echo "#FFA5A5";
                }
                echo "\"";
            }
            echo ">
                    ";
            // line 31
            if ($this->getAttribute($this->getContext($context, "item"), "bing_position")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "bing_position"), "html", null, true);
            } else {
                echo "-";
            }
            // line 32
            echo "                    ";
            if (($this->getAttribute($this->getContext($context, "item"), "bing_change") != 0)) {
                // line 33
                echo "                        /
                        ";
                // line 34
                if (($this->getAttribute($this->getContext($context, "item"), "bing_change") > 0)) {
                    echo "+";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "bing_change"), "html", null, true);
                } elseif (($this->getAttribute($this->getContext($context, "item"), "bing_change") < 0)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "bing_change"), "html", null, true);
                }
                // line 35
                echo "                    ";
            }
            // line 36
            echo "                </td>
                <td ";
            // line 37
            if (($this->getAttribute($this->getContext($context, "item"), "yahoo_change") != 0)) {
                echo "style=\"background-color:";
                if (($this->getAttribute($this->getContext($context, "item"), "yahoo_change") > 0)) {
                    echo "#96FF47";
                } else {
                    echo "#FFA5A5";
                }
                echo "\"";
            }
            echo ">
                    ";
            // line 38
            if ($this->getAttribute($this->getContext($context, "item"), "yahoo_position")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "yahoo_position"), "html", null, true);
            } else {
                echo "-";
            }
            // line 39
            echo "                    ";
            if (($this->getAttribute($this->getContext($context, "item"), "yahoo_change") != 0)) {
                // line 40
                echo "                        /
                        ";
                // line 41
                if (($this->getAttribute($this->getContext($context, "item"), "yahoo_change") > 0)) {
                    echo "+";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "yahoo_change"), "html", null, true);
                } elseif (($this->getAttribute($this->getContext($context, "item"), "yahoo_change") < 0)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "yahoo_change"), "html", null, true);
                }
                // line 42
                echo "                    ";
            }
            // line 43
            echo "                </td>
                <td>";
            // line 44
            if ($this->getAttribute($this->getContext($context, "item"), "page_link_google")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "page_link_google"), "html", null, true);
            } else {
                echo "-";
            }
            echo "</td>
                <td>";
            // line 45
            if ($this->getAttribute($this->getContext($context, "item"), "page_link_bing")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "page_link_bing"), "html", null, true);
            } else {
                echo "-";
            }
            echo "</td>
                <td>";
            // line 46
            if ($this->getAttribute($this->getContext($context, "item"), "page_link_yahoo")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "page_link_yahoo"), "html", null, true);
            } else {
                echo "-";
            }
            echo "</td>
                <td>";
            // line 47
            if ((($this->getAttribute($this->getContext($context, "item"), "google_description_change") || $this->getAttribute($this->getContext($context, "item"), "bing_description_change")) || $this->getAttribute($this->getContext($context, "item"), "yahoo_description_change"))) {
                echo "<a href=\"javascript:;\" onclick=\"getChangesModal(";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "track_id"), "html", null, true);
                echo ", 0)\" class=\"popup_hover_simple_left\" data-original-title=\"Record contains changes\" data-content=\"You have some changes on this record. Click the icon too see them.\"><i class=\"icon-asterisk\"></i></a>";
            } else {
                echo "&nbsp;";
            }
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 50
        echo "    </table>
    ";
        // line 51
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/keyword_stats_pagination.html.twig")->display($context);
    }

    // line 53
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 54
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"../css/jquery-ui-1.8.22.custom.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 57
    public function block_javascripts($context, array $blocks = array())
    {
        // line 58
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.22.custom.min_datepicker.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/keyword_stats.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 63
    public function block_inline_javascripts($context, array $blocks = array())
    {
        // line 64
        echo "    <script>
        jQuery(document).ready(function(){
            jQuery('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
        });

        ";
        // line 69
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "competitor_ids"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 70
            echo "            addCompetitor(";
            echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
            echo ");
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 72
        echo "    </script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/keyword_stats.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 72,  275 => 70,  271 => 69,  264 => 64,  261 => 63,  255 => 61,  251 => 60,  247 => 59,  242 => 58,  239 => 57,  231 => 54,  228 => 53,  224 => 51,  221 => 50,  206 => 47,  198 => 46,  190 => 45,  182 => 44,  179 => 43,  176 => 42,  169 => 41,  166 => 40,  163 => 39,  157 => 38,  145 => 37,  142 => 36,  139 => 35,  132 => 34,  129 => 33,  126 => 32,  120 => 31,  108 => 30,  105 => 29,  102 => 28,  95 => 27,  92 => 26,  89 => 25,  83 => 24,  71 => 23,  67 => 22,  64 => 21,  60 => 20,  43 => 7,  40 => 6,  37 => 5,  35 => 4,  32 => 3,  29 => 2,);
    }
}
