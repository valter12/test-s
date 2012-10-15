<?php

/* FrontFrontBundle:Account:Report/add_modify_report.html.twig */
class __TwigTemplate_0a763574bf9c57249ba6d5b4106ace08 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::account_base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "<h1>Add report</h1>
<form method=\"post\" >
    Choose project: 
    <select name=\"project_hash\">
            ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "project_list"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "project_hash"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "hash"), "method") == $this->getAttribute($this->getContext($context, "item"), "project_hash"))) {
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
        <div class=\"sep\"></div>
        <fieldset>
            <legend>General settings</legend>
            <b>Title and Description:</b>
            <br />
            Give this report a title and description. The description is only viewable by you.
            <br />
            <label for=\"report_title\">Title</label>
            <input type=\"text\" name=\"report_title\" required=\"required\" style=\"width:400px;\" id=\"report_title\">
            <br />
            <label for=\"report_desc\">Description</label>
            <input type=\"text\" name=\"report_desc\" required=\"required\" style=\"width:400px;\" id=\"report_desc\">
            <div class=\"sep\"></div>
            <b>Timeframe:</b>
            <br />
            Which timeframe of data would you like to use?
            <br />
            <input type=\"radio\" name=\"frequency\" value=\"weekly\"> Weekly - Show changes from one week to the next.
            <br />
            <input type=\"radio\" name=\"frequency\" value=\"monthly\"> Monthly - Show changes from one month to the next (since data is collected weekly, this will be four or five weeks of data).
            <br />
            <input type=\"radio\" name=\"frequency\" value=\"quarterly\"> Quarterly - Show changes from one quarter to the next.
            <div class=\"sep\"></div>
            <b>Who should receive this report?</b>
            <br />
            <input type=\"checkbox\" name=\"send_me\"> Email me each week when a new report is complete.
            <br />
            Also send the report to the following email addresses:
            <br />
            <div>
                <input type=\"email\" name=\"recipient_emails[]\"> <a href=\"javascript:;\" onclick=\"jQuery(this).parent().remove();\">remove</a>
            </div>
            <a href=\"javascript:;\" onclick=\"addEmail(this);\"><i class=\"icon-plus-sign\"></i> Add email address</a>
        </fieldset>
        <div class=\"sep\"></div>
        <fieldset>
            <legend>Build Report</legend>
            <ul class=\"report_list sortable\" id=\"sortable\">
                <li>
                    <div class=\"report_item\">
                        <a href=\"javascript:;\" class=\"helper\" title=\"Drag to reorder\"><i class=\"icon-move right\"></i></a>
                        <i class=\"icon-play\"></i> <a href=\"javascript:;\" onclick=\"\$('#ranking_details').toggle(200);\">Rankings</a>
                        <div class=\"report_detailed\" id=\"ranking_details\">
                            <input type=\"checkbox\" onclick=\"this.checked?\$('#ranking_summary_options').show(200):\$('#ranking_summary_options').hide(200);\" name=\"ranking_summary[checked]\" value=\"1\"> <b>Ranking summary</b>
                            <br />
                            Shows total number of keywords and the number of those that rank in the top 3 and the top 10. 
                            <br />
                            Also shows number of rankings improved for specified engine(s) from the previous timeframe.
                            <br />
                            <a href=\"\">View example</a>
                            <div class=\"sep\"></div>
                            <div class=\"report_subdetails\" id=\"ranking_summary_options\">
                                <b>Options for this module:</b>
                                <br />
                                <label for=\"ranking_summary_title\">Title of section to display on report <i>(seen in the email)</i>:</label>
                                <input type=\"text\" name=\"ranking_summary[title]\" id=\"ranking_summary_title\">
                                <label for=\"ranking_summary_desc\">Description of section to display on report <i>(seen in the email)</i>:</label>
                                <textarea name=\"ranking_summary[desc]\" id=\"ranking_summary_desc\"></textarea>
                                <br />
                                <b>Search engines:</b>
                                <br />
                                <input type=\"checkbox\" name=\"ranking_summary[search_engines][]\" value=\"google\"> Google
                                <br />
                                <input type=\"checkbox\" name=\"ranking_summary[search_engines][]\" value=\"bing\"> Bing
                                <br />
                                <input type=\"checkbox\" name=\"ranking_summary[search_engines][]\" value=\"yahoo\"> Yahoo
                                <br />
                            </div>
                            <div class=\"sep\"></div>
                            <div class=\"dotted\"></div>
                            <div class=\"sep\"></div>
                            <div>
                                <input type=\"checkbox\" onclick=\"this.checked?\$('#ranking_improvements_declines_summary_options').show(200):\$('#ranking_improvements_declines_summary_options').hide(200);\" name=\"ranking_improvements_declines_summary[checked]\" value=\"1\"> <b>Ranking Improvements and Declines</b>
                                <br />
                                Shows ranking improvements and declines for the specified search engine(s).
                                <br />
                                <a href=\"\">View example</a>
                                <div class=\"sep\"></div>
                                <div class=\"report_subdetails\" id=\"ranking_improvements_declines_summary_options\">
                                    <b>Options for this module:</b>
                                    <br />
                                    <label for=\"ranking_improvements_declines_summary_title\">Title of section to display on report <i>(seen in the email)</i>:</label>
                                    <input type=\"text\" name=\"ranking_improvements_declines_summary[title]\" id=\"ranking_improvements_declines_summary_title\">
                                    <label for=\"ranking_improvements_declines_summary_desc\">Description of section to display on report <i>(seen in the email)</i>:</label>
                                    <textarea name=\"ranking_improvements_declines_summary[desc]\" id=\"ranking_improvements_declines_summary_desc\"></textarea>
                                    <br />
                                    <b>Search engines:</b>
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_declines_summary[search_engines][]\" value=\"google\"> Google
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_declines_summary[search_engines][]\" value=\"bing\"> Bing
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_declines_summary[search_engines][]\" value=\"yahoo\"> Yahoo
                                    <br />
                                </div>
                            </div>
                            <div class=\"sep\"></div>
                            <div class=\"dotted\"></div>
                            <div class=\"sep\"></div>
                            <div>
                                <input type=\"checkbox\" onclick=\"this.checked?\$('#ranking_improvements_summary_options').show(200):\$('#ranking_improvements_summary_options').hide(200);\" name=\"ranking_improvements_summary[checked]\" value=\"1\"> <b>Keyword Rankings Improved</b>
                                <br />
                                Shows ranking improvements for the specified search engine(s).
                                <br />
                                <a href=\"\">View example</a>
                                <div class=\"sep\"></div>
                                <div class=\"report_subdetails\" id=\"ranking_improvements_summary_options\">
                                    <b>Options for this module:</b>
                                    <br />
                                    <label for=\"ranking_improvements_summary_title\">Title of section to display on report <i>(seen in the email)</i>:</label>
                                    <input type=\"text\" name=\"ranking_improvements_summary[title]\" id=\"ranking_improvements_summary\">
                                    <label for=\"ranking_improvements_summary_desc\">Description of section to display on report <i>(seen in the email)</i>:</label>
                                    <textarea name=\"ranking_improvements_summary[desc]\" id=\"ranking_improvements_summary_desc\"></textarea>
                                    <br />
                                    <b>Search engines:</b>
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_summary[search_engines][]\" value=\"google\"> Google
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_summary[search_engines][]\" value=\"bing\"> Bing
                                    <br />
                                    <input type=\"checkbox\" name=\"ranking_improvements_summary[search_engines][]\" value=\"yahoo\"> Yahoo
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class=\"report_item\">
                        <a href=\"javascript:;\" class=\"helper\" title=\"Drag to reorder\"><i class=\"icon-move right\"></i></a>
                        <i class=\"icon-play\"></i> <a href=\"\">Uptime</a>
                    </div>
                </li>
            </ul>
        </fieldset>
    </form>

";
    }

    // line 149
    public function block_javascripts($context, array $blocks = array())
    {
        // line 150
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/pages/reports.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-ui-1.8.23.custom.min_sortable.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Account:Report/add_modify_report.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 152,  205 => 151,  200 => 150,  197 => 149,  55 => 10,  40 => 8,  36 => 7,  30 => 3,  27 => 2,);
    }
}
