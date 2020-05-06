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

/* ucp_register.html */
class __TwigTemplate_5cf31a05fe2a13f15c7afca05c4fff1c36e38f88a32860f1024f62bbde2b3857 extends \Twig\Template
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
        $this->loadTemplate("overall_header.html", "ucp_register.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<script>
\t/**
\t* Change language
\t*/
\tfunction change_language(lang_iso)
\t{
\t\tdocument.cookie = '";
        // line 9
        echo ($context["COOKIE_NAME"] ?? null);
        echo "_lang=' + lang_iso + '; path=";
        echo ($context["COOKIE_PATH"] ?? null);
        echo "';
\t\tdocument.forms['register'].change_lang.value = lang_iso;
\t\tdocument.forms['register'].submit.click();
\t}
</script>

";
        // line 15
        if (($context["PROVIDER_TEMPLATE_FILE"] ?? null)) {
            // line 16
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">

\t\t\t<h2>";
            // line 19
            echo ($context["SITENAME"] ?? null);
            echo " - ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("OAUTH_REGISTRATION");
            echo "</h2>

\t\t\t";
            // line 21
            $this->loadTemplate(($context["PROVIDER_TEMPLATE_FILE"] ?? null), "ucp_register.html", 21)->display($context);
            // line 22
            echo "\t\t</div>
\t</div>
";
        }
        // line 25
        echo "
<form id=\"register\" method=\"post\" action=\"";
        // line 26
        echo ($context["S_UCP_ACTION"] ?? null);
        echo "\"";
        echo ($context["S_FORM_ENCTYPE"] ?? null);
        echo ">

<div class=\"panel\">
\t<div class=\"inner\">

\t<h2>";
        // line 31
        echo ($context["SITENAME"] ?? null);
        echo " - ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("REGISTRATION");
        echo "</h2>

\t<fieldset class=\"fields2\">
\t";
        // line 34
        if (($context["ERROR"] ?? null)) {
            echo "<dl><dd class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</dd></dl>";
        }
        // line 35
        echo "\t";
        if (($context["L_REG_COND"] ?? null)) {
            // line 36
            echo "\t\t<dl><dd><strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("REG_COND");
            echo "</strong></dd></dl>
\t";
        }
        // line 38
        echo "\t";
        // line 39
        echo "\t<dl>
\t\t<dt><label for=\"username\">";
        // line 40
        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME_EXPLAIN");
        echo "</span></dt>
\t\t<dd><input type=\"text\" tabindex=\"1\" name=\"username\" id=\"username\" size=\"25\" value=\"";
        // line 41
        echo ($context["USERNAME"] ?? null);
        echo "\" class=\"inputbox autowidth\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
        echo "\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"email\">";
        // line 44
        echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_ADDRESS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t<dd><input type=\"email\" tabindex=\"2\" name=\"email\" id=\"email\" size=\"25\" maxlength=\"100\" value=\"";
        // line 45
        echo ($context["EMAIL"] ?? null);
        echo "\" class=\"inputbox autowidth\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_ADDRESS");
        echo "\" autocomplete=\"off\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"new_password\">";
        // line 48
        echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("PASSWORD_EXPLAIN");
        echo "</span></dt>
\t\t<dd><input type=\"password\" tabindex=\"4\" name=\"new_password\" id=\"new_password\" size=\"25\" value=\"";
        // line 49
        echo ($context["PASSWORD"] ?? null);
        echo "\" class=\"inputbox autowidth\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NEW_PASSWORD");
        echo "\" autocomplete=\"off\" /></dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"password_confirm\">";
        // line 52
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t<dd><input type=\"password\"  tabindex=\"5\" name=\"password_confirm\" id=\"password_confirm\" size=\"25\" value=\"";
        // line 53
        echo ($context["PASSWORD_CONFIRM"] ?? null);
        echo "\" class=\"inputbox autowidth\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD");
        echo "\" autocomplete=\"off\" /></dd>
\t</dl>

\t";
        // line 56
        // line 57
        echo "\t<hr />

\t";
        // line 59
        // line 60
        echo "\t<dl>
\t\t<dt><label for=\"lang\">";
        // line 61
        echo $this->extensions['phpbb\template\twig\extension']->lang("LANGUAGE");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t<dd><select name=\"lang\" id=\"lang\" onchange=\"change_language(this.value); return false;\" tabindex=\"6\" title=\"";
        // line 62
        echo $this->extensions['phpbb\template\twig\extension']->lang("LANGUAGE");
        echo "\">";
        echo ($context["S_LANG_OPTIONS"] ?? null);
        echo "</select></dd>
\t</dl>

\t";
        // line 65
        $location = "timezone_option.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("timezone_option.html", "ucp_register.html", 65)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 66
        echo "
\t";
        // line 67
        // line 68
        echo "\t";
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "profile_fields", [], "any", false, false, false, 68))) {
            // line 69
            echo "\t\t<dl><dd><strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("ITEMS_REQUIRED");
            echo "</strong></dd></dl>

\t";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "profile_fields", [], "any", false, false, false, 71));
            foreach ($context['_seq'] as $context["_key"] => $context["profile_fields"]) {
                // line 72
                echo "\t\t<dl>
\t\t\t<dt><label";
                // line 73
                if (twig_get_attribute($this->env, $this->source, $context["profile_fields"], "FIELD_ID", [], "any", false, false, false, 73)) {
                    echo " for=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["profile_fields"], "FIELD_ID", [], "any", false, false, false, 73);
                    echo "\"";
                }
                echo ">";
                echo twig_get_attribute($this->env, $this->source, $context["profile_fields"], "LANG_NAME", [], "any", false, false, false, 73);
                echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                if (twig_get_attribute($this->env, $this->source, $context["profile_fields"], "S_REQUIRED", [], "any", false, false, false, 73)) {
                    echo " *";
                }
                echo "</label>
\t\t\t";
                // line 74
                if (twig_get_attribute($this->env, $this->source, $context["profile_fields"], "LANG_EXPLAIN", [], "any", false, false, false, 74)) {
                    echo "<br /><span>";
                    echo twig_get_attribute($this->env, $this->source, $context["profile_fields"], "LANG_EXPLAIN", [], "any", false, false, false, 74);
                    echo "</span>";
                }
                // line 75
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["profile_fields"], "ERROR", [], "any", false, false, false, 75)) {
                    echo "<br /><span class=\"error\">";
                    echo twig_get_attribute($this->env, $this->source, $context["profile_fields"], "ERROR", [], "any", false, false, false, 75);
                    echo "</span>";
                }
                echo "</dt>
\t\t\t<dd>";
                // line 76
                echo twig_get_attribute($this->env, $this->source, $context["profile_fields"], "FIELD", [], "any", false, false, false, 76);
                echo "</dd>
\t\t</dl>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['profile_fields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "\t";
        }
        // line 80
        echo "
\t";
        // line 81
        // line 82
        echo "\t</fieldset>
\t</div>
</div>
";
        // line 85
        if (($context["CAPTCHA_TEMPLATE"] ?? null)) {
            // line 86
            echo "\t";
            $value = 8;
            $context['definition']->set('CAPTCHA_TAB_INDEX', $value);
            // line 87
            echo "\t";
            $location = (("" . ($context["CAPTCHA_TEMPLATE"] ?? null)) . "");
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate((("" . ($context["CAPTCHA_TEMPLATE"] ?? null)) . ""), "ucp_register.html", 87)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
        // line 89
        echo "
";
        // line 90
        if (($context["S_COPPA"] ?? null)) {
            // line 91
            echo "<div class=\"panel\">
\t<div class=\"inner\">

\t<h4>";
            // line 94
            echo $this->extensions['phpbb\template\twig\extension']->lang("COPPA_COMPLIANCE");
            echo "</h4>

\t<p>";
            // line 96
            echo $this->extensions['phpbb\template\twig\extension']->lang("COPPA_EXPLAIN");
            echo "</p>
\t</div>
</div>
";
        }
        // line 100
        echo "
";
        // line 101
        // line 102
        echo "
<div class=\"panel\">
\t<div class=\"inner\">

\t<fieldset class=\"submit-buttons\">
\t\t";
        // line 107
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "
\t\t<input type=\"reset\" value=\"";
        // line 108
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t\t<input type=\"submit\" tabindex=\"9\" name=\"submit\" id=\"submit\" value=\"";
        // line 109
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" class=\"button1 default-submit-action\" />
\t\t";
        // line 110
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
\t</fieldset>

\t</div>
</div>
</form>

";
        // line 117
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "ucp_register.html", 117)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  366 => 117,  356 => 110,  352 => 109,  348 => 108,  344 => 107,  337 => 102,  336 => 101,  333 => 100,  326 => 96,  321 => 94,  316 => 91,  314 => 90,  311 => 89,  297 => 87,  293 => 86,  291 => 85,  286 => 82,  285 => 81,  282 => 80,  279 => 79,  270 => 76,  261 => 75,  255 => 74,  241 => 73,  238 => 72,  234 => 71,  228 => 69,  225 => 68,  224 => 67,  221 => 66,  209 => 65,  201 => 62,  196 => 61,  193 => 60,  192 => 59,  188 => 57,  187 => 56,  179 => 53,  174 => 52,  166 => 49,  159 => 48,  151 => 45,  146 => 44,  138 => 41,  131 => 40,  128 => 39,  126 => 38,  120 => 36,  117 => 35,  111 => 34,  103 => 31,  93 => 26,  90 => 25,  85 => 22,  83 => 21,  76 => 19,  71 => 16,  69 => 15,  58 => 9,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_register.html", "");
    }
}
