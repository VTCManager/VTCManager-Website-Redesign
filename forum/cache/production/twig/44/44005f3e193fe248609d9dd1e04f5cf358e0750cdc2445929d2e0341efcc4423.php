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

/* acp_groups.html */
class __TwigTemplate_28aa1fde21687e28a64c5433486c3de7709524474bd09295d804332cecddae8b extends \Twig\Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "acp_groups.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if (($context["S_EDIT"] ?? null)) {
            // line 6
            echo "
\t<a href=\"";
            // line 7
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("BACK");
            echo "</a>

\t<h1>";
            // line 9
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_GROUPS_MANAGE");
            echo "</h1>

\t<p>";
            // line 11
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_EDIT_EXPLAIN");
            echo "</p>

\t";
            // line 13
            if (($context["S_ERROR"] ?? null)) {
                // line 14
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 15
                echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 16
                echo ($context["ERROR_MSG"] ?? null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 19
            echo "
\t<form id=\"settings\" method=\"post\" action=\"";
            // line 20
            echo ($context["U_ACTION"] ?? null);
            echo "\" enctype=\"multipart/form-data\">

\t<fieldset>
\t\t<legend>";
            // line 23
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DETAILS");
            echo "</legend>
\t<dl>
\t\t<dt><label";
            // line 25
            if ( !($context["S_SPECIAL_GROUP"] ?? null)) {
                echo " for=\"group_name\"";
            }
            echo ">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_NAME");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd>";
            // line 26
            if (($context["S_SPECIAL_GROUP"] ?? null)) {
                echo "<strong>";
                echo ($context["GROUP_NAME"] ?? null);
                echo "</strong>";
            }
            echo "<input name=\"group_name\" type=\"";
            if (($context["S_SPECIAL_GROUP"] ?? null)) {
                echo "hidden";
            } else {
                echo "text";
            }
            echo "\" id=\"group_name\" value=\"";
            echo ($context["GROUP_INTERNAL_NAME"] ?? null);
            echo "\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_desc\">";
            // line 29
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DESC");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><textarea id=\"group_desc\" name=\"group_desc\" rows=\"5\" cols=\"45\">";
            // line 30
            echo ($context["GROUP_DESC"] ?? null);
            echo "</textarea></dd>
\t\t<dd><label><input type=\"checkbox\" class=\"radio\" name=\"desc_parse_bbcode\"";
            // line 31
            if (($context["S_DESC_BBCODE_CHECKED"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PARSE_BBCODE");
            echo "</label>
\t\t\t<label><input type=\"checkbox\" class=\"radio\" name=\"desc_parse_smilies\"";
            // line 32
            if (($context["S_DESC_SMILIES_CHECKED"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PARSE_SMILIES");
            echo "</label>
\t\t\t<label><input type=\"checkbox\" class=\"radio\" name=\"desc_parse_urls\"";
            // line 33
            if (($context["S_DESC_URLS_CHECKED"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("PARSE_URLS");
            echo "</label></dd>
\t</dl>
\t";
            // line 35
            if ( !($context["S_SPECIAL_GROUP"] ?? null)) {
                // line 36
                echo "\t\t<dl>
\t\t\t<dt><label for=\"group_type\">";
                // line 37
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_TYPE");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_TYPE_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd>
\t\t\t\t";
                // line 39
                // line 40
                echo "\t\t\t\t<label><input name=\"group_type\" type=\"radio\" class=\"radio\" id=\"group_type\" value=\"";
                echo ($context["GROUP_TYPE_FREE"] ?? null);
                echo "\"";
                echo ($context["GROUP_FREE"] ?? null);
                echo " /> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_OPEN");
                echo "</label>
\t\t\t\t<label><input name=\"group_type\" type=\"radio\" class=\"radio\" value=\"";
                // line 41
                echo ($context["GROUP_TYPE_OPEN"] ?? null);
                echo "\"";
                echo ($context["GROUP_OPEN"] ?? null);
                echo " /> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_REQUEST");
                echo "</label>
\t\t\t\t<label><input name=\"group_type\" type=\"radio\" class=\"radio\" value=\"";
                // line 42
                echo ($context["GROUP_TYPE_CLOSED"] ?? null);
                echo "\"";
                echo ($context["GROUP_CLOSED"] ?? null);
                echo " /> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_CLOSED");
                echo "</label>
\t\t\t\t<label><input name=\"group_type\" type=\"radio\" class=\"radio\" value=\"";
                // line 43
                echo ($context["GROUP_TYPE_HIDDEN"] ?? null);
                echo "\"";
                echo ($context["GROUP_HIDDEN"] ?? null);
                echo " /> ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_HIDDEN");
                echo "</label>
\t\t\t\t";
                // line 44
                // line 45
                echo "\t\t\t</dd>
\t\t</dl>
\t";
            } else {
                // line 48
                echo "\t\t<input name=\"group_type\" type=\"hidden\" value=\"";
                echo ($context["GROUP_TYPE_SPECIAL"] ?? null);
                echo "\" />
\t";
            }
            // line 50
            echo "
\t";
            // line 51
            if ((($context["S_ADD_GROUP"] ?? null) && ($context["S_GROUP_PERM"] ?? null))) {
                // line 52
                echo "\t\t<dl>
\t\t\t<dt><label for=\"group_perm_from\">";
                // line 53
                echo $this->extensions['phpbb\template\twig\extension']->lang("COPY_PERMISSIONS");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("COPY_PERMISSIONS_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><select id=\"group_perm_from\" name=\"group_perm_from\"><option value=\"0\">";
                // line 54
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_PERMISSIONS");
                echo "</option>";
                echo ($context["S_GROUP_OPTIONS"] ?? null);
                echo "</select></dd>
\t\t</dl>
\t";
            }
            // line 57
            echo "\t</fieldset>

\t<fieldset>
\t\t<legend>";
            // line 60
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_OPTIONS_SAVE");
            echo "</legend>
\t";
            // line 61
            // line 62
            echo "\t";
            if (($context["S_USER_FOUNDER"] ?? null)) {
                // line 63
                echo "\t<dl>
\t\t<dt><label for=\"group_founder_manage\">";
                // line 64
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_FOUNDER_MANAGE");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_FOUNDER_MANAGE_EXPLAIN");
                echo "</span></dt>
\t\t<dd><input name=\"group_founder_manage\" type=\"checkbox\" value=\"1\" class=\"radio\" id=\"group_founder_manage\"";
                // line 65
                echo ($context["GROUP_FOUNDER_MANAGE"] ?? null);
                echo " /></dd>
\t</dl>
\t";
            }
            // line 68
            echo "\t<dl>
\t\t<dt><label for=\"group_skip_auth\">";
            // line 69
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_SKIP_AUTH");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_SKIP_AUTH_EXPLAIN");
            echo "</span></dt>
\t\t<dd><input name=\"group_skip_auth\" type=\"checkbox\" value=\"1\" class=\"radio\" id=\"group_skip_auth\"";
            // line 70
            echo ($context["GROUP_SKIP_AUTH"] ?? null);
            echo " /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_legend\">";
            // line 73
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_LEGEND");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><input name=\"group_legend\" type=\"checkbox\" value=\"1\" class=\"radio\" id=\"group_legend\"";
            // line 74
            echo ($context["GROUP_LEGEND"] ?? null);
            echo " /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_teampage\">";
            // line 77
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_TEAMPAGE");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><input name=\"group_teampage\" type=\"checkbox\" value=\"1\" class=\"radio\" id=\"group_teampage\"";
            // line 78
            echo ($context["GROUP_TEAMPAGE"] ?? null);
            echo " /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_receive_pm\">";
            // line 81
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_RECEIVE_PM");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_RECEIVE_PM_EXPLAIN");
            echo "</span></dt>
\t\t<dd><input name=\"group_receive_pm\" type=\"checkbox\" value=\"1\" class=\"radio\" id=\"group_receive_pm\"";
            // line 82
            echo ($context["GROUP_RECEIVE_PM"] ?? null);
            echo " /></dd>
\t</dl>
\t";
            // line 84
            // line 85
            echo "\t</fieldset>

\t<fieldset>
\t\t<legend>";
            // line 88
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_SETTINGS_SAVE");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"group_message_limit\">";
            // line 90
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MESSAGE_LIMIT");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MESSAGE_LIMIT_EXPLAIN");
            echo "</span></dt>
\t\t<dd><input name=\"group_message_limit\" type=\"number\" id=\"group_message_limit\" min=\"0\" max=\"9999\" value=\"";
            // line 91
            echo ($context["GROUP_MESSAGE_LIMIT"] ?? null);
            echo "\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_max_recipients\">";
            // line 94
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MAX_RECIPIENTS");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MAX_RECIPIENTS_EXPLAIN");
            echo "</span></dt>
\t\t<dd><input name=\"group_max_recipients\" type=\"number\" id=\"group_max_recipients\" min=\"0\" max=\"9999\" value=\"";
            // line 95
            echo ($context["GROUP_MAX_RECIPIENTS"] ?? null);
            echo "\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_colour\">";
            // line 98
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_COLOR");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_COLOR_EXPLAIN");
            echo "</span></dt>
\t\t<dd>
\t\t\t<input name=\"group_colour\" type=\"text\" id=\"group_colour\" value=\"";
            // line 100
            echo ($context["GROUP_COLOUR"] ?? null);
            echo "\" size=\"6\" maxlength=\"6\" />
\t\t\t";
            // line 101
            if (($context["GROUP_COLOUR"] ?? null)) {
                echo "&nbsp;<span style=\"background-color: #";
                echo ($context["GROUP_COLOUR"] ?? null);
                echo "\">&nbsp; &nbsp;</span>";
            }
            echo "&nbsp;&nbsp;<span>
\t\t\t[ <a href=\"#\" id=\"color_palette_toggle\">";
            // line 102
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLOUR_SWATCH");
            echo "</a> ]</span>
\t\t\t<div id=\"color_palette_placeholder\" style=\"display: none;\" data-color-palette=\"h\" data-height=\"12\" data-width=\"15\" data-target=\"#group_colour\"></div>
\t\t</dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"group_rank\">";
            // line 107
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_RANK");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><select name=\"group_rank\" id=\"group_rank\">";
            // line 108
            echo ($context["S_RANK_OPTIONS"] ?? null);
            echo "</select></dd>
\t</dl>
\t</fieldset>

\t<fieldset>
\t\t<legend>";
            // line 113
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_AVATAR");
            echo "</legend>
\t<dl>
\t\t<dt><label>";
            // line 115
            echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_IMAGE");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_EXPLAIN");
            echo "</span></dt>
\t\t<dd>";
            // line 116
            echo ($context["AVATAR"] ?? null);
            echo "</dd>
\t\t<dd><label for=\"avatar_delete\"><input type=\"checkbox\" name=\"avatar_delete\" id=\"avatar_delete\" /> ";
            // line 117
            echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_AVATAR");
            echo "</label></dd>
\t</dl>
\t<dl>
\t\t<dt><label>";
            // line 120
            echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_TYPE");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><select name=\"avatar_driver\" id=\"avatar_driver\" data-togglable-settings=\"true\">
\t\t\t";
            // line 122
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "avatar_drivers", [], "any", false, false, false, 122));
            foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
                // line 123
                echo "\t\t\t<option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 123);
                echo "\"";
                if (twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "SELECTED", [], "any", false, false, false, 123)) {
                    echo " selected=\"selected\"";
                }
                echo " data-toggle-setting=\"#avatar_option_";
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 123);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "L_TITLE", [], "any", false, false, false, 123);
                echo "</option>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            echo "\t\t</select></dd>
\t</dl>
\t<div id=\"avatar_options\">
\t";
            // line 128
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "avatar_drivers", [], "any", false, false, false, 128));
            foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
                // line 129
                echo "\t<div id=\"avatar_option_";
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 129);
                echo "\">
\t\t<p>";
                // line 130
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "L_EXPLAIN", [], "any", false, false, false, 130);
                echo "</p>
\t\t";
                // line 131
                echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "OUTPUT", [], "any", false, false, false, 131);
                echo "
\t</div>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "\t</div>
\t</fieldset>

\t<fieldset class=\"submit-buttons\">
\t\t<legend>";
            // line 138
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "</legend>
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"update\" value=\"";
            // line 139
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" />&nbsp;
\t\t<input class=\"button2\" type=\"reset\" id=\"reset\" name=\"reset\" value=\"";
            // line 140
            echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
            echo "\" />
\t\t";
            // line 141
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 145
($context["S_LIST"] ?? null)) {
            // line 146
            echo "
\t<a href=\"";
            // line 147
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("BACK");
            echo "</a>

\t<h1>";
            // line 149
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MEMBERS");
            echo " :: ";
            echo ($context["GROUP_NAME"] ?? null);
            echo "</h1>

\t<p>";
            // line 151
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_MEMBERS_EXPLAIN");
            echo "</p>

\t<form id=\"list\" method=\"post\" action=\"";
            // line 153
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset class=\"quick\">
\t\t<a href=\"";
            // line 156
            echo ($context["U_DEFAULT_ALL"] ?? null);
            echo "\">&raquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MAKE_DEFAULT_FOR_ALL");
            echo "</a>
\t</fieldset>

\t<table class=\"table1 zebra-table\">
\t<thead>
\t<tr>
\t\t<th>";
            // line 162
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo "</th>
\t\t<th>";
            // line 163
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DEFAULT");
            echo "</th>
\t\t<th>";
            // line 164
            echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
            echo "</th>
\t\t<th>";
            // line 165
            echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
            echo "</th>
\t\t<th>";
            // line 166
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t<tr>
\t\t<td class=\"row3\" colspan=\"5\"><strong>";
            // line 171
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_LEAD");
            echo "</strong></td>
\t</tr>
\t";
            // line 173
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "leader", [], "any", false, false, false, 173));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["leader"]) {
                // line 174
                echo "\t\t<tr>
\t\t\t<td>";
                // line 175
                if (twig_get_attribute($this->env, $this->source, $context["leader"], "USERNAME_COLOUR", [], "any", false, false, false, 175)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["leader"], "U_USER_EDIT", [], "any", false, false, false, 175);
                    echo "\" style=\"color: #";
                    echo twig_get_attribute($this->env, $this->source, $context["leader"], "USERNAME_COLOUR", [], "any", false, false, false, 175);
                    echo ";\" class=\"username-coloured\">";
                    echo twig_get_attribute($this->env, $this->source, $context["leader"], "USERNAME", [], "any", false, false, false, 175);
                    echo "</a>";
                } else {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["leader"], "U_USER_EDIT", [], "any", false, false, false, 175);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["leader"], "USERNAME", [], "any", false, false, false, 175);
                    echo "</a>";
                }
                echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                // line 176
                if (twig_get_attribute($this->env, $this->source, $context["leader"], "S_GROUP_DEFAULT", [], "any", false, false, false, 176)) {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
                } else {
                    echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
                }
                echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                // line 177
                echo twig_get_attribute($this->env, $this->source, $context["leader"], "JOINED", [], "any", false, false, false, 177);
                echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                // line 178
                echo twig_get_attribute($this->env, $this->source, $context["leader"], "USER_POSTS", [], "any", false, false, false, 178);
                echo "</td>
\t\t\t<td style=\"text-align: center;\"><input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
                // line 179
                echo twig_get_attribute($this->env, $this->source, $context["leader"], "USER_ID", [], "any", false, false, false, 179);
                echo "\" /></td>
\t\t</tr>
\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 182
                echo "\t\t<tr>
\t\t\t<td colspan=\"5\" style=\"text-align: center;\">";
                // line 183
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUPS_NO_MODS");
                echo "</td>
\t\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leader'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 186
            echo "\t<tr>
\t\t<td class=\"row3\" colspan=\"5\"><strong>";
            // line 187
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_APPROVED");
            echo "</strong></td>
\t</tr>
\t";
            // line 189
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "member", [], "any", false, false, false, 189));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
                // line 190
                echo "\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["member"], "S_PENDING", [], "any", false, false, false, 190)) {
                    // line 191
                    echo "\t\t<tr>
\t\t\t<td class=\"row3\" colspan=\"5\"><strong>";
                    // line 192
                    echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_PENDING");
                    echo "</strong></td>
\t\t</tr>
\t\t";
                } else {
                    // line 195
                    echo "\t\t<tr>
\t\t\t<td>";
                    // line 196
                    if (twig_get_attribute($this->env, $this->source, $context["member"], "USERNAME_COLOUR", [], "any", false, false, false, 196)) {
                        echo "<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["member"], "U_USER_EDIT", [], "any", false, false, false, 196);
                        echo "\" style=\"color: #";
                        echo twig_get_attribute($this->env, $this->source, $context["member"], "USERNAME_COLOUR", [], "any", false, false, false, 196);
                        echo ";\" class=\"username-coloured\">";
                        echo twig_get_attribute($this->env, $this->source, $context["member"], "USERNAME", [], "any", false, false, false, 196);
                        echo "</a>";
                    } else {
                        echo "<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["member"], "U_USER_EDIT", [], "any", false, false, false, 196);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["member"], "USERNAME", [], "any", false, false, false, 196);
                        echo "</a>";
                    }
                    echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 197
                    if (twig_get_attribute($this->env, $this->source, $context["member"], "S_GROUP_DEFAULT", [], "any", false, false, false, 197)) {
                        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
                    } else {
                        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
                    }
                    echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 198
                    echo twig_get_attribute($this->env, $this->source, $context["member"], "JOINED", [], "any", false, false, false, 198);
                    echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 199
                    echo twig_get_attribute($this->env, $this->source, $context["member"], "USER_POSTS", [], "any", false, false, false, 199);
                    echo "</td>
\t\t\t<td style=\"text-align: center;\"><input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
                    // line 200
                    echo twig_get_attribute($this->env, $this->source, $context["member"], "USER_ID", [], "any", false, false, false, 200);
                    echo "\" /></td>
\t\t</tr>
\t\t";
                }
                // line 203
                echo "\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 204
                echo "\t\t<tr>
\t\t\t<td colspan=\"5\" style=\"text-align: center;\">";
                // line 205
                echo $this->extensions['phpbb\template\twig\extension']->lang("GROUPS_NO_MEMBERS");
                echo "</td>
\t\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 208
            echo "\t</tbody>
\t</table>
\t<div class=\"pagination\">
\t";
            // line 211
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 211))) {
                // line 212
                echo "\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "acp_groups.html", 212)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 213
                echo "\t";
            }
            // line 214
            echo "\t</div>

\t<fieldset class=\"quick\">
\t\t<select name=\"action\"><option class=\"sep\" value=\"\">";
            // line 217
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_OPTION");
            echo "</option>";
            echo ($context["S_ACTION_OPTIONS"] ?? null);
            echo "</select>
\t\t<input class=\"button2\" type=\"submit\" name=\"update\" value=\"";
            // line 218
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" />
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('list', 'mark', true); return false;\">";
            // line 219
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('list', 'mark', false); return false;\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
            echo "</a></p>
\t</fieldset>

\t<h1>";
            // line 222
            echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_USERS");
            echo "</h1>

\t<p>";
            // line 224
            echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_USERS_EXPLAIN");
            echo "</p>

\t<fieldset>
\t\t<legend>";
            // line 227
            echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_USERS");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"leader\">";
            // line 229
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_GROUP_LEADER");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><label><input name=\"leader\" type=\"radio\" class=\"radio\" value=\"1\" /> ";
            // line 230
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "</label>
\t\t\t<label><input name=\"leader\" type=\"radio\" class=\"radio\" id=\"leader\" value=\"0\" checked=\"checked\" /> ";
            // line 231
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "</label></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"default\">";
            // line 234
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_GROUP_DEFAULT");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_GROUP_DEFAULT_EXPLAIN");
            echo "</span></dt>
\t\t<dd><label><input name=\"default\" type=\"radio\" class=\"radio\" value=\"1\" /> ";
            // line 235
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "</label>
\t\t\t<label><input name=\"default\" type=\"radio\" class=\"radio\" id=\"default\" value=\"0\" checked=\"checked\" /> ";
            // line 236
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "</label></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"usernames\">";
            // line 239
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAMES_EXPLAIN");
            echo "</span></dt>
\t\t<dd><textarea id=\"usernames\" name=\"usernames\" cols=\"40\" rows=\"5\"></textarea></dd>
\t\t<dd>";
            // line 241
            echo "[ <a href=\"";
            echo ($context["U_FIND_USERNAME"] ?? null);
            echo "\" onclick=\"find_username(this.href); return false;\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
            echo "</a> ]";
            echo "</dd>
\t</dl>

\t<p class=\"quick\">
\t\t<input class=\"button2\" type=\"submit\" name=\"addusers\" value=\"";
            // line 245
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" />
\t</p>
\t";
            // line 247
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } else {
            // line 252
            echo "
\t<h1>";
            // line 253
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_GROUPS_MANAGE");
            echo "</h1>

\t<p>";
            // line 255
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_GROUPS_MANAGE_EXPLAIN");
            echo "</p>

\t";
            // line 257
            if (($context["S_ERROR"] ?? null)) {
                // line 258
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 259
                echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 260
                echo ($context["ERROR_MSG"] ?? null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 263
            echo "
\t<h1>";
            // line 264
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_DEF_GROUPS");
            echo "</h1>

\t<p>";
            // line 266
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_DEF_GROUPS_EXPLAIN");
            echo "</p>

\t<form id=\"acp_groups\" method=\"post\" action=\"";
            // line 268
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t";
            // line 270
            // line 271
            echo "\t<table class=\"table1\">
\t\t<col class=\"col1\" /><col class=\"col1\" /><col class=\"col1\" /><col class=\"col2\" /><col class=\"col2\" /><col class=\"col2\" />
\t<thead>
\t<tr>
\t\t<th style=\"width: 50%\">";
            // line 275
            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP");
            echo "</th>
\t\t<th>";
            // line 276
            echo $this->extensions['phpbb\template\twig\extension']->lang("TOTAL_MEMBERS");
            echo "</th>
\t\t<th>";
            // line 277
            echo $this->extensions['phpbb\template\twig\extension']->lang("PENDING_MEMBERS");
            echo "</th>
\t\t<th colspan=\"2\">";
            // line 278
            echo $this->extensions['phpbb\template\twig\extension']->lang("OPTIONS");
            echo "</th>
\t\t<th>";
            // line 279
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACTION");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
            // line 283
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "groups", [], "any", false, false, false, 283));
            foreach ($context['_seq'] as $context["_key"] => $context["groups"]) {
                // line 284
                echo "\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["groups"], "S_SPECIAL", [], "any", false, false, false, 284)) {
                    // line 285
                    echo "\t\t";
                    if (twig_get_attribute($this->env, $this->source, $context["groups"], "S_FIRST_ROW", [], "any", false, false, false, 285)) {
                        // line 286
                        echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"6\" class=\"row3\">";
                        // line 287
                        echo $this->extensions['phpbb\template\twig\extension']->lang("NO_GROUPS_CREATED");
                        echo "</td>
\t\t\t</tr>
\t\t";
                    }
                    // line 290
                    echo "\t</tbody>
\t</table>
\t";
                    // line 292
                    // line 293
                    echo "
\t<fieldset class=\"quick\">
\t\t";
                    // line 295
                    if (($context["S_GROUP_ADD"] ?? null)) {
                        // line 296
                        echo "\t\t\t";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("CREATE_GROUP");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " <input type=\"text\" name=\"group_name\" value=\"\" /> <input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
                        echo "\" />
\t\t\t<input type=\"hidden\" name=\"add\" value=\"1\" />
\t\t";
                    }
                    // line 299
                    echo "\t\t";
                    echo ($context["S_FORM_TOKEN"] ?? null);
                    echo "
\t</fieldset>
\t</form>

\t<h1>";
                    // line 303
                    echo $this->extensions['phpbb\template\twig\extension']->lang("SPECIAL_GROUPS");
                    echo "</h1>

\t<p>";
                    // line 305
                    echo $this->extensions['phpbb\template\twig\extension']->lang("SPECIAL_GROUPS_EXPLAIN");
                    echo "</p>

\t<table class=\"table1\">
\t\t<col class=\"col1\" /><col class=\"col1\" /><col class=\"col1\" /><col class=\"col2\" /><col class=\"col2\" />
\t<thead>
\t<tr>
\t\t<th style=\"width: 50%\">";
                    // line 311
                    echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP");
                    echo "</th>
\t\t<th>";
                    // line 312
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOTAL_MEMBERS");
                    echo "</th>
\t\t<th>";
                    // line 313
                    echo $this->extensions['phpbb\template\twig\extension']->lang("PENDING_MEMBERS");
                    echo "</th>
\t\t<th colspan=\"2\">";
                    // line 314
                    echo $this->extensions['phpbb\template\twig\extension']->lang("OPTIONS");
                    echo "</th>
\t\t<th>";
                    // line 315
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ACTION");
                    echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t\t";
                } else {
                    // line 320
                    echo "\t\t<tr>
\t\t\t<td><strong";
                    // line 321
                    if (twig_get_attribute($this->env, $this->source, $context["groups"], "GROUP_COLOR", [], "any", false, false, false, 321)) {
                        echo " style=\"color: #";
                        echo twig_get_attribute($this->env, $this->source, $context["groups"], "GROUP_COLOR", [], "any", false, false, false, 321);
                        echo "\"";
                    }
                    echo ">";
                    echo twig_get_attribute($this->env, $this->source, $context["groups"], "GROUP_NAME", [], "any", false, false, false, 321);
                    echo "</strong></td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 322
                    echo twig_get_attribute($this->env, $this->source, $context["groups"], "TOTAL_MEMBERS", [], "any", false, false, false, 322);
                    echo "</td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 323
                    echo twig_get_attribute($this->env, $this->source, $context["groups"], "PENDING_MEMBERS", [], "any", false, false, false, 323);
                    echo "</td>
\t\t\t<td style=\"text-align: center;\"><a href=\"";
                    // line 324
                    echo twig_get_attribute($this->env, $this->source, $context["groups"], "U_EDIT", [], "any", false, false, false, 324);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("SETTINGS");
                    echo "</a></td>
\t\t\t<td style=\"text-align: center;\"><a href=\"";
                    // line 325
                    echo twig_get_attribute($this->env, $this->source, $context["groups"], "U_LIST", [], "any", false, false, false, 325);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERS");
                    echo "</a></td>
\t\t\t<td style=\"text-align: center;\">";
                    // line 326
                    if (( !twig_get_attribute($this->env, $this->source, $context["groups"], "S_GROUP_SPECIAL", [], "any", false, false, false, 326) && twig_get_attribute($this->env, $this->source, $context["groups"], "U_DELETE", [], "any", false, false, false, 326))) {
                        echo "<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["groups"], "U_DELETE", [], "any", false, false, false, 326);
                        echo "\" data-ajax=\"row_delete\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE");
                        echo "</a>";
                    } else {
                        echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE");
                    }
                    echo "</td>
\t\t</tr>
\t\t";
                }
                // line 329
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groups'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 330
            echo "\t</tbody>
\t</table>

";
        }
        // line 334
        echo "
";
        // line 335
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_groups.html", 335)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_groups.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1077 => 335,  1074 => 334,  1068 => 330,  1062 => 329,  1048 => 326,  1042 => 325,  1036 => 324,  1032 => 323,  1028 => 322,  1018 => 321,  1015 => 320,  1007 => 315,  1003 => 314,  999 => 313,  995 => 312,  991 => 311,  982 => 305,  977 => 303,  969 => 299,  959 => 296,  957 => 295,  953 => 293,  952 => 292,  948 => 290,  942 => 287,  939 => 286,  936 => 285,  933 => 284,  929 => 283,  922 => 279,  918 => 278,  914 => 277,  910 => 276,  906 => 275,  900 => 271,  899 => 270,  894 => 268,  889 => 266,  884 => 264,  881 => 263,  875 => 260,  871 => 259,  868 => 258,  866 => 257,  861 => 255,  856 => 253,  853 => 252,  845 => 247,  840 => 245,  829 => 241,  821 => 239,  815 => 236,  811 => 235,  804 => 234,  798 => 231,  794 => 230,  789 => 229,  784 => 227,  778 => 224,  773 => 222,  765 => 219,  761 => 218,  755 => 217,  750 => 214,  747 => 213,  734 => 212,  732 => 211,  727 => 208,  718 => 205,  715 => 204,  710 => 203,  704 => 200,  700 => 199,  696 => 198,  688 => 197,  670 => 196,  667 => 195,  661 => 192,  658 => 191,  655 => 190,  650 => 189,  645 => 187,  642 => 186,  633 => 183,  630 => 182,  622 => 179,  618 => 178,  614 => 177,  606 => 176,  588 => 175,  585 => 174,  580 => 173,  575 => 171,  567 => 166,  563 => 165,  559 => 164,  555 => 163,  551 => 162,  540 => 156,  534 => 153,  529 => 151,  522 => 149,  513 => 147,  510 => 146,  508 => 145,  501 => 141,  497 => 140,  493 => 139,  489 => 138,  483 => 134,  474 => 131,  470 => 130,  465 => 129,  461 => 128,  456 => 125,  439 => 123,  435 => 122,  429 => 120,  423 => 117,  419 => 116,  412 => 115,  407 => 113,  399 => 108,  394 => 107,  386 => 102,  378 => 101,  374 => 100,  366 => 98,  360 => 95,  353 => 94,  347 => 91,  340 => 90,  335 => 88,  330 => 85,  329 => 84,  324 => 82,  317 => 81,  311 => 78,  306 => 77,  300 => 74,  295 => 73,  289 => 70,  282 => 69,  279 => 68,  273 => 65,  266 => 64,  263 => 63,  260 => 62,  259 => 61,  255 => 60,  250 => 57,  242 => 54,  235 => 53,  232 => 52,  230 => 51,  227 => 50,  221 => 48,  216 => 45,  215 => 44,  207 => 43,  199 => 42,  191 => 41,  182 => 40,  181 => 39,  173 => 37,  170 => 36,  168 => 35,  159 => 33,  151 => 32,  143 => 31,  139 => 30,  134 => 29,  116 => 26,  107 => 25,  102 => 23,  96 => 20,  93 => 19,  87 => 16,  83 => 15,  80 => 14,  78 => 13,  73 => 11,  68 => 9,  59 => 7,  56 => 6,  54 => 5,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "acp_groups.html", "");
    }
}
