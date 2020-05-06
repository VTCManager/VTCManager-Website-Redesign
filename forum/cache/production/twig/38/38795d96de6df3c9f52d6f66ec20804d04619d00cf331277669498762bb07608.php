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

/* ucp_prefs_view.html */
class __TwigTemplate_d97a1fb6454870c2147684f693ba65c68db82a1cf3034cc333ce48daf2b44505 extends \Twig\Template
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
        $this->loadTemplate("ucp_header.html", "ucp_prefs_view.html", 1)->display($context);
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

\t\t<fieldset>
\t\t";
        // line 11
        if (($context["ERROR"] ?? null)) {
            echo "<p class=\"error\">";
            echo ($context["ERROR"] ?? null);
            echo "</p>";
        }
        // line 12
        echo "\t\t";
        // line 13
        echo "\t\t<dl>
\t\t\t<dt><label for=\"images1\">";
        // line 14
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_IMAGES");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label for=\"images1\"><input type=\"radio\" name=\"images\" id=\"images1\" value=\"1\"";
        // line 16
        if (($context["S_IMAGES"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
        echo "</label>
\t\t\t\t<label for=\"images0\"><input type=\"radio\" name=\"images\" id=\"images0\" value=\"0\"";
        // line 17
        if ( !($context["S_IMAGES"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"flash0\">";
        // line 21
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_FLASH");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label for=\"flash1\"><input type=\"radio\" name=\"flash\" id=\"flash1\" value=\"1\"";
        // line 23
        if (($context["S_FLASH"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
        echo "</label>
\t\t\t\t<label for=\"flash0\"><input type=\"radio\" name=\"flash\" id=\"flash0\" value=\"0\"";
        // line 24
        if ( !($context["S_FLASH"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"smilies1\">";
        // line 28
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_SMILIES");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label for=\"smilies1\"><input type=\"radio\" name=\"smilies\" id=\"smilies1\" value=\"1\"";
        // line 30
        if (($context["S_SMILIES"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
        echo "</label>
\t\t\t\t<label for=\"smilies0\"><input type=\"radio\" name=\"smilies\" id=\"smilies0\" value=\"0\"";
        // line 31
        if ( !($context["S_SMILIES"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"sigs1\">";
        // line 35
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_SIGS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label for=\"sigs1\"><input type=\"radio\" name=\"sigs\" id=\"sigs1\" value=\"1\"";
        // line 37
        if (($context["S_SIGS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
        echo "</label>
\t\t\t\t<label for=\"sigs0\"><input type=\"radio\" name=\"sigs\" id=\"sigs0\" value=\"0\"";
        // line 38
        if ( !($context["S_SIGS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"avatars1\">";
        // line 42
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_AVATARS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>
\t\t\t\t<label for=\"avatars1\"><input type=\"radio\" name=\"avatars\" id=\"avatars1\" value=\"1\"";
        // line 44
        if (($context["S_AVATARS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
        echo "</label>
\t\t\t\t<label for=\"avatars0\"><input type=\"radio\" name=\"avatars\" id=\"avatars0\" value=\"0\"";
        // line 45
        if ( !($context["S_AVATARS"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " /> ";
        echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
        echo "</label>
\t\t\t</dd>
\t\t</dl>
\t\t";
        // line 48
        if (($context["S_CHANGE_CENSORS"] ?? null)) {
            // line 49
            echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"wordcensor1\">";
            // line 50
            echo $this->extensions['phpbb\template\twig\extension']->lang("DISABLE_CENSORS");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label></dt>
\t\t\t\t<dd>
\t\t\t\t\t<label for=\"wordcensor1\"><input type=\"radio\" name=\"wordcensor\" id=\"wordcensor1\" value=\"1\"";
            // line 52
            if (($context["S_DISABLE_CENSORS"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("YES");
            echo "</label>
\t\t\t\t\t<label for=\"wordcensor0\"><input type=\"radio\" name=\"wordcensor\" id=\"wordcensor0\" value=\"0\"";
            // line 53
            if ( !($context["S_DISABLE_CENSORS"] ?? null)) {
                echo " checked=\"checked\"";
            }
            echo " /> ";
            echo $this->extensions['phpbb\template\twig\extension']->lang("NO");
            echo "</label>
\t\t\t\t</dd>
\t\t\t</dl>
\t\t";
        }
        // line 57
        echo "\t\t";
        // line 58
        echo "\t\t<hr />
\t\t";
        // line 59
        // line 60
        echo "\t\t<dl>
\t\t\t<dt><label>";
        // line 61
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_TOPICS_DAYS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 62
        echo ($context["S_TOPIC_SORT_DAYS"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label>";
        // line 65
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_TOPICS_KEY");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 66
        echo ($context["S_TOPIC_SORT_KEY"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label>";
        // line 69
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_TOPICS_DIR");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 70
        echo ($context["S_TOPIC_SORT_DIR"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t<hr />
\t\t<dl>
\t\t\t<dt><label>";
        // line 74
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_POSTS_DAYS");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 75
        echo ($context["S_POST_SORT_DAYS"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label>";
        // line 78
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_POSTS_KEY");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 79
        echo ($context["S_POST_SORT_KEY"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label>";
        // line 82
        echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_POSTS_DIR");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t\t\t<dd>";
        // line 83
        echo ($context["S_POST_SORT_DIR"] ?? null);
        echo "</dd>
\t\t</dl>
\t\t";
        // line 85
        // line 86
        echo "\t\t</fieldset>

\t</div>
</div>

<fieldset class=\"submit-buttons\">
\t";
        // line 92
        echo ($context["S_HIDDEN_FIELDS"] ?? null);
        echo "<input type=\"reset\" value=\"";
        echo $this->extensions['phpbb\template\twig\extension']->lang("RESET");
        echo "\" name=\"reset\" class=\"button2\" />&nbsp;
\t<input type=\"submit\" name=\"submit\" value=\"";
        // line 93
        echo $this->extensions['phpbb\template\twig\extension']->lang("SUBMIT");
        echo "\" class=\"button1\" />
\t";
        // line 94
        echo ($context["S_FORM_TOKEN"] ?? null);
        echo "
</fieldset>
</form>

";
        // line 98
        $location = "ucp_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("ucp_footer.html", "ucp_prefs_view.html", 98)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "ucp_prefs_view.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 98,  327 => 94,  323 => 93,  317 => 92,  309 => 86,  308 => 85,  303 => 83,  298 => 82,  292 => 79,  287 => 78,  281 => 75,  276 => 74,  269 => 70,  264 => 69,  258 => 66,  253 => 65,  247 => 62,  242 => 61,  239 => 60,  238 => 59,  235 => 58,  233 => 57,  222 => 53,  214 => 52,  208 => 50,  205 => 49,  203 => 48,  193 => 45,  185 => 44,  179 => 42,  168 => 38,  160 => 37,  154 => 35,  143 => 31,  135 => 30,  129 => 28,  118 => 24,  110 => 23,  104 => 21,  93 => 17,  85 => 16,  79 => 14,  76 => 13,  74 => 12,  68 => 11,  59 => 5,  52 => 3,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_prefs_view.html", "");
    }
}
