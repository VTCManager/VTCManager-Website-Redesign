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

/* ucp_profile_reg_details.html */
class __TwigTemplate_09df824ed329181283698143a37b82c8de96f9d427231918a46da78f8d66164d extends \Twig\Template
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
        $this->loadTemplate("ucp_header.html", "ucp_profile_reg_details.html", 1)->display($context);
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

\t";
        // line 9
        if (($context["S_FORCE_PASSWORD"] ?? null)) {
            // line 10
            echo "\t\t<p class=\"error\">";
            echo $this->extensions['phpbb\template\twig\extension']->lang("FORCE_PASSWORD_EXPLAIN");
            echo "</p>
\t";
        }
        // line 12
        echo "
\t<fieldset>
\t";
        // line 14
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 15
        echo "\t";
        // line 16
        echo "\t<dl>
\t\t<dt><label ";
        // line 17
        if (($context["S_CHANGE_USERNAME"] ?? null)) {
            echo "for=\"username\"";
        }
        echo ">";
        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME_EXPLAIN");
        echo "</span></dt>
\t\t<dd>";
        // line 18
        if (($context["S_CHANGE_USERNAME"] ?? null)) {
            echo "<input type=\"text\" name=\"username\" id=\"username\" value=\"";
            echo ($context["USERNAME"] ?? null);
            echo "\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
            echo "\" />";
        } else {
            echo "<strong>";
            echo ($context["USERNAME"] ?? null);
            echo "</strong>";
        }
        echo "</dd>
\t</dl>
\t<dl>
\t\t<dt><label for=\"email\">";
        // line 21
        echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_ADDRESS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t<dd>";
        // line 22
        if (($context["S_CHANGE_EMAIL"] ?? null)) {
            echo "<input type=\"email\" name=\"email\" id=\"email\" maxlength=\"100\" value=\"";
            echo ($context["EMAIL"] ?? null);
            echo "\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("EMAIL_ADDRESS");
            echo "\" autocomplete=\"off\" />";
        } else {
            echo "<strong>";
            echo ($context["EMAIL"] ?? null);
            echo "</strong>";
        }
        echo "</dd>
\t</dl>
\t";
        // line 24
        if (($context["S_CHANGE_PASSWORD"] ?? null)) {
            // line 25
            echo "\t\t<dl>
\t\t\t<dt><label for=\"new_password\">";
            // line 26
            echo $this->extensions['phpbb\template\twig\extension']->lang("NEW_PASSWORD");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("CHANGE_PASSWORD_EXPLAIN");
            echo "</span></dt>
\t\t\t<dd><input type=\"password\" name=\"new_password\" id=\"new_password\" maxlength=\"255\" value=\"";
            // line 27
            echo ($context["NEW_PASSWORD"] ?? null);
            echo "\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("CHANGE_PASSWORD");
            echo "\" autocomplete=\"off\" /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"password_confirm\">";
            // line 30
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD_EXPLAIN");
            echo "</span></dt>
\t\t\t<dd><input type=\"password\" name=\"password_confirm\" id=\"password_confirm\" maxlength=\"255\" value=\"";
            // line 31
            echo ($context["PASSWORD_CONFIRM"] ?? null);
            echo "\" class=\"inputbox\" title=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_PASSWORD");
            echo "\" autocomplete=\"off\" /></dd>
\t\t</dl>
\t";
        }
        // line 34
        echo "\t";
        // line 35
        echo "\t</fieldset>
\t</div>
</div>

<div class=\"panel\">
\t<div class=\"inner\">

\t<fieldset>
\t<dl>
\t\t<dt><label for=\"cur_password\">";
        // line 44
        echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_PASSWORD");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        if (($context["S_CHANGE_PASSWORD"] ?? null)) {
            echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_CHANGE_PASSWORD_EXPLAIN");
        } else {
            echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_PASSWORD_EXPLAIN");
        }
        echo "</span></dt>
\t\t<dd><input type=\"password\" name=\"cur_password\" id=\"cur_password\" maxlength=\"255\" value=\"";
        // line 45
        echo ($context["CUR_PASSWORD"] ?? null);
        echo "\" class=\"inputbox\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("CURRENT_PASSWORD");
        echo "\" autocomplete=\"off\" /></dd>
\t</dl>
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 53
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"reset\" value=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 54
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 55
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>
</form>

";
        // line 59
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_profile_reg_details.html", 59)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_profile_reg_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 59,  218 => 55,  214 => 54,  208 => 53,  195 => 45,  184 => 44,  173 => 35,  171 => 34,  163 => 31,  156 => 30,  148 => 27,  141 => 26,  138 => 25,  136 => 24,  121 => 22,  116 => 21,  100 => 18,  89 => 17,  86 => 16,  84 => 15,  78 => 14,  74 => 12,  68 => 10,  66 => 9,  59 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_profile_reg_details.html", "");
    }
}
