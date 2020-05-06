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

/* pagination.html */
class __TwigTemplate_3813fd243e9d39965e2df84ae82baae43d806f64345cc210bceb926b415fe6bf extends \Twig\Template
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
        echo "
 \t<a href=\"#\" onclick=\"jumpto(); return false;\" title=\"";
        // line 2
        echo $this->extensions['phpbb\template\twig\extension']->lang("JUMP_TO_PAGE_CLICK");
        echo "\">";
        echo ($context["PAGE_NUMBER"] ?? null);
        echo "</a> &bull; 
\t<ul>
\t";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["pagination"]) {
            // line 5
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_PREV", [], "any", false, false, false, 5)) {
                echo "<li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 5);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("PREVIOUS");
                echo "</a></li>
\t\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 6
$context["pagination"], "S_IS_CURRENT", [], "any", false, false, false, 6)) {
                echo "<li class=\"active\"><span>";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 6);
                echo "</span></li>
\t\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 7
$context["pagination"], "S_IS_ELLIPSIS", [], "any", false, false, false, 7)) {
                echo "<li class=\"ellipsis\"><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("ELLIPSIS");
                echo "</span></li>
\t\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 8
$context["pagination"], "S_IS_NEXT", [], "any", false, false, false, 8)) {
                echo "<li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 8);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("NEXT");
                echo "</a></li>
\t\t";
            } else {
                // line 9
                echo "<li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 9);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 9);
                echo "</a></li>
\t\t";
            }
            // line 11
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagination'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "\t</ul>
";
    }

    public function getTemplateName()
    {
        return "pagination.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 12,  89 => 11,  81 => 9,  72 => 8,  66 => 7,  60 => 6,  51 => 5,  47 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pagination.html", "");
    }
}
