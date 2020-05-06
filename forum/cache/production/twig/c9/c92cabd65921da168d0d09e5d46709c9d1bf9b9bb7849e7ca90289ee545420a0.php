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

/* ucp_profile_signature.html */
class __TwigTemplate_feede89784989a948676358bb91ef0452ae7fe7474cfe46a98ec24023d2d3031 extends \Twig\Template
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
        $this->loadTemplate("ucp_header.html", "ucp_profile_signature.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<form id=\"postform\" method=\"post\" action=\"";
        // line 3
        echo ($context["S_UCP_ACTION"] ?? null);
        echo "\"";
        echo ($context["S_FORM_ENCTYPE"] ?? null);
        echo ">

<h2>";
        // line 5
        echo $this->extensions['phpbb\template\twig\extension']->lang("TITLE");
        echo "</h2>

";
        // line 7
        if ((($context["SIGNATURE_PREVIEW"] ?? null) != "")) {
            // line 8
            echo "\t<div class=\"panel\">
\t\t<div class=\"inner\">
\t\t<h3>";
            // line 10
            echo $this->extensions['phpbb\template\twig\extension']->lang("SIGNATURE_PREVIEW");
            echo "</h3>
\t\t<div class=\"postbody\">
\t\t\t<div class=\"signature standalone\">";
            // line 12
            echo ($context["SIGNATURE_PREVIEW"] ?? null);
            echo "</div>
\t\t</div>
\t\t</div>
\t</div>
";
        }
        // line 17
        echo "
<div class=\"panel\">
\t<div class=\"inner\">

\t<p>";
        // line 21
        echo $this->extensions['phpbb\template\twig\extension']->lang("SIGNATURE_EXPLAIN");
        echo "</p>

\t";
        // line 23
        $value = 1;
        $context['definition']->set('SIG_EDIT', $value);
        // line 24
        echo "\t";
        $location = "posting_editor.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("posting_editor.html", "ucp_profile_signature.html", 24)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 25
        echo "\t<h3>";
        echo $this->extensions['phpbb\template\twig\extension']->lang("OPTIONS");
        echo "</h3>
\t<fieldset>
\t\t";
        // line 27
        // line 28
        echo "\t\t";
        if (($context["S_BBCODE_ALLOWED"] ?? null)) {
            // line 29
            echo "\t\t\t<div><label for=\"disable_bbcode\"><input type=\"checkbox\" name=\"disable_bbcode\" id=\"disable_bbcode\"";
            echo ($context["S_BBCODE_CHECKED"] ?? null);
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("DISABLE_BBCODE");
            echo "</label></div>
\t\t";
        }
        // line 31
        echo "\t\t";
        if (($context["S_SMILIES_ALLOWED"] ?? null)) {
            // line 32
            echo "\t\t\t<div><label for=\"disable_smilies\"><input type=\"checkbox\" name=\"disable_smilies\" id=\"disable_smilies\"";
            echo ($context["S_SMILIES_CHECKED"] ?? null);
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("DISABLE_SMILIES");
            echo "</label></div>
\t\t";
        }
        // line 34
        echo "\t\t";
        if (($context["S_LINKS_ALLOWED"] ?? null)) {
            // line 35
            echo "\t\t\t<div><label for=\"disable_magic_url\"><input type=\"checkbox\" name=\"disable_magic_url\" id=\"disable_magic_url\"";
            echo ($context["S_MAGIC_URL_CHECKED"] ?? null);
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("DISABLE_MAGIC_URL");
            echo "</label></div>
\t\t";
        }
        // line 37
        echo "
\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 44
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "
\t<input type=\"reset\" name=\"reset\" value=\"";
        // line 45
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
        echo "\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"preview\" value=\"";
        // line 46
        echo $this->extensions['phpbb\template\twig\extension']->lang("PREVIEW");
        echo "\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 47
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 48
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>
</form>

";
        // line 52
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_profile_signature.html", 52)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_profile_signature.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 52,  175 => 48,  171 => 47,  167 => 46,  163 => 45,  159 => 44,  150 => 37,  142 => 35,  139 => 34,  131 => 32,  128 => 31,  120 => 29,  117 => 28,  116 => 27,  110 => 25,  97 => 24,  94 => 23,  89 => 21,  83 => 17,  75 => 12,  70 => 10,  66 => 8,  64 => 7,  59 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_profile_signature.html", "");
    }
}
