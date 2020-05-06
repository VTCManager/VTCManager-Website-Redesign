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

/* ucp_avatar_options.html */
class __TwigTemplate_5e28f3ae330fdbc9960f655e5b5c4a495f521045db1b32d4823788c0792c6c7d extends \Twig\Template
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
        echo "<div class=\"panel\">
\t<div class=\"inner\">
\t";
        // line 3
        if ( !($context["S_AVATARS_ENABLED"] ?? null)) {
            // line 4
            echo "\t\t<p>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_FEATURES_DISABLED");
            echo "</p>
\t";
        }
        // line 6
        echo "
\t<fieldset>
\t";
        // line 8
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 9
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 10
        echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_IMAGE");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_EXPLAIN");
        echo "</span></dt>
\t\t\t<dd>";
        // line 11
        if (($context["AVATAR"] ?? null)) {
            echo ($context["AVATAR"] ?? null);
        } else {
            echo "<img src=\"";
            echo ($context["T_THEME_PATH"] ?? null);
            echo "/images/no_avatar.gif\" alt=\"\" />";
        }
        echo "</dd>
\t\t\t<dd><label for=\"avatar_delete\"><input type=\"checkbox\" name=\"avatar_delete\" id=\"avatar_delete\" /> ";
        // line 12
        echo $this->extensions['phpbb\template\twig\extension']->lang("DELETE_AVATAR");
        echo "</label></dd>
\t\t</dl>
\t</fieldset>
\t<h3>";
        // line 15
        echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_SELECT");
        echo "</h3>
\t<fieldset>
\t\t<dl>
\t\t\t<dt><label>";
        // line 18
        echo $this->extensions['phpbb\template\twig\extension']->lang("AVATAR_TYPE");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd><select name=\"avatar_driver\" id=\"avatar_driver\" data-togglable-settings=\"true\">
\t\t\t\t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "avatar_drivers", [], "any", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
            // line 21
            echo "\t\t\t\t<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 21);
            echo "\"";
            if (twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "SELECTED", [], "any", false, false, false, 21)) {
                echo " selected=\"selected\"";
            }
            echo " data-toggle-setting=\"#avatar_option_";
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 21);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "L_TITLE", [], "any", false, false, false, 21);
            echo "</option>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t\t</select></dd>
\t\t</dl>
\t</fieldset>
\t<div id=\"avatar_options\">
";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "avatar_drivers", [], "any", false, false, false, 27));
        foreach ($context['_seq'] as $context["_key"] => $context["avatar_drivers"]) {
            // line 28
            echo "\t<div id=\"avatar_option_";
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "DRIVER", [], "any", false, false, false, 28);
            echo "\">
\t<noscript>
\t<h3 class=\"avatar_section_header\">";
            // line 30
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "L_TITLE", [], "any", false, false, false, 30);
            echo "</h3>
\t</noscript>
\t<p>";
            // line 32
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "L_EXPLAIN", [], "any", false, false, false, 32);
            echo "</p>

\t<fieldset>
\t";
            // line 35
            echo twig_get_attribute($this->env, $this->source, $context["avatar_drivers"], "OUTPUT", [], "any", false, false, false, 35);
            echo "
\t</fieldset>
\t</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avatar_drivers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "\t</div>
";
        // line 40
        if ( !($context["S_GROUP_MANAGE"] ?? null)) {
            // line 41
            echo "\t<fieldset class=\"submit-buttons\">
\t\t<input type=\"reset\" value=\"";
            // line 42
            echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
            echo "\" name=\"reset\" class=\"button2\" /> &nbsp;
\t\t<input type=\"submit\" name=\"submit\" value=\"";
            // line 43
            echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t</fieldset>
";
        }
        // line 46
        echo "\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "ucp_avatar_options.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 46,  167 => 43,  163 => 42,  160 => 41,  158 => 40,  155 => 39,  145 => 35,  139 => 32,  134 => 30,  128 => 28,  124 => 27,  118 => 23,  101 => 21,  97 => 20,  91 => 18,  85 => 15,  79 => 12,  69 => 11,  62 => 10,  59 => 9,  53 => 8,  49 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_avatar_options.html", "");
    }
}
