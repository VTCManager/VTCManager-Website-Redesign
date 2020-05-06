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

/* navbar_footer.html */
class __TwigTemplate_62de90099e6643e13341e4a6f3da9d01278a1ff0ac9fe6d6ab8608bb3521c984 extends \Twig\Template
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
        echo "<div class=\"navbar\" role=\"navigation\">
\t<div class=\"inner\">

\t<ul id=\"nav-footer\" class=\"nav-footer linklist\" role=\"menubar\">
\t\t<li class=\"breadcrumbs\">
\t\t\t";
        // line 6
        if (($context["U_SITE_HOME"] ?? null)) {
            // line 7
            echo "\t\t\t\t";
            ob_start(function () { return ''; });
            // line 8
            echo "\t\t\t\t<span class=\"crumb\">
\t\t\t\t\t<a href=\"";
            // line 9
            echo ($context["U_SITE_HOME"] ?? null);
            echo "\" data-navbar-reference=\"home\">
\t\t\t\t\t\t<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 10
            echo $this->extensions['phpbb\template\twig\extension']->lang("SITE_HOME");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</span>
\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 14
            echo "\t\t\t";
        }
        // line 15
        echo "\t\t\t";
        // line 16
        echo "\t\t\t";
        ob_start(function () { return ''; });
        // line 17
        echo "\t\t\t<span class=\"crumb\">
\t\t\t\t<a href=\"";
        // line 18
        echo ($context["U_INDEX"] ?? null);
        echo "\" data-navbar-reference=\"index\">
\t\t\t\t\t";
        // line 19
        if ( !($context["U_SITE_HOME"] ?? null)) {
            echo "<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i>";
        }
        echo "<span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("INDEX");
        echo "</span>
\t\t\t\t</a>
\t\t\t</span>
\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 23
        echo "\t\t\t";
        // line 24
        echo "\t\t</li>
\t\t";
        // line 25
        if ((($context["U_WATCH_FORUM_LINK"] ?? null) &&  !($context["S_IS_BOT"] ?? null))) {
            // line 26
            echo "\t\t\t<li data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 27
            echo ($context["U_WATCH_FORUM_LINK"] ?? null);
            echo "\" title=\"";
            echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
            echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
            if (($context["S_WATCHING_FORUM"] ?? null)) {
                echo "fa-check-square-o";
            } else {
                echo "fa-square-o";
            }
            echo " fa-fw\" data-toggle-text=\"";
            echo ($context["S_WATCH_FORUM_TOGGLE"] ?? null);
            echo "\" data-toggle-url=\"";
            echo ($context["U_WATCH_FORUM_TOGGLE"] ?? null);
            echo "\">
\t\t\t\t\t<i class=\"icon ";
            // line 28
            if (($context["S_WATCHING_FORUM"] ?? null)) {
                echo "fa-square-o";
            } else {
                echo "fa-check-square-o";
            }
            echo " fa-fw\" aria-hidden=\"true\"></i><span>";
            echo ($context["S_WATCH_FORUM_TITLE"] ?? null);
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 32
        echo "
\t\t";
        // line 33
        // line 34
        echo "\t\t<li class=\"rightside\">";
        echo ($context["S_TIMEZONE"] ?? null);
        echo "</li>
\t\t";
        // line 35
        // line 36
        echo "\t\t";
        if ( !($context["S_IS_BOT"] ?? null)) {
            // line 37
            echo "\t\t\t<li class=\"rightside\">
\t\t\t\t<a href=\"";
            // line 38
            echo ($context["U_DELETE_COOKIES"] ?? null);
            echo "\" data-ajax=\"true\" data-refresh=\"true\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-trash fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 39
            echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_COOKIES");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
            // line 42
            if (($context["S_DISPLAY_MEMBERLIST"] ?? null)) {
                // line 43
                echo "\t\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
                // line 44
                echo ($context["U_MEMBERLIST"] ?? null);
                echo "\" title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST_EXPLAIN");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 45
                echo $this->extensions['phpbb\template\twig\extension']->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 49
            echo "\t\t";
        }
        // line 50
        echo "\t\t";
        // line 51
        echo "\t\t";
        if (($context["U_TEAM"] ?? null)) {
            // line 52
            echo "\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 53
            echo ($context["U_TEAM"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 54
            echo $this->extensions['phpbb\template\twig\extension']->lang("THE_TEAM");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 58
        echo "\t\t";
        // line 59
        echo "\t\t";
        if (($context["U_CONTACT_US"] ?? null)) {
            // line 60
            echo "\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 61
            echo ($context["U_CONTACT_US"] ?? null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-envelope fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 62
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONTACT_US");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 66
        echo "\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navbar_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 66,  206 => 62,  202 => 61,  199 => 60,  196 => 59,  194 => 58,  187 => 54,  183 => 53,  180 => 52,  177 => 51,  175 => 50,  172 => 49,  165 => 45,  159 => 44,  156 => 43,  154 => 42,  148 => 39,  144 => 38,  141 => 37,  138 => 36,  137 => 35,  132 => 34,  131 => 33,  128 => 32,  115 => 28,  99 => 27,  96 => 26,  94 => 25,  91 => 24,  89 => 23,  78 => 19,  74 => 18,  71 => 17,  68 => 16,  66 => 15,  63 => 14,  56 => 10,  52 => 9,  49 => 8,  46 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navbar_footer.html", "");
    }
}
