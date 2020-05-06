<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* permission_mask.html */
class __TwigTemplate_241d7a077470c3684adf3418136d5495d2ab3a69e60af16730ec13286542e554 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "
<script>
// <![CDATA[
\tvar active_pmask = '0';
\tvar active_fmask = '0';
\tvar active_cat = '0';

\tvar id = '000';

\tvar role_options = new Array();

\tvar no_role_assigned = \"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['phpbb\template\twig\extension']->lang("NO_ROLE_ASSIGNED"), "js");
        echo "\";

\t";
        // line 14
        if (($context["S_ROLE_JS_ARRAY"] ?? null)) {
            // line 15
            echo "\t\t";
            echo ($context["S_ROLE_JS_ARRAY"] ?? null);
            echo "
\t";
        }
        // line 17
        echo "// ]]>
</script>
<script src=\"style/permissions.js\"></script>

";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "p_mask", [], "any", false, false, false, 21));
        foreach ($context['_seq'] as $context["_key"] => $context["p_mask"]) {
            // line 22
            echo "<div class=\"clearfix\"></div>
<h3>";
            // line 23
            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "NAME", [], "any", false, false, false, 23);
            if (twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_LOCAL", [], "any", false, false, false, 23)) {
                echo " <span class=\"small\"> [";
                echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "L_ACL_TYPE", [], "any", false, false, false, 23);
                echo "]</span>";
            }
            echo "</h3>

";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["p_mask"], "f_mask", [], "any", false, false, false, 25));
            foreach ($context['_seq'] as $context["_key"] => $context["f_mask"]) {
                // line 26
                echo "<div class=\"clearfix\"></div>
<fieldset class=\"permissions\" id=\"perm";
                // line 27
                echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 27);
                echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 27);
                echo "\">
\t<legend id=\"legend";
                // line 28
                echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 28);
                echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 28);
                echo "\">
\t\t";
                // line 29
                if ( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 29)) {
                    // line 30
                    echo "\t\t\t<input type=\"checkbox\" style=\"display: none;\" class=\"permissions-checkbox\" name=\"inherit[";
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "UG_ID", [], "any", false, false, false, 30);
                    echo "][";
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "FORUM_ID", [], "any", false, false, false, 30);
                    echo "]\" id=\"checkbox";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 30);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 30);
                    echo "\" value=\"1\" onclick=\"toggle_opacity('";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 30);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 30);
                    echo "')\" /> 
\t\t";
                } else {
                    // line 32
                    echo "\t\t";
                }
                // line 33
                echo "\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["f_mask"], "PADDING", [], "any", false, false, false, 33)) {
                    echo "<span class=\"padding\">";
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "PADDING", [], "any", false, false, false, 33);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "PADDING", [], "any", false, false, false, 33);
                    echo "</span>";
                }
                echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "NAME", [], "any", false, false, false, 33);
                echo "
\t</legend>
\t";
                // line 35
                if ( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 35)) {
                    // line 36
                    echo "\t\t<div class=\"permissions-switch\">
\t\t\t<div class=\"permissions-reset\">
\t\t\t\t<a href=\"#\" onclick=\"mark_options('perm";
                    // line 38
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "', 'y'); reset_role('role";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); init_colours('";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); return false;\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ALL_YES");
                    echo "</a> &middot; <a href=\"#\" onclick=\"mark_options('perm";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "', 'u'); reset_role('role";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); init_colours('";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); return false;\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ALL_NO");
                    echo "</a> &middot; <a href=\"#\" onclick=\"mark_options('perm";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "', 'n'); reset_role('role";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); init_colours('";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 38);
                    echo "'); return false;\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ALL_NEVER");
                    echo "</a>
\t\t\t</div>
\t\t\t<a href=\"#\" onclick=\"swap_options('";
                    // line 40
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 40);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 40);
                    echo "', '0', true); return false;\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ADVANCED_PERMISSIONS");
                    echo "</a>";
                    if (( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 40) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_CUSTOM", [], "any", false, false, false, 40))) {
                        echo " *";
                    }
                    // line 41
                    echo "\t\t</div>
\t\t<dl class=\"permissions-simple\">
\t\t\t<dt style=\"width: 20%\"><label for=\"role";
                    // line 43
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 43);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 43);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ROLE");
                    echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                    echo "</label></dt>
\t\t\t";
                    // line 44
                    if (twig_get_attribute($this->env, $this->source, $context["f_mask"], "role_options", [], "any", false, false, false, 44)) {
                        // line 45
                        echo "\t\t\t\t<dd style=\"margin-";
                        echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " 20%\">
\t\t\t\t\t<div class=\"dropdown-container dropdown-";
                        // line 46
                        echo ($context["S_CONTENT_FLOW_END"] ?? null);
                        echo " dropdown-button-control roles-options\" data-alt-text=\"";
                        echo twig_escape_filter($this->env, $this->extensions['phpbb\template\twig\extension']->lang("ROLE_DESCRIPTION"), "js");
                        echo "\">
\t\t\t\t\t\t<select id=\"role";
                        // line 47
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 47);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 47);
                        echo "\" name=\"role[";
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "UG_ID", [], "any", false, false, false, 47);
                        echo "][";
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "FORUM_ID", [], "any", false, false, false, 47);
                        echo "]\">";
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROLE_OPTIONS", [], "any", false, false, false, 47);
                        echo "</select>
\t\t\t\t\t\t<span title=\"Roles\" class=\"button icon-button tools-icon dropdown-trigger dropdown-select\">";
                        // line 48
                        echo $this->extensions['phpbb\template\twig\extension']->lang("NO_ROLE_ASSIGNED");
                        echo "</span>
\t\t\t\t\t\t<div class=\"dropdown hidden\">
\t\t\t\t\t\t\t<ul class=\"dropdown-contents\" id=\"role";
                        // line 50
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 50);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 50);
                        echo "\" >
\t\t\t\t\t\t\t\t";
                        // line 51
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["f_mask"], "role_options", [], "any", false, false, false, 51));
                        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                            // line 52
                            echo "\t\t\t\t\t\t\t\t\t<li data-id=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["role"], "ID", [], "any", false, false, false, 52);
                            echo "\" data-target-id=\"advanced";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 52);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 52);
                            echo "\" data-title=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["role"], "TITLE", [], "any", false, false, false, 52);
                            echo "\"";
                            if ((twig_get_attribute($this->env, $this->source, $context["role"], "SELECTED", [], "any", false, false, false, 52) == true)) {
                                echo " data-selected=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["role"], "SELECTED", [], "any", false, false, false, 52);
                                echo "\"";
                            }
                            echo ">";
                            echo twig_get_attribute($this->env, $this->source, $context["role"], "ROLE_NAME", [], "any", false, false, false, 52);
                            echo "</li>
\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 54
                        echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" data-name=\"role[";
                        // line 56
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "UG_ID", [], "any", false, false, false, 56);
                        echo "][";
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "FORUM_ID", [], "any", false, false, false, 56);
                        echo "]\"";
                        if (twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROLE_ID", [], "any", false, false, false, 56)) {
                            echo "value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROLE_ID", [], "any", false, false, false, 56);
                            echo "\"";
                        }
                        echo " />
\t\t\t\t\t</div>
\t\t\t\t</dd>
\t\t\t";
                    } else {
                        // line 60
                        echo "\t\t\t\t<dd>";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("NO_ROLE_AVAILABLE");
                        echo "</dd>
\t\t\t";
                    }
                    // line 62
                    echo "\t\t</dl>
\t";
                }
                // line 64
                echo "
\t";
                // line 65
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["f_mask"], "category", [], "any", false, false, false, 65));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 66
                    echo "\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 66)) {
                        // line 67
                        echo "\t\t\t";
                        if ( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 67)) {
                            // line 68
                            echo "\t\t\t\t<div class=\"permissions-advanced\" id=\"advanced";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 68);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 68);
                            echo "\" style=\"display: none;\">
\t\t\t";
                        } else {
                            // line 70
                            echo "\t\t\t\t<div class=\"permissions-advanced\" id=\"advanced";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 70);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 70);
                            echo "\">
\t\t\t";
                        }
                        // line 72
                        echo "
\t\t\t<div class=\"permissions-category\">
\t\t\t\t<ul>
\t\t";
                    }
                    // line 76
                    echo " \t\t
\t\t";
                    // line 77
                    if (twig_get_attribute($this->env, $this->source, $context["category"], "S_YES", [], "any", false, false, false, 77)) {
                        // line 78
                        echo "\t\t\t<li class=\"permissions-preset-yes";
                        if (((twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_FIRST_ROW", [], "any", false, false, false, 78) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_FIRST_ROW", [], "any", false, false, false, 78)) && twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 78))) {
                            echo " activetab";
                        }
                        echo "\" id=\"tab";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 78);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 78);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 78);
                        echo "\">
\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 79
$context["category"], "S_NEVER", [], "any", false, false, false, 79)) {
                        // line 80
                        echo "\t\t\t<li class=\"permissions-preset-never";
                        if (((twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_FIRST_ROW", [], "any", false, false, false, 80) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_FIRST_ROW", [], "any", false, false, false, 80)) && twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 80))) {
                            echo " activetab";
                        }
                        echo "\" id=\"tab";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 80);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 80);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 80);
                        echo "\">
\t\t";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 81
$context["category"], "S_NO", [], "any", false, false, false, 81)) {
                        // line 82
                        echo "\t\t\t<li class=\"permissions-preset-no";
                        if (((twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_FIRST_ROW", [], "any", false, false, false, 82) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_FIRST_ROW", [], "any", false, false, false, 82)) && twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 82))) {
                            echo " activetab";
                        }
                        echo "\" id=\"tab";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 82);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 82);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 82);
                        echo "\">
\t\t";
                    } else {
                        // line 84
                        echo "\t\t\t<li class=\"permissions-preset-custom";
                        if (((twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_FIRST_ROW", [], "any", false, false, false, 84) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_FIRST_ROW", [], "any", false, false, false, 84)) && twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 84))) {
                            echo " activetab";
                        }
                        echo "\" id=\"tab";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 84);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 84);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 84);
                        echo "\">
\t\t";
                    }
                    // line 86
                    echo "\t\t<a href=\"#\" onclick=\"swap_options('";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 86);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 86);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 86);
                    echo "', false";
                    if (twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 86)) {
                        echo ", true";
                    }
                    echo "); return false;\"><span class=\"tabbg\"><span class=\"colour\"></span>";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "CAT_NAME", [], "any", false, false, false, 86);
                    echo "</span></a></li>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 88
                echo "\t\t\t\t</ul>
\t\t\t</div>

\t";
                // line 91
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["f_mask"], "category", [], "any", false, false, false, 91));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 92
                    echo "\t\t<div class=\"permissions-panel\" id=\"options";
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 92);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 92);
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 92);
                    echo "\" ";
                    if (((twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_FIRST_ROW", [], "any", false, false, false, 92) && twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_FIRST_ROW", [], "any", false, false, false, 92)) && twig_get_attribute($this->env, $this->source, $context["category"], "S_FIRST_ROW", [], "any", false, false, false, 92))) {
                    } else {
                        echo " style=\"display: none;\"";
                    }
                    echo ">
\t\t\t<div class=\"tablewrap\">
\t\t\t\t<table id=\"table";
                    // line 94
                    echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 94);
                    echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 94);
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 94);
                    echo "\" class=\"table1 not-responsive\">
\t\t\t\t<colgroup>
\t\t\t\t\t<col class=\"permissions-name\" />
\t\t\t\t\t<col class=\"permissions-yes\" />
\t\t\t\t\t<col class=\"permissions-no\" />
\t\t\t\t\t";
                    // line 99
                    if ( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 99)) {
                        // line 100
                        echo "\t\t\t\t\t\t<col class=\"permissions-never\" />
\t\t\t\t\t";
                    }
                    // line 102
                    echo "\t\t\t\t</colgroup>
\t\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"name\" scope=\"col\"><strong>";
                    // line 105
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_SETTING");
                    echo "</strong></th>
\t\t\t\t";
                    // line 106
                    if (twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 106)) {
                        // line 107
                        echo "\t\t\t\t\t<th class=\"value\" scope=\"col\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_YES");
                        echo "</th>
\t\t\t\t\t<th class=\"value\" scope=\"col\">";
                        // line 108
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_NEVER");
                        echo "</th>
\t\t\t\t";
                    } else {
                        // line 110
                        echo "\t\t\t\t\t<th class=\"value permissions-yes\" scope=\"col\"><a href=\"#\" onclick=\"mark_options('options";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo "', 'y'); reset_role('role";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo "'); set_colours('";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 110);
                        echo "', false, 'yes'); return false;\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_YES");
                        echo "</a></th>
\t\t\t\t\t<th class=\"value permissions-no\" scope=\"col\"><a href=\"#\" onclick=\"mark_options('options";
                        // line 111
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo "', 'u'); reset_role('role";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo "'); set_colours('";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 111);
                        echo "', false, 'no'); return false;\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_NO");
                        echo "</a></th>
\t\t\t\t\t<th class=\"value permissions-never\" scope=\"col\"><a href=\"#\" onclick=\"mark_options('options";
                        // line 112
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo "', 'n'); reset_role('role";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo "'); set_colours('";
                        echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 112);
                        echo "', false, 'never'); return false;\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("ACL_NEVER");
                        echo "</a></th>
\t\t\t\t";
                    }
                    // line 114
                    echo "\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t";
                    // line 117
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "mask", [], "any", false, false, false, 117));
                    foreach ($context['_seq'] as $context["_key"] => $context["mask"]) {
                        // line 118
                        echo "\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["mask"], "S_ROW_COUNT", [], "any", false, false, false, 118) % 2 == 0)) {
                            echo "<tr class=\"row4\">";
                        } else {
                            echo "<tr class=\"row3\">";
                        }
                        // line 119
                        echo "\t\t\t\t\t<th class=\"permissions-name";
                        if ((twig_get_attribute($this->env, $this->source, $context["mask"], "S_ROW_COUNT", [], "any", false, false, false, 119) % 2 == 0)) {
                            echo " row4";
                        } else {
                            echo " row3";
                        }
                        echo "\">";
                        if (twig_get_attribute($this->env, $this->source, $context["mask"], "U_TRACE", [], "any", false, false, false, 119)) {
                            echo "<a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "U_TRACE", [], "any", false, false, false, 119);
                            echo "\" class=\"trace\" onclick=\"popup(this.href, 750, 515, '_trace'); return false;\" title=\"";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("TRACE_SETTING");
                            echo "\"><img src=\"images/icon_trace.gif\" alt=\"";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("TRACE_SETTING");
                            echo "\" /></a> ";
                        }
                        echo twig_get_attribute($this->env, $this->source, $context["mask"], "PERMISSION", [], "any", false, false, false, 119);
                        echo "</th>
\t\t\t\t\t";
                        // line 120
                        if (twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 120)) {
                            // line 121
                            echo "\t\t\t\t\t\t<td";
                            if (twig_get_attribute($this->env, $this->source, $context["mask"], "S_YES", [], "any", false, false, false, 121)) {
                                echo " class=\"yes\"";
                            }
                            echo ">&nbsp;</td>
\t\t\t\t\t\t<td";
                            // line 122
                            if (twig_get_attribute($this->env, $this->source, $context["mask"], "S_NEVER", [], "any", false, false, false, 122)) {
                                echo " class=\"never\"";
                            }
                            echo "></td>
\t\t\t\t\t";
                        } else {
                            // line 124
                            echo "\t\t\t\t\t\t<td class=\"permissions-yes\"><label for=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 124);
                            echo "_y\"><input onclick=\"reset_role('role";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 124);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 124);
                            echo "'); set_colours('";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 124);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 124);
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 124);
                            echo "', false)\" id=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 124);
                            echo "_y\" name=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 124);
                            echo "\" class=\"radio\" type=\"radio\"";
                            if (twig_get_attribute($this->env, $this->source, $context["mask"], "S_YES", [], "any", false, false, false, 124)) {
                                echo " checked=\"checked\"";
                            }
                            echo " value=\"1\" /></label></td>
\t\t\t\t\t\t<td class=\"permissions-no\"><label for=\"";
                            // line 125
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 125);
                            echo "_u\"><input onclick=\"reset_role('role";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 125);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 125);
                            echo "'); set_colours('";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 125);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 125);
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 125);
                            echo "', false)\" id=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 125);
                            echo "_u\" name=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 125);
                            echo "\" class=\"radio\" type=\"radio\"";
                            if (twig_get_attribute($this->env, $this->source, $context["mask"], "S_NO", [], "any", false, false, false, 125)) {
                                echo " checked=\"checked\"";
                            }
                            echo " value=\"-1\" /></label></td>
\t\t\t\t\t\t<td class=\"permissions-never\"><label for=\"";
                            // line 126
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 126);
                            echo "_n\"><input onclick=\"reset_role('role";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 126);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 126);
                            echo "'); set_colours('";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 126);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 126);
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "S_ROW_COUNT", [], "any", false, false, false, 126);
                            echo "', false)\" id=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 126);
                            echo "_n\" name=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["mask"], "S_FIELD_NAME", [], "any", false, false, false, 126);
                            echo "\" class=\"radio\" type=\"radio\"";
                            if (twig_get_attribute($this->env, $this->source, $context["mask"], "S_NEVER", [], "any", false, false, false, 126)) {
                                echo " checked=\"checked\"";
                            }
                            echo " value=\"0\" /></label></td>
\t\t\t\t\t";
                        }
                        // line 128
                        echo "\t\t\t\t</tr>
\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mask'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 130
                    echo "\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t\t
\t\t\t";
                    // line 134
                    if ( !twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_VIEW", [], "any", false, false, false, 134)) {
                        // line 135
                        echo "\t\t\t<fieldset class=\"quick\" style=\"margin-";
                        echo ($context["S_CONTENT_FLOW_END"] ?? null);
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " 11px;\">
\t\t\t\t<p class=\"small\">";
                        // line 136
                        echo $this->extensions['phpbb\template\twig\extension']->lang("APPLY_PERMISSIONS_EXPLAIN");
                        echo "</p>
\t\t\t\t<input class=\"button1\" type=\"submit\" name=\"psubmit[";
                        // line 137
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "UG_ID", [], "any", false, false, false, 137);
                        echo "][";
                        echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "FORUM_ID", [], "any", false, false, false, 137);
                        echo "]\" value=\"";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("APPLY_PERMISSIONS");
                        echo "\" />
\t\t\t\t";
                        // line 138
                        if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["p_mask"], "f_mask", [], "any", false, false, false, 138)) > 1) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "p_mask", [], "any", false, false, false, 138)) > 1))) {
                            // line 139
                            echo "\t\t\t\t\t<p class=\"small\"><a href=\"#\" onclick=\"reset_opacity(0, '";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 139);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 139);
                            echo "'); return false;\">";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
                            echo "</a> &bull; <a href=\"#\" onclick=\"reset_opacity(1, '";
                            echo twig_get_attribute($this->env, $this->source, $context["p_mask"], "S_ROW_COUNT", [], "any", false, false, false, 139);
                            echo twig_get_attribute($this->env, $this->source, $context["f_mask"], "S_ROW_COUNT", [], "any", false, false, false, 139);
                            echo "'); return false;\">";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
                            echo "</a></p>
\t\t\t\t";
                        }
                        // line 141
                        echo "\t\t\t</fieldset>
\t\t
\t\t\t";
                    }
                    // line 144
                    echo "
\t\t</div>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 147
                echo "\t\t\t<div class=\"clearfix\"></div>
\t</div>
</fieldset>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f_mask'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 151
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p_mask'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "permission_mask.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  683 => 151,  674 => 147,  666 => 144,  661 => 141,  647 => 139,  645 => 138,  637 => 137,  633 => 136,  627 => 135,  625 => 134,  619 => 130,  612 => 128,  592 => 126,  573 => 125,  553 => 124,  546 => 122,  539 => 121,  537 => 120,  517 => 119,  510 => 118,  506 => 117,  501 => 114,  485 => 112,  470 => 111,  454 => 110,  449 => 108,  444 => 107,  442 => 106,  438 => 105,  433 => 102,  429 => 100,  427 => 99,  417 => 94,  404 => 92,  400 => 91,  395 => 88,  376 => 86,  364 => 84,  352 => 82,  350 => 81,  339 => 80,  337 => 79,  326 => 78,  324 => 77,  321 => 76,  315 => 72,  308 => 70,  301 => 68,  298 => 67,  295 => 66,  291 => 65,  288 => 64,  284 => 62,  278 => 60,  263 => 56,  259 => 54,  237 => 52,  233 => 51,  228 => 50,  223 => 48,  212 => 47,  206 => 46,  200 => 45,  198 => 44,  190 => 43,  186 => 41,  176 => 40,  140 => 38,  136 => 36,  134 => 35,  122 => 33,  119 => 32,  105 => 30,  103 => 29,  98 => 28,  93 => 27,  90 => 26,  86 => 25,  76 => 23,  73 => 22,  69 => 21,  63 => 17,  57 => 15,  55 => 14,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "permission_mask.html", "");
    }
}
