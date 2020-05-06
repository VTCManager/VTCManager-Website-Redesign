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

/* ucp_zebra_friends.html */
class __TwigTemplate_17e62d9ec535bfbf30e10a49f40da9995783f88e4dabf390b4dd8b2200bece49 extends \Twig\Template
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
        $this->loadTemplate("ucp_header.html", "ucp_zebra_friends.html", 1)->display($context);
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
        // line 10
        echo $this->extensions['phpbb\template\twig\extension']->lang("FRIENDS_EXPLAIN");
        echo "</p>

\t<fieldset class=\"fields2\">
\t";
        // line 13
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 14
        echo "\t";
        // line 15
        echo "\t<dl>
\t\t<dt><label ";
        // line 16
        if (($context["S_USERNAME_OPTIONS"] ?? null)) {
            echo "for=\"usernames\"";
        }
        echo ">";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YOUR_FRIENDS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YOUR_FRIENDS_EXPLAIN");
        echo "</span></dt>
\t\t<dd>
\t\t\t";
        // line 18
        if (($context["S_USERNAME_OPTIONS"] ?? null)) {
            // line 19
            echo "\t\t\t\t<select name=\"usernames[]\" id=\"usernames\" multiple=\"multiple\" size=\"5\">";
            echo ($context["S_USERNAME_OPTIONS"] ?? null);
            echo "</select>
\t\t\t";
        } else {
            // line 21
            echo "\t\t\t\t<strong>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO_FRIENDS");
            echo "</strong>
\t\t\t";
        }
        // line 23
        echo "\t\t</dd>
\t</dl>
\t";
        // line 25
        // line 26
        echo "\t<dl>
\t\t<dt><label for=\"add\">";
        // line 27
        echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_FRIENDS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label><br /><span>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("ADD_FRIENDS_EXPLAIN");
        echo "</span></dt>
\t\t<dd><textarea name=\"add\" id=\"add\" rows=\"3\" cols=\"30\" class=\"inputbox\">";
        // line 28
        echo ($context["USERNAMES"] ?? null);
        echo "</textarea></dd>
\t\t<dd><strong><a href=\"";
        // line 29
        echo ($context["U_FIND_USERNAME"] ?? null);
        echo "\" onclick=\"find_username(this.href); return false;\">";
        echo $this->extensions['phpbb\template\twig\extension']->lang("FIND_USERNAME");
        echo "</a></strong></dd>
\t</dl>
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 37
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"reset\" value=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 38
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 39
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>
</form>

";
        // line 43
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_zebra_friends.html", 43)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_zebra_friends.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 43,  152 => 39,  148 => 38,  142 => 37,  129 => 29,  125 => 28,  118 => 27,  115 => 26,  114 => 25,  110 => 23,  104 => 21,  98 => 19,  96 => 18,  84 => 16,  81 => 15,  79 => 14,  73 => 13,  67 => 10,  59 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_zebra_friends.html", "");
    }
}
