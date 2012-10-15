<?php

/* FrontFrontBundle:Ajax:keyword_note.html.twig */
class __TwigTemplate_a940264a6d8858122342549c9057f652 extends Twig_Template
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
        echo "<div class=\"modal hide\" id=\"modal_box\">
    <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">×</button>
        <h3>Notes for \"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "keyword_data"), "keyword"), "html", null, true);
        echo "\" keyword</h3>
    </div>
        <div class=\"modal-body\">
            ";
        // line 7
        if (twig_length_filter($this->env, $this->getContext($context, "keyword_notes"))) {
            // line 8
            echo "                <table class=\"table table_align_left\">
                    <tr>
                        <th width=\"100\">Date</th>
                        <th>Note</th>
                        <th style=\"text-align:center !important;\">Options</th>
                    </tr>
                    ";
            // line 14
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "keyword_notes"));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 15
                echo "                        <tr>
                            <td>";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "date_of_track"), "html", null, true);
                echo "</td>
                            <td>";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "note"), "html", null, true);
                echo "</td>
                            <td>
                                <ul class=\"nav nav-pills\" style=\"margin:0 auto;width:78px;\">
                                    <li class=\"dropdown\">
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"javascript:;\">
                                            Options
                                            <b class=\"caret\"></b>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"\"><i class=\"icon-edit\"></i>&nbsp;Modify</a></li>
                                            <li><div class=\"divider\"></div></li>
                                            <li><a href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_delete_keyword_note"), "html", null, true);
                echo "?note_id=";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
                echo "\" onclick='return confirm(\"Please confirm that you want to delete this note\");'><i class=\"icon-trash\"></i>&nbsp;Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 35
            echo "                </table>
            ";
        }
        // line 37
        echo "            <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("account_modify_add_keyoword_note"), "html", null, true);
        echo "\" method=\"post\" style=\"margin:0\">
                <label for=\"note\">Note</label>
                <input type=\"text\" name=\"note\" id=\"note\">
                <div class=\"sep\"></div>
                <input type=\"hidden\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "keyword_data"), "id"), "html", null, true);
        echo "\" name=\"keyword_id\">
                <input type=\"hidden\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "get", array(0 => "for_date"), "method"), "html", null, true);
        echo "\" name=\"for_date\">
                <input type=\"hidden\" value=\"new\" name=\"todo\">
                <input type=\"submit\" class=\"btn btn-primary\" value=\"Save note\">
            </form>
        </div>
        <div class=\"modal-footer\">
            <a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
        </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('.dropdown-toggle').dropdown();
    });
</script>
<style>
        .table_align_left th, .table_align_left td {
            text-align: left !important;
        }
        .table_align_left th {
            border: medium none;
        }
</style>";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Ajax:keyword_note.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 42,  90 => 41,  82 => 37,  78 => 35,  63 => 28,  49 => 17,  45 => 16,  42 => 15,  38 => 14,  30 => 8,  28 => 7,  22 => 4,  17 => 1,);
    }
}
