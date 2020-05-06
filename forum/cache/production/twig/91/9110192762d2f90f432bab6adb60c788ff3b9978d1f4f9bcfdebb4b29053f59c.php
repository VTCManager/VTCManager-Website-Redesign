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

/* acp_users.html */
class __TwigTemplate_c89f33bab48a462f171341d53b79b181f25e20eb7d14f463b91187f3ce5bdae2 extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "acp_users.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if (($context["S_SELECT_USER"] ?? null)) {
            // line 6
            echo "
\t<h1>";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN");
            echo "</h1>

\t<p>";
            // line 9
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t<form id=\"select_user\" method=\"post\" action=\"";
            // line 11
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 14
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_USER");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"username\">";
            // line 16
            echo $this->extensions['phpbb\template\twig\extension']->lang("ENTER_USERNAME");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><input class=\"text medium\" type=\"text\" id=\"username\" name=\"username\" /></dd>
\t\t<dd>[ <a href=\"";
            // line 18
            echo ($context["U_FIND_USERNAME"] ?? null);
            echo "\" onclick=\"find_username(this.href); return false;\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
            echo "</a> ]</dd>
\t\t<dd class=\"full\" style=\"text-align: left;\"><label><input type=\"checkbox\" class=\"radio\" id=\"anonymous\" name=\"u\" value=\"";
            // line 19
            echo ($context["ANONYMOUS_USER_ID"] ?? null);
            echo "\" /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_ANONYMOUS");
            echo "</label></dd>
\t</dl>

\t<p class=\"quick\">
\t\t<input type=\"submit\" name=\"submituser\" value=\"";
            // line 23
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t</p>
\t</fieldset>

\t</form>

";
        } elseif (        // line 29
($context["S_SELECT_FORUM"] ?? null)) {
            // line 30
            echo "
\t<a href=\"";
            // line 31
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("BACK");
            echo "</a>

\t<h1>";
            // line 33
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN");
            echo "</h1>

\t<p>";
            // line 35
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t<form id=\"select_forum\" method=\"post\" action=\"";
            // line 37
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 40
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN_MOVE_POSTS");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"new_forum\">";
            // line 42
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN_MOVE_POSTS");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("MOVE_POSTS_EXPLAIN");
            echo "</span></dt>
\t\t<dd><select id=\"new_forum\" name=\"new_f\">";
            // line 43
            echo ($context["S_FORUM_OPTIONS"] ?? null);
            echo "</select></dd>
\t</dl>
\t</fieldset>

\t<fieldset class=\"quick\">
\t\t<input type=\"submit\" name=\"update\" value=\"";
            // line 48
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t\t";
            // line 49
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } else {
            // line 54
            echo "
\t<a href=\"";
            // line 55
            echo ($context["U_BACK"] ?? null);
            echo "\" style=\"float: ";
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">&laquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("BACK");
            echo "</a>

\t<h1>";
            // line 57
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN");
            echo " :: ";
            echo ($context["MANAGED_USERNAME"] ?? null);
            echo "</h1>

\t<p>";
            // line 59
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t";
            // line 61
            if (($context["S_ERROR"] ?? null)) {
                // line 62
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 63
                echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 64
                echo ($context["ERROR_MSG"] ?? null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 67
            echo "
\t<form id=\"mode_select\" method=\"post\" action=\"";
            // line 68
            echo ($context["U_MODE_SELECT"] ?? null);
            echo "\">

\t<fieldset class=\"quick\">
\t\t";
            // line 71
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_FORM");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo " <select name=\"mode\" onchange=\"if (this.options[this.selectedIndex].value != '') this.form.submit();\">";
            echo ($context["S_FORM_OPTIONS"] ?? null);
            echo "</select> <input class=\"button2\" type=\"submit\" value=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
            echo "\" />
\t\t";
            // line 72
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        }
        // line 77
        echo "
";
        // line 78
        if (($context["S_OVERVIEW"] ?? null)) {
            // line 79
            echo "
";
            // line 80
            $location = "acp_users_overview.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_overview.html", "acp_users.html", 80)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 81
            echo "
";
        } elseif (        // line 82
($context["S_FEEDBACK"] ?? null)) {
            // line 83
            echo "
";
            // line 84
            $location = "acp_users_feedback.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_feedback.html", "acp_users.html", 84)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 85
            echo "
";
        } elseif (        // line 86
($context["S_WARNINGS"] ?? null)) {
            // line 87
            echo "
";
            // line 88
            $location = "acp_users_warnings.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_warnings.html", "acp_users.html", 88)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 89
            echo "
";
        } elseif (        // line 90
($context["S_PROFILE"] ?? null)) {
            // line 91
            echo "
";
            // line 92
            $location = "acp_users_profile.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_profile.html", "acp_users.html", 92)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 93
            echo "
";
        } elseif (        // line 94
($context["S_PREFS"] ?? null)) {
            // line 95
            echo "
";
            // line 96
            $location = "acp_users_prefs.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_prefs.html", "acp_users.html", 96)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 97
            echo "
";
        } elseif (        // line 98
($context["S_AVATAR"] ?? null)) {
            // line 99
            echo "
";
            // line 100
            $location = "acp_users_avatar.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_avatar.html", "acp_users.html", 100)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 101
            echo "
";
        } elseif (        // line 102
($context["S_RANK"] ?? null)) {
            // line 103
            echo "
\t<form id=\"user_prefs\" method=\"post\" action=\"";
            // line 104
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 107
            echo $this->extensions['phpbb\template\twig\extension']->lang("ACP_USER_RANK");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"user_rank\">";
            // line 109
            echo $this->extensions['phpbb\template\twig\extension']->lang("USER_RANK");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t<dd><select name=\"user_rank\" id=\"user_rank\">";
            // line 110
            echo ($context["S_RANK_OPTIONS"] ?? null);
            echo "</select></dd>
\t</dl>
\t</fieldset>

\t<fieldset class=\"quick\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
            // line 115
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" />
\t\t";
            // line 116
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 120
($context["S_SIGNATURE"] ?? null)) {
            // line 121
            echo "
";
            // line 122
            $location = "acp_users_signature.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("acp_users_signature.html", "acp_users.html", 122)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 123
            echo "
";
        } elseif (        // line 124
($context["S_GROUPS"] ?? null)) {
            // line 125
            echo "
\t<form id=\"user_groups\" method=\"post\" action=\"";
            // line 126
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t<table class=\"table1 zebra-table\">
\t<tbody>
\t";
            // line 130
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "group", [], "any", false, false, false, 130));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 131
                echo "\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["group"], "S_NEW_GROUP_TYPE", [], "any", false, false, false, 131)) {
                    // line 132
                    echo "\t\t<tr>
\t\t\t<td class=\"row3\" colspan=\"4\"><strong>";
                    // line 133
                    echo twig_get_attribute($this->env, $this->source, $context["group"], "GROUP_TYPE", [], "any", false, false, false, 133);
                    echo "</strong></td>
\t\t</tr>
\t\t";
                } else {
                    // line 136
                    echo "\t\t\t<tr>
\t\t\t\t<td><a href=\"";
                    // line 137
                    echo twig_get_attribute($this->env, $this->source, $context["group"], "U_EDIT_GROUP", [], "any", false, false, false, 137);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["group"], "GROUP_NAME", [], "any", false, false, false, 137);
                    echo "</a></td>
\t\t\t\t<td>";
                    // line 138
                    if (twig_get_attribute($this->env, $this->source, $context["group"], "S_IS_MEMBER", [], "any", false, false, false, 138)) {
                        if (twig_get_attribute($this->env, $this->source, $context["group"], "S_NO_DEFAULT", [], "any", false, false, false, 138)) {
                            echo "<a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["group"], "U_DEFAULT", [], "any", false, false, false, 138);
                            echo "\">";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DEFAULT");
                            echo "</a>";
                        } else {
                            echo "<strong>";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DEFAULT");
                            echo "</strong>";
                        }
                    } elseif (( !twig_get_attribute($this->env, $this->source, $context["group"], "S_IS_MEMBER", [], "any", false, false, false, 138) && twig_get_attribute($this->env, $this->source, $context["group"], "U_APPROVE", [], "any", false, false, false, 138))) {
                        echo "<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["group"], "U_APPROVE", [], "any", false, false, false, 138);
                        echo "\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_APPROVE");
                        echo "</a>";
                    } else {
                        echo "&nbsp;";
                    }
                    echo "</td>
\t\t\t\t<td>";
                    // line 139
                    if ((twig_get_attribute($this->env, $this->source, $context["group"], "S_IS_MEMBER", [], "any", false, false, false, 139) &&  !twig_get_attribute($this->env, $this->source, $context["group"], "S_SPECIAL_GROUP", [], "any", false, false, false, 139))) {
                        echo "<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["group"], "U_DEMOTE_PROMOTE", [], "any", false, false, false, 139);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["group"], "L_DEMOTE_PROMOTE", [], "any", false, false, false, 139);
                        echo "</a>";
                    } else {
                        echo "&nbsp;";
                    }
                    echo "</td>
\t\t\t\t<td><a href=\"";
                    // line 140
                    echo twig_get_attribute($this->env, $this->source, $context["group"], "U_DELETE", [], "any", false, false, false, 140);
                    echo "\">";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("GROUP_DELETE");
                    echo "</a></td>
\t\t\t</tr>
\t\t";
                }
                // line 143
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "\t</tbody>
\t</table>

\t";
            // line 147
            if (($context["S_GROUP_OPTIONS"] ?? null)) {
                // line 148
                echo "\t\t<fieldset class=\"quick\">
\t\t\t";
                // line 149
                // line 150
                echo "\t\t\t";
                echo $this->extensions['phpbb\template\twig\extension']->lang("USER_GROUP_ADD");
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                echo " <select name=\"g\">";
                echo ($context["S_GROUP_OPTIONS"] ?? null);
                echo "</select> <input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
                echo "\" />
\t\t\t";
                // line 151
                // line 152
                echo "\t\t\t";
                echo ($context["S_FORM_TOKEN"] ?? null);
                echo "
\t\t</fieldset>
\t";
            }
            // line 155
            echo "\t</form>

";
        } elseif (        // line 157
($context["S_ATTACHMENTS"] ?? null)) {
            // line 158
            echo "
\t<form id=\"user_attachments\" method=\"post\" action=\"";
            // line 159
            echo ($context["U_ACTION"] ?? null);
            echo "\">


\t<div class=\"pagination\">
\t";
            // line 163
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 163))) {
                // line 164
                echo "\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "acp_users.html", 164)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 165
                echo "\t";
            }
            // line 166
            echo "\t</div>

\t";
            // line 168
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "attach", [], "any", false, false, false, 168))) {
                // line 169
                echo "\t<table class=\"table1 zebra-table fixed-width-table\">
\t<thead>
\t<tr>
\t\t<th>";
                // line 172
                echo $this->extensions['phpbb\template\twig\extension']->lang("FILENAME");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 173
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_TIME");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 174
                echo $this->extensions['phpbb\template\twig\extension']->lang("FILESIZE");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 175
                echo $this->extensions['phpbb\template\twig\extension']->lang("DOWNLOADS");
                echo "</th>
\t\t<th style=\"width: 50px;\">";
                // line 176
                echo $this->extensions['phpbb\template\twig\extension']->lang("MARK");
                echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
                // line 180
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "attach", [], "any", false, false, false, 180));
                foreach ($context['_seq'] as $context["_key"] => $context["attach"]) {
                    // line 181
                    echo "\t<tr>
\t\t<td><a href=\"";
                    // line 182
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "U_DOWNLOAD", [], "any", false, false, false, 182);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "REAL_FILENAME", [], "any", false, false, false, 182);
                    echo "</a><br /><span class=\"small\">";
                    if (twig_get_attribute($this->env, $this->source, $context["attach"], "S_IN_MESSAGE", [], "any", false, false, false, 182)) {
                        echo "<strong>";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("PM");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " </strong>";
                    } else {
                        echo "<strong>";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("POST");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " </strong>";
                    }
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "U_VIEW_TOPIC", [], "any", false, false, false, 182);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "TOPIC_TITLE", [], "any", false, false, false, 182);
                    echo "</a></span></td>
\t\t<td style=\"text-align: center\">";
                    // line 183
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "POST_TIME", [], "any", false, false, false, 183);
                    echo "</td>
\t\t<td style=\"text-align: center\">";
                    // line 184
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "SIZE", [], "any", false, false, false, 184);
                    echo "</td>
\t\t<td style=\"text-align: center\">";
                    // line 185
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "DOWNLOAD_COUNT", [], "any", false, false, false, 185);
                    echo "</td>
\t\t<td style=\"text-align: center\"><input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
                    // line 186
                    echo twig_get_attribute($this->env, $this->source, $context["attach"], "ATTACH_ID", [], "any", false, false, false, 186);
                    echo "\" /></td>
\t</tr>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attach'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 189
                echo "\t</tbody>
\t</table>
\t";
            } else {
                // line 192
                echo "\t<div class=\"errorbox\">
\t\t<p>";
                // line 193
                echo $this->extensions['phpbb\template\twig\extension']->lang("USER_NO_ATTACHMENTS");
                echo "</p>
\t</div>
\t";
            }
            // line 196
            echo "\t<fieldset class=\"display-options\">
\t\t";
            // line 197
            echo $this->extensions['phpbb\template\twig\extension']->lang("SORT_BY");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo " <select name=\"sk\">";
            echo ($context["S_SORT_KEY"] ?? null);
            echo "</select> <select name=\"sd\">";
            echo ($context["S_SORT_DIR"] ?? null);
            echo "</select>
\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 198
            echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
            echo "\" name=\"sort\" />
\t</fieldset>
\t<hr />
\t<div class=\"pagination\">
\t";
            // line 202
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 202))) {
                // line 203
                echo "\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "acp_users.html", 203)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 204
                echo "\t";
            }
            // line 205
            echo "\t</div>

\t<fieldset class=\"quick\">
\t\t<input class=\"button2\" type=\"submit\" name=\"delmarked\" value=\"";
            // line 208
            echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_MARKED");
            echo "\" />
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('user_attachments', 'mark', true);\">";
            // line 209
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('user_attachments', 'mark', false);\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
            echo "</a></p>
\t\t";
            // line 210
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif (        // line 214
($context["S_PERMISSIONS"] ?? null)) {
            // line 215
            echo "
\t<div style=\"float: ";
            // line 216
            echo ($context["S_CONTENT_FLOW_END"] ?? null);
            echo ";\">
\t\t<a href=\"";
            // line 217
            echo ($context["U_USER_PERMISSIONS"] ?? null);
            echo "\">&raquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SET_USERS_PERMISSIONS");
            echo "</a><br />
\t\t<a href=\"";
            // line 218
            echo ($context["U_USER_FORUM_PERMISSIONS"] ?? null);
            echo "\">&raquo; ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("SET_USERS_FORUM_PERMISSIONS");
            echo "</a>
\t</div>

\t<form id=\"select_forum\" method=\"post\" action=\"";
            // line 221
            echo ($context["U_ACTION"] ?? null);
            echo "\">

\t\t<fieldset class=\"quick\" style=\"text-align: left;\">
\t\t\t";
            // line 224
            echo $this->extensions['phpbb\template\twig\extension']->lang("SELECT_FORUM");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo " <select name=\"f\">";
            echo ($context["S_FORUM_OPTIONS"] ?? null);
            echo "</select>
\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 225
            echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
            echo "\" name=\"select\" />
\t\t\t";
            // line 226
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t\t</fieldset>
\t</form>

\t<div class=\"clearfix\">&nbsp;</div>

\t";
            // line 232
            $location = "permission_mask.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("permission_mask.html", "acp_users.html", 232)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 233
            echo "
";
        } else {
            // line 235
            echo "
\t";
            // line 236
            // line 237
            echo "
";
        }
        // line 239
        echo "
";
        // line 240
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_users.html", 240)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  802 => 240,  799 => 239,  795 => 237,  794 => 236,  791 => 235,  787 => 233,  775 => 232,  766 => 226,  762 => 225,  755 => 224,  749 => 221,  741 => 218,  735 => 217,  731 => 216,  728 => 215,  726 => 214,  719 => 210,  713 => 209,  709 => 208,  704 => 205,  701 => 204,  688 => 203,  686 => 202,  679 => 198,  670 => 197,  667 => 196,  661 => 193,  658 => 192,  653 => 189,  644 => 186,  640 => 185,  636 => 184,  632 => 183,  610 => 182,  607 => 181,  603 => 180,  596 => 176,  592 => 175,  588 => 174,  584 => 173,  580 => 172,  575 => 169,  573 => 168,  569 => 166,  566 => 165,  553 => 164,  551 => 163,  544 => 159,  541 => 158,  539 => 157,  535 => 155,  528 => 152,  527 => 151,  517 => 150,  516 => 149,  513 => 148,  511 => 147,  506 => 144,  500 => 143,  492 => 140,  480 => 139,  456 => 138,  450 => 137,  447 => 136,  441 => 133,  438 => 132,  435 => 131,  431 => 130,  424 => 126,  421 => 125,  419 => 124,  416 => 123,  404 => 122,  401 => 121,  399 => 120,  392 => 116,  388 => 115,  380 => 110,  375 => 109,  370 => 107,  364 => 104,  361 => 103,  359 => 102,  356 => 101,  344 => 100,  341 => 99,  339 => 98,  336 => 97,  324 => 96,  321 => 95,  319 => 94,  316 => 93,  304 => 92,  301 => 91,  299 => 90,  296 => 89,  284 => 88,  281 => 87,  279 => 86,  276 => 85,  264 => 84,  261 => 83,  259 => 82,  256 => 81,  244 => 80,  241 => 79,  239 => 78,  236 => 77,  228 => 72,  219 => 71,  213 => 68,  210 => 67,  204 => 64,  200 => 63,  197 => 62,  195 => 61,  190 => 59,  183 => 57,  174 => 55,  171 => 54,  163 => 49,  159 => 48,  151 => 43,  145 => 42,  140 => 40,  134 => 37,  129 => 35,  124 => 33,  115 => 31,  112 => 30,  110 => 29,  101 => 23,  92 => 19,  86 => 18,  80 => 16,  75 => 14,  69 => 11,  64 => 9,  59 => 7,  56 => 6,  54 => 5,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "acp_users.html", "");
    }
}
