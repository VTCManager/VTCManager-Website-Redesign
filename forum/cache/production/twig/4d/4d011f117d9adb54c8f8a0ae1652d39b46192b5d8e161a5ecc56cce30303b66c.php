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

/* confirm_body.html */
class __TwigTemplate_27daab3cb6a9da9b08806d1f274412d4ea332fd2f13c461586d8a4eb214bff33 extends \Twig\Template
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
        if (($context["S_AJAX_REQUEST"] ?? null)) {
            // line 2
            echo "
\t<h3>";
            // line 3
            echo ($context["MESSAGE_TITLE"] ?? null);
            echo "</h3>
\t<p>";
            // line 4
            echo ($context["MESSAGE_TEXT"] ?? null);
            echo "</p>

\t<fieldset class=\"submit-buttons\">
\t\t<input type=\"button\" name=\"confirm\" value=\"";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "\" class=\"button2\" />&nbsp;
\t\t<input type=\"button\" name=\"cancel\" value=\"";
            // line 8
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "\" class=\"button2\" />
\t</fieldset>

";
        } else {
            // line 12
            echo "
";
            // line 13
            $location = "overall_header.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_header.html", "confirm_body.html", 13)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 14
            echo "
<form id=\"confirm\" method=\"post\" action=\"";
            // line 15
            echo ($context["S_CONFIRM_ACTION"] ?? null);
            echo "\">

<fieldset>
\t<h1>";
            // line 18
            echo ($context["MESSAGE_TITLE"] ?? null);
            echo "</h1>
\t<p>";
            // line 19
            echo ($context["MESSAGE_TEXT"] ?? null);
            echo "</p>

\t";
            // line 21
            echo ($context["S_HIDDEN_FIELDS"] ?? null);
            echo "

\t<div style=\"text-align: center;\">
\t\t<input type=\"submit\" name=\"confirm\" value=\"";
            // line 24
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "\" class=\"button2\" />&nbsp; 
\t\t<input type=\"submit\" name=\"cancel\" value=\"";
            // line 25
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "\" class=\"button2\" />
\t</div>

</fieldset>
</form>

";
            // line 31
            $location = "overall_footer.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->loadTemplate("overall_footer.html", "confirm_body.html", 31)->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
        }
    }

    public function getTemplateName()
    {
        return "confirm_body.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 31,  106 => 25,  102 => 24,  96 => 21,  91 => 19,  87 => 18,  81 => 15,  78 => 14,  66 => 13,  63 => 12,  56 => 8,  52 => 7,  46 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "confirm_body.html", "");
    }
}
