<?php

/* FrontFrontBundle:Account:Keyword/keyword_stats_competitor.html.twig */
class __TwigTemplate_654a921754ef1eac389258f4bc051e5f extends Twig_Template
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
        echo "&show_chart=1&all_search_engines=1\">See chart for this page</a>
    <div class=\"sep\"></div>
    <table class=\"table_no_hover\">
        <tr>
            <th>Track date <a href=\"javascript:;\" class=\"popup_hover_simple\" data-original-title=\"Track date\" data-content=\"The date and time when the keyword was tracked.\"><i class=\"icon-question-sign\"></i></a></th>
            <th>Competitor</th>
            <th>Google <a href=\"javascript:;\" class=\"popup_hover_simple\" data-original-title=\"Position in search engines\" data-content=\"Shows the position in a search engine and the fluctuations from last time.\"><i class=\"icon-question-sign\"></i></a></th>
            <th>Bing</th>
            <th>Yahoo</th>
            <th>Google link</th>
            <th>Bing link</th>
            <th>Yahoo link</th>
            <th>Other changes</th>
            <th>Options</th>
        </tr>
        ";
        // line 22
        $context["i"] = 0;
        // line 23
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "keyword_stats"));
        foreach ($context['_seq'] as $context["date"] => $context["item"]) {
            // line 24
            echo "            <tr class=\"data_tr\">
                <td rowspan=\"";
            // line 25
            echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getContext($context, "item")) + 1), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getContext($context, "date"), "html", null, true);
            echo "</td>
                ";
            // line 26
            $context["additional_td"] = "show";
            // line 27
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "item"));
            foreach ($context['_seq'] as $context["_key"] => $context["stats"]) {
                // line 28
                echo "                        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "competitor_name"), "html", null, true);
                echo "</td>
                        <td ";
                // line 29
                if ($this->getAttribute($this->getContext($context, "stats"), "google_change")) {
                    echo "style=\"background-color:";
                    if (($this->getAttribute($this->getContext($context, "stats"), "google_change") > 0)) {
                        echo "#96FF47";
                    } else {
                        echo "#FFA5A5";
                    }
                    echo "\"";
                }
                echo " parent_class=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_google_change\" rel=\"keyword_hover\">
                            ";
                // line 30
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 31
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "google_position")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "google_position"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 32
                    echo "                                ";
                    if (($this->getAttribute($this->getContext($context, "stats"), "google_change") != 0)) {
                        // line 33
                        echo "                                    /
                                    ";
                        // line 34
                        if (($this->getAttribute($this->getContext($context, "stats"), "google_change") > 0)) {
                            echo "+";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "google_change"), "html", null, true);
                        } else {
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "google_change"), "html", null, true);
                        }
                        // line 35
                        echo "                                ";
                    }
                    // line 36
                    echo "                            ";
                } else {
                    // line 37
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 39
                echo "                        </td>
                        <td ";
                // line 40
                if (($this->getAttribute($this->getContext($context, "stats"), "bing_change") != 0)) {
                    echo "style=\"background-color:";
                    if (($this->getAttribute($this->getContext($context, "stats"), "bing_change") > 0)) {
                        echo "#96FF47";
                    } else {
                        echo "#FFA5A5";
                    }
                    echo "\"";
                }
                echo " parent_class=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_bing_change\" rel=\"keyword_hover\">
                            ";
                // line 41
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 42
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "bing_position")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "bing_position"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 43
                    echo "                                ";
                    if (($this->getAttribute($this->getContext($context, "stats"), "bing_change") != 0)) {
                        // line 44
                        echo "                                    /
                                    ";
                        // line 45
                        if (($this->getAttribute($this->getContext($context, "stats"), "bing_change") > 0)) {
                            echo "+";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "bing_change"), "html", null, true);
                        } elseif (($this->getAttribute($this->getContext($context, "stats"), "bing_change") < 0)) {
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "bing_change"), "html", null, true);
                        }
                        // line 46
                        echo "                                ";
                    }
                    // line 47
                    echo "                            ";
                } else {
                    // line 48
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 50
                echo "                        </td>
                        <td ";
                // line 51
                if (($this->getAttribute($this->getContext($context, "stats"), "yahoo_change") != 0)) {
                    echo "style=\"background-color:";
                    if (($this->getAttribute($this->getContext($context, "stats"), "yahoo_change") > 0)) {
                        echo "#96FF47";
                    } else {
                        echo "#FFA5A5";
                    }
                    echo "\"";
                }
                echo " parent_class=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_yahoo_change\" rel=\"keyword_hover\">
                            ";
                // line 52
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 53
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "yahoo_position")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "yahoo_position"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 54
                    echo "                                ";
                    if (($this->getAttribute($this->getContext($context, "stats"), "yahoo_change") != 0)) {
                        // line 55
                        echo "                                    /
                                    ";
                        // line 56
                        if (($this->getAttribute($this->getContext($context, "stats"), "yahoo_change") > 0)) {
                            echo "+";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "yahoo_change"), "html", null, true);
                        } elseif (($this->getAttribute($this->getContext($context, "stats"), "yahoo_change") < 0)) {
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "yahoo_change"), "html", null, true);
                        }
                        // line 57
                        echo "                                ";
                    }
                    // line 58
                    echo "                            ";
                } else {
                    // line 59
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 61
                echo "                        </td>
                        <td class=\"font_seo_links\" parent_class=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_page_link_google\" rel=\"keyword_hover\">
                            ";
                // line 63
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 64
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "page_link_google")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "page_link_google"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 65
                    echo "                            ";
                } else {
                    // line 66
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 68
                echo "                        </td>
                        <td class=\"font_seo_links\" parent_class=\"";
                // line 69
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_page_link_bing\" rel=\"keyword_hover\">
                            ";
                // line 70
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 71
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "page_link_bing")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "page_link_bing"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 72
                    echo "                            ";
                } else {
                    // line 73
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 75
                echo "                        </td>
                        <td class=\"font_seo_links\" parent_class=\"";
                // line 76
                echo twig_escape_filter($this->env, $this->env->getExtension('twig_functions')->clear_class($this->getAttribute($this->getContext($context, "stats"), "competitor_name")), "html", null, true);
                echo "_page_link_yahoo\" rel=\"keyword_hover\">
                            ";
                // line 77
                if (($this->getAttribute($this->getContext($context, "stats"), "project_added") <= $this->getContext($context, "date"))) {
                    // line 78
                    echo "                                ";
                    if ($this->getAttribute($this->getContext($context, "stats"), "page_link_yahoo")) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "page_link_yahoo"), "html", null, true);
                    } else {
                        echo "-";
                    }
                    // line 79
                    echo "                            ";
                } else {
                    // line 80
                    echo "                                <center><a href=\"javascript:;\" class=\"site_not_tracker\"><i class=\"icon-exclamation-sign\"></i></a></center>
                            ";
                }
                // line 82
                echo "                        </td>
                        <td>
                            ";
                // line 84
                if ((($this->getAttribute($this->getContext($context, "stats"), "google_description_change") || $this->getAttribute($this->getContext($context, "stats"), "bing_description_change")) || $this->getAttribute($this->getContext($context, "stats"), "yahoo_description_change"))) {
                    echo "<a href=\"javascript:;\" class=\"popup_hover_simple_left\" onclick=\"getChangesModal(";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "track_id"), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "stats"), "competitor_id"), "html", null, true);
                    echo ")\" data-original-title=\"Record contains changes\" data-content=\"You have some changes on this record. Click the icon too see them.\"><i class=\"icon-asterisk\"></i></a>";
                } else {
                    echo "&nbsp;";
                }
                // line 85
                echo "                        </td>
                        ";
                // line 86
                if (($this->getContext($context, "additional_td") != "")) {
                    // line 87
                    echo "                            <td width=\"160\" style=\"padding:0\" rowspan=\"";
                    echo twig_escape_filter($this->env, (twig_length_filter($this->env, $this->getContext($context, "item")) + 1), "html", null, true);
                    echo "\">
                                <ul class=\"nav nav-pills\" style=\"margin:0 auto;width:78px;\">
                                    <li class=\"dropdown\">
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                            Options
                                            <b class=\"caret\"></b>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"javascript:;\" onclick=\"notes('";
                    // line 95
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "keyword_id"), "method"), "html", null, true);
                    echo "', '";
                    echo twig_escape_filter($this->env, $this->getContext($context, "date"), "html", null, true);
                    echo "')\"><i class=\"icon-list-alt\"></i>&nbsp;Record notes</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                            ";
                    // line 100
                    $context["additional_td"] = "";
                    // line 101
                    echo "                        ";
                }
                // line 102
                echo "                    </tr>
                    <tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stats'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 105
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['date'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 106
        echo "    </table>
    ";
        // line 107
        $this->env->loadTemplate("FrontFrontBundle:Account:Keyword/keyword_stats_pagination.html.twig")->display($context);
        // line 108
        echo "    <script>
        jQuery(document).ready(function(){
            jQuery('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
            jQuery('td[rel=keyword_hover]').hover(function(){
                jQuery('td[rel=keyword_hover]').removeClass('keyword_td_hover');
                var class_name = jQuery(this).attr('parent_class');
                jQuery('td[parent_class='+class_name+']').addClass('keyword_td_hover');
            })
        });
    </script>
";
    }

    // line 119
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 120
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"../css/jquery-ui-1.8.22.custom.css\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 123
    public function block_javascripts($context, array $blocks = array())
    {
        // line 124
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-modal.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.22.custom.min_datepicker.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-dropdown.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 128
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/keyword_stats.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 130
    public function block_inline_javascripts($context, array $blocks = array())
    {
        // line 131
        echo "    <script>
        ";
        // line 132
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "competitor_ids"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 133
            echo "            addCompetitor(";
            echo twig_escape_filter($this->env, $this->getContext($context, "item"), "html", null, true);
            echo ");
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 135
        echo "        jQuery(document).ready(function() {
            jQuery('.site_not_tracker').attr('data-original-title', 'No data');
            jQuery('.site_not_tracker').attr('data-content', 'This competitor was added after this date. So we have no track data for this date.');
            jQuery('.site_not_tracker').popover({
                trigger: 'hover'
            });
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Keyword/keyword_stats_competitor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  438 => 135,  429 => 133,  425 => 132,  422 => 131,  419 => 130,  413 => 128,  409 => 127,  405 => 126,  401 => 125,  396 => 124,  393 => 123,  385 => 120,  382 => 119,  368 => 108,  366 => 107,  363 => 106,  357 => 105,  349 => 102,  346 => 101,  344 => 100,  334 => 95,  322 => 87,  320 => 86,  317 => 85,  307 => 84,  303 => 82,  299 => 80,  296 => 79,  289 => 78,  287 => 77,  283 => 76,  280 => 75,  276 => 73,  273 => 72,  266 => 71,  264 => 70,  260 => 69,  257 => 68,  253 => 66,  250 => 65,  243 => 64,  241 => 63,  237 => 62,  234 => 61,  230 => 59,  227 => 58,  224 => 57,  217 => 56,  214 => 55,  211 => 54,  204 => 53,  202 => 52,  188 => 51,  185 => 50,  181 => 48,  178 => 47,  175 => 46,  168 => 45,  165 => 44,  162 => 43,  155 => 42,  153 => 41,  139 => 40,  136 => 39,  132 => 37,  129 => 36,  126 => 35,  119 => 34,  116 => 33,  113 => 32,  106 => 31,  104 => 30,  90 => 29,  85 => 28,  80 => 27,  78 => 26,  72 => 25,  69 => 24,  64 => 23,  62 => 22,  43 => 7,  40 => 6,  37 => 5,  35 => 4,  32 => 3,  29 => 2,);
    }
}
