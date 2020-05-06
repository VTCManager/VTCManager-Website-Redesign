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

/* ucp_main_subscribed.html */
class __TwigTemplate_3367b1d7a661e92fc518085f9879ac195bf20ccb5fafdfade6a3dfc9f64c6365 extends \Twig\Template
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
        $location = "ucp_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_header.html", "ucp_main_subscribed.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form id=\"ucp\" method=\"post\" action=\"";
        // line 3
        echo ($context["S_UCP_ACTION"] ?? null);
        echo "\"";
        echo ($context["S_FORM_ENCTYPE"] ?? null);
        echo ">

<h2>";
        // line 5
        echo $this->extensions['phpbb\template\twig\extension']->lang("TITLE");
        echo "</h2>
<div class=\"panel\">
\t<div class=\"inner\">

\t<p>";
        // line 9
        echo $this->extensions['phpbb\template\twig\extension']->lang("WATCHED_EXPLAIN");
        echo "</p>

";
        // line 11
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "forumrow", [], "any", false, false, false, 11))) {
            // line 12
            echo "\t<ul class=\"topiclist missing-column\">
\t\t<li class=\"header\">
\t\t\t<dl class=\"row-item\">
\t\t\t\t<dt><div class=\"list-inner\">";
            // line 15
            echo $this->extensions['phpbb\template\twig\extension']->lang("WATCHED_FORUMS");
            echo "</div></dt>
\t\t\t\t<dd class=\"lastpost\"><span>";
            // line 16
            echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
            echo "</span></dd>
\t\t\t\t<dd class=\"mark\">";
            // line 17
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK");
            echo "</dd>
\t\t\t</dl>
\t\t</li>
\t</ul>
\t<ul class=\"topiclist cplist missing-column\">

\t";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "forumrow", [], "any", false, false, false, 23));
            foreach ($context['_seq'] as $context["_key"] => $context["forumrow"]) {
                // line 24
                echo "\t\t<li class=\"row";
                if ((twig_get_attribute($this->env, $this->source, $context["forumrow"], "S_ROW_COUNT", [], "any", false, false, false, 24) % 2 == 1)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                echo "\">
\t\t\t<dl class=\"row-item ";
                // line 25
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "FORUM_IMG_STYLE", [], "any", false, false, false, 25);
                echo "\">
\t\t\t\t<dt>
\t\t\t\t\t";
                // line 27
                if (twig_get_attribute($this->env, $this->source, $context["forumrow"], "S_UNREAD_FORUM", [], "any", false, false, false, 27)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "U_VIEWFORUM", [], "any", false, false, false, 27);
                    echo "\" class=\"row-item-link\"></a>";
                }
                // line 28
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t<a href=\"";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "U_VIEWFORUM", [], "any", false, false, false, 29);
                echo "\" class=\"forumtitle\">";
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "FORUM_NAME", [], "any", false, false, false, 29);
                echo "</a><br />
\t\t\t\t\t\t";
                // line 30
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "FORUM_DESC", [], "any", false, false, false, 30);
                echo "
\t\t\t\t\t\t";
                // line 31
                if (twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_TIME", [], "any", false, false, false, 31)) {
                    // line 32
                    echo "\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t";
                    // line 33
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                    echo " ";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 33);
                    echo " &laquo; <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "U_LAST_POST", [], "any", false, false, false, 33);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_TIME", [], "any", false, false, false, 33);
                    echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 36
                echo "\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t<dd class=\"lastpost\">
\t\t\t\t\t";
                // line 39
                if (twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_TIME", [], "any", false, false, false, 39)) {
                    // line 40
                    echo "\t\t\t\t\t\t<span><dfn>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                    echo " </dfn>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 40);
                    echo "
\t\t\t\t\t\t\t<a href=\"";
                    // line 41
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "U_LAST_POST", [], "any", false, false, false, 41);
                    echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-external-link-square fa-fw icon-lightgray icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 42
                    echo ($context["VIEW_LATEST_POST"] ?? null);
                    echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<br />";
                    // line 44
                    echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "LAST_POST_TIME", [], "any", false, false, false, 44);
                    echo "</span>
\t\t\t\t\t";
                } else {
                    // line 46
                    echo "\t\t\t\t\t\t";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("NO_POSTS");
                    echo "<br />&nbsp;
\t\t\t\t\t";
                }
                // line 48
                echo "\t\t\t\t</dd>
\t\t\t\t<dd class=\"mark\"><input type=\"checkbox\" name=\"f[";
                // line 49
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "FORUM_ID", [], "any", false, false, false, 49);
                echo "]\" id=\"f";
                echo twig_get_attribute($this->env, $this->source, $context["forumrow"], "FORUM_ID", [], "any", false, false, false, 49);
                echo "\" /></dd>
\t\t\t</dl>
\t\t</li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['forumrow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "\t</ul>
";
        } elseif (        // line 54
($context["S_FORUM_NOTIFY"] ?? null)) {
            // line 55
            echo "    <ul class=\"topiclist\">
        <li class=\"header\">
            <dl class=\"row-item\">
                <dt>";
            // line 58
            echo $this->extensions['phpbb\template\twig\extension']->lang("WATCHED_FORUMS");
            echo "</dt>
            </dl>
        </li>
    </ul>
\t<p><strong>";
            // line 62
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO_WATCHED_FORUMS");
            echo "</strong></p>
";
        }
        // line 64
        echo "    <br />

";
        // line 66
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 66))) {
            // line 67
            echo "\t<ul class=\"topiclist missing-column\">
\t\t<li class=\"header\">
\t\t\t<dl class=\"row-item\">
\t\t\t\t<dt><div class=\"list-inner\">";
            // line 70
            echo $this->extensions['phpbb\template\twig\extension']->lang("WATCHED_TOPICS");
            echo "</div></dt>
\t\t\t\t<dd class=\"lastpost\"><span>";
            // line 71
            echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
            echo "</span></dd>
\t\t\t\t<dd class=\"mark\">";
            // line 72
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK");
            echo "</dd>
\t\t\t</dl>
\t\t</li>
\t</ul>
\t<ul class=\"topiclist cplist missing-column\">

\t";
            // line 78
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 78));
            foreach ($context['_seq'] as $context["_key"] => $context["topicrow"]) {
                // line 79
                echo "\t\t<li class=\"row";
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_REPORTED", [], "any", false, false, false, 79)) {
                    echo " reported";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_ROW_COUNT", [], "any", false, false, false, 79) % 2 == 1)) {
                    echo " bg1";
                } else {
                    echo " bg2";
                }
                echo "\">
\t\t\t<dl class=\"row-item ";
                // line 80
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_IMG_STYLE", [], "any", false, false, false, 80);
                echo "\">
\t\t\t\t<dt";
                // line 81
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ICON_IMG", [], "any", false, false, false, 81)) {
                    echo " style=\"background-image: url(";
                    echo ($context["T_ICONS_PATH"] ?? null);
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ICON_IMG", [], "any", false, false, false, 81);
                    echo "); background-repeat: no-repeat;\"";
                }
                echo " title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_FOLDER_IMG_ALT", [], "any", false, false, false, 81);
                echo "\">
\t\t\t\t\t";
                // line 82
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_UNREAD_TOPIC", [], "any", false, false, false, 82)) {
                    echo "<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_NEWEST_POST", [], "any", false, false, false, 82);
                    echo "\" class=\"row-item-link\"></a>";
                }
                // line 83
                echo "\t\t\t\t\t<div class=\"list-inner\">
\t\t\t\t\t\t";
                // line 84
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_UNREAD_TOPIC", [], "any", false, false, false, 84)) {
                    // line 85
                    echo "\t\t\t\t\t\t\t<a class=\"unread\" href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_NEWEST_POST", [], "any", false, false, false, 85);
                    echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-file fa-fw icon-red icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 86
                    echo ($context["NEW_POST"] ?? null);
                    echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                // line 88
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_VIEW_TOPIC", [], "any", false, false, false, 88);
                echo "\" class=\"topictitle\">";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_TITLE", [], "any", false, false, false, 88);
                echo "</a>
\t\t\t\t\t\t";
                // line 89
                if ((twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_UNAPPROVED", [], "any", false, false, false, 89) || twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_POSTS_UNAPPROVED", [], "any", false, false, false, 89))) {
                    // line 90
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_MCP_QUEUE", [], "any", false, false, false, 90);
                    echo "\" title=\"";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_UNAPPROVED");
                    echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-question fa-fw icon-blue\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 91
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_UNAPPROVED");
                    echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                // line 94
                echo "\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "S_TOPIC_REPORTED", [], "any", false, false, false, 94)) {
                    // line 95
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_MCP_REPORT", [], "any", false, false, false, 95);
                    echo "\" title=\"";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_REPORTED");
                    echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon fa-exclamation fa-fw icon-red\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                    // line 96
                    echo $this->extensions['phpbb\template\twig\extension']->lang("TOPIC_REPORTED");
                    echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
                }
                // line 99
                echo "\t\t\t\t\t\t<br />
\t\t\t\t\t\t";
                // line 100
                if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["topicrow"], "pagination", [], "any", false, false, false, 100))) {
                    // line 101
                    echo "\t\t\t\t\t\t<div class=\"pagination\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
                    // line 103
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["topicrow"], "pagination", [], "any", false, false, false, 103));
                    foreach ($context['_seq'] as $context["_key"] => $context["pagination"]) {
                        // line 104
                        echo "\t\t\t\t\t\t\t\t";
                        if (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_PREV", [], "any", false, false, false, 104)) {
                            // line 105
                            echo "\t\t\t\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_CURRENT", [], "any", false, false, false, 105)) {
                            echo "<li class=\"active\"><span>";
                            echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 105);
                            echo "</span></li>
\t\t\t\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source,                         // line 106
$context["pagination"], "S_IS_ELLIPSIS", [], "any", false, false, false, 106)) {
                            echo "<li class=\"ellipsis\"><span>";
                            echo $this->extensions['phpbb\template\twig\extension']->lang("ELLIPSIS");
                            echo "</span></li>
\t\t\t\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source,                         // line 107
$context["pagination"], "S_IS_NEXT", [], "any", false, false, false, 107)) {
                            // line 108
                            echo "\t\t\t\t\t\t\t\t";
                        } else {
                            echo "<li><a href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 108);
                            echo "\">";
                            echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 108);
                            echo "</a></li>
\t\t\t\t\t\t\t\t";
                        }
                        // line 110
                        echo "\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagination'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 111
                    echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 114
                echo "\t\t\t\t\t\t<div class=\"responsive-hide\">
\t\t\t\t\t\t\t";
                // line 115
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "ATTACH_ICON_IMG", [], "any", false, false, false, 115)) {
                    echo "<i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> ";
                }
                // line 116
                echo "\t\t\t\t\t\t\t";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_AUTHOR_FULL", [], "any", false, false, false, 116);
                echo " &raquo; ";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "FIRST_POST_TIME", [], "any", false, false, false, 116);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"responsive-show\" style=\"display: none;\">
\t\t\t\t\t\t\t";
                // line 119
                if (twig_get_attribute($this->env, $this->source, $context["topicrow"], "ATTACH_ICON_IMG", [], "any", false, false, false, 119)) {
                    echo "<i class=\"icon fa-paperclip fa-fw\" aria-hidden=\"true\"></i> ";
                }
                // line 120
                echo "\t\t\t\t\t\t\t";
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                echo " ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 120);
                echo " &laquo; <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_LAST_POST", [], "any", false, false, false, 120);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GOTO_LAST_POST");
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME", [], "any", false, false, false, 120);
                echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</dt>
\t\t\t\t<dd class=\"lastpost\"><span><dfn>";
                // line 124
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_POST");
                echo " </dfn>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("POST_BY_AUTHOR");
                echo " ";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_AUTHOR_FULL", [], "any", false, false, false, 124);
                echo "
\t\t\t\t\t<a href=\"";
                // line 125
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "U_LAST_POST", [], "any", false, false, false, 125);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("GOTO_LAST_POST");
                echo "\">
\t\t\t\t\t\t<i class=\"icon fa-external-link-square fa-fw icon-lightgray icon-md\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                // line 126
                echo ($context["VIEW_LATEST_POST"] ?? null);
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t\t<br />";
                // line 128
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "LAST_POST_TIME", [], "any", false, false, false, 128);
                echo "</span>
\t\t\t\t</dd>
\t\t\t\t<dd class=\"mark\"><input type=\"checkbox\" name=\"t[";
                // line 130
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ID", [], "any", false, false, false, 130);
                echo "]\" id=\"t";
                echo twig_get_attribute($this->env, $this->source, $context["topicrow"], "TOPIC_ID", [], "any", false, false, false, 130);
                echo "\" /></dd>
\t\t\t</dl>
\t\t</li>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['topicrow'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 134
            echo "\t</ul>

\t<div class=\"action-bar bar-bottom\">
\t\t<div class=\"pagination\">
\t\t\t";
            // line 138
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo "
\t\t\t";
            // line 139
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 139))) {
                // line 140
                echo "\t\t\t\t";
                $location = "pagination.html";
                $namespace = false;
                if (strpos($location, '@') === 0) {
                    $namespace = substr($location, 1, strpos($location, '/') - 1);
                    $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                    $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
                }
                $this->loadTemplate("pagination.html", "ucp_main_subscribed.html", 140)->display($context);
                if ($namespace) {
                    $this->env->setNamespaceLookUpOrder($previous_look_up_order);
                }
                // line 141
                echo "\t\t\t";
            } else {
                // line 142
                echo "\t\t\t\t &bull; ";
                echo ($context["PAGE_NUMBER"] ?? null);
                echo "
\t\t\t";
            }
            // line 144
            echo "\t\t</div>
\t</div>

";
        } elseif (        // line 147
($context["S_TOPIC_NOTIFY"] ?? null)) {
            // line 148
            echo "    <ul class=\"topiclist\">
        <li class=\"header\">
            <dl class=\"row-item\">
                <dt>";
            // line 151
            echo $this->extensions['phpbb\template\twig\extension']->lang("WATCHED_TOPICS");
            echo "</dt>
            </dl>
        </li>
    </ul>
\t<p><strong>";
            // line 155
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO_WATCHED_TOPICS");
            echo "</strong></p>
";
        }
        // line 157
        echo "
\t</div>
</div>

";
        // line 161
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "topicrow", [], "any", false, false, false, 161)) || twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "forumrow", [], "any", false, false, false, 161)))) {
            // line 162
            echo "\t<fieldset class=\"display-actions\">
\t\t<input type=\"submit\" name=\"unwatch\" value=\"";
            // line 163
            echo $this->extensions['phpbb\template\twig\extension']->lang("UNWATCH_MARKED");
            echo "\" class=\"button2\" />
\t\t<div><a href=\"#\" onclick=\"marklist('ucp', 't', true); marklist('ucp', 'f', true); return false;\">";
            // line 164
            echo $this->extensions['phpbb\template\twig\extension']->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('ucp', 't', false); marklist('ucp', 'f', false); return false;\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("UNMARK_ALL");
            echo "</a></div>
\t\t";
            // line 165
            echo ($context["S_FORM_TOKEN"] ?? null);
            echo "
\t</fieldset>
";
        }
        // line 168
        echo "</form>

";
        // line 170
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_main_subscribed.html", 170)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_main_subscribed.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  559 => 170,  555 => 168,  549 => 165,  543 => 164,  539 => 163,  536 => 162,  534 => 161,  528 => 157,  523 => 155,  516 => 151,  511 => 148,  509 => 147,  504 => 144,  498 => 142,  495 => 141,  482 => 140,  480 => 139,  476 => 138,  470 => 134,  458 => 130,  453 => 128,  448 => 126,  442 => 125,  434 => 124,  416 => 120,  412 => 119,  401 => 116,  397 => 115,  394 => 114,  389 => 111,  383 => 110,  373 => 108,  371 => 107,  365 => 106,  358 => 105,  355 => 104,  351 => 103,  347 => 101,  345 => 100,  342 => 99,  336 => 96,  329 => 95,  326 => 94,  320 => 91,  313 => 90,  311 => 89,  304 => 88,  298 => 86,  293 => 85,  291 => 84,  288 => 83,  282 => 82,  271 => 81,  267 => 80,  256 => 79,  252 => 78,  243 => 72,  239 => 71,  235 => 70,  230 => 67,  228 => 66,  224 => 64,  219 => 62,  212 => 58,  207 => 55,  205 => 54,  202 => 53,  190 => 49,  187 => 48,  181 => 46,  176 => 44,  171 => 42,  167 => 41,  158 => 40,  156 => 39,  151 => 36,  137 => 33,  134 => 32,  132 => 31,  128 => 30,  122 => 29,  119 => 28,  113 => 27,  108 => 25,  99 => 24,  95 => 23,  86 => 17,  82 => 16,  78 => 15,  73 => 12,  71 => 11,  66 => 9,  59 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_main_subscribed.html", "");
    }
}
