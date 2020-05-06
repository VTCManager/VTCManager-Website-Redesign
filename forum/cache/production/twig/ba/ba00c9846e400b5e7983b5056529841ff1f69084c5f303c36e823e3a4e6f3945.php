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

/* captcha_default.html */
class __TwigTemplate_0d752b408f31fc82005049a2538c322fd37c2c1304f22b643b29c8b5bf6f090d extends \Twig\Template
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
        if ((($context["S_TYPE"] ?? null) == 1)) {
            // line 2
            echo "<div class=\"panel captcha-panel\">
\t<div class=\"inner\">

\t<h3 class=\"captcha-title\">";
            // line 5
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRMATION");
            echo "</h3>
\t<p>";
            // line 6
            echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_EXPLAIN");
            echo "</p>

\t<fieldset class=\"fields2\">
";
        }
        // line 10
        echo "
\t<dl>
\t\t<dt><label for=\"confirm_code\">";
        // line 12
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_CODE");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t<dd class=\"captcha captcha-image\"><img src=\"";
        // line 13
        echo ($context["CONFIRM_IMAGE_LINK"] ?? null);
        echo "\" alt=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_CODE");
        echo "\" /></dd>
\t\t<dd><input type=\"text\" name=\"confirm_code\" id=\"confirm_code\" size=\"8\" maxlength=\"8\" tabindex=\"";
        // line 14
        echo twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "CAPTCHA_TAB_INDEX", [], "any", false, false, false, 14);
        echo "\" class=\"inputbox narrow\" title=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_CODE");
        echo "\" />
\t\t";
        // line 15
        if (($context["S_CONFIRM_REFRESH"] ?? null)) {
            echo "<input type=\"submit\" name=\"refresh_vc\" id=\"refresh_vc\" class=\"button2\" value=\"";
            echo $this->extensions['phpbb\template\twig\extension']->lang("VC_REFRESH");
            echo "\" />";
        }
        // line 16
        echo "\t\t<input type=\"hidden\" name=\"confirm_id\" id=\"confirm_id\" value=\"";
        echo ($context["CONFIRM_ID"] ?? null);
        echo "\" /></dd>
\t\t<dd>";
        // line 17
        echo $this->extensions['phpbb\template\twig\extension']->lang("CONFIRM_CODE_EXPLAIN");
        echo "</dd>
\t</dl>

";
        // line 20
        if ((($context["S_TYPE"] ?? null) == 1)) {
            // line 21
            echo "\t</fieldset>
\t</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "captcha_default.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 21,  93 => 20,  87 => 17,  82 => 16,  76 => 15,  70 => 14,  64 => 13,  59 => 12,  55 => 10,  48 => 6,  44 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "captcha_default.html", "");
    }
}
