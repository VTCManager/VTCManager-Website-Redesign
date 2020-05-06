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

/* ucp_avatar_options_upload.html */
class __TwigTemplate_fdf93a9305b73359411da887c33cdb58730421db954172538ef128b9a7d15139 extends \Twig\Template
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
        echo "<dl>
\t<dt><label for=\"avatar_upload_file\">";
        // line 2
        echo $this->extensions['phpbb\template\twig\extension']->lang("UPLOAD_AVATAR_FILE");
        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
        echo "</label></dt>
\t<dd><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"";
        // line 3
        echo ($context["AVATAR_UPLOAD_SIZE"] ?? null);
        echo "\" /><input type=\"file\" name=\"avatar_upload_file\" id=\"avatar_upload_file\" class=\"inputbox autowidth\" accept=\"";
        echo ($context["AVATAR_ALLOWED_EXTENSIONS"] ?? null);
        echo "\" /></dd>
</dl>

";
        // line 6
        if (($context["S_UPLOAD_AVATAR_URL"] ?? null)) {
            // line 7
            echo "\t<dl>
\t\t<dt><label for=\"avatar_upload_url\">";
            // line 8
            echo $this->extensions['phpbb\template\twig\extension']->lang("UPLOAD_AVATAR_URL");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</label><br /><span>";
            echo $this->extensions['phpbb\template\twig\extension']->lang("UPLOAD_AVATAR_URL_EXPLAIN");
            echo "</span></dt>
\t\t<dd><input type=\"url\" name=\"avatar_upload_url\" id=\"avatar_upload_url\" value=\"\" class=\"inputbox\" /></dd>
\t</dl>
";
        }
    }

    public function getTemplateName()
    {
        return "ucp_avatar_options_upload.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 8,  55 => 7,  53 => 6,  45 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ucp_avatar_options_upload.html", "");
    }
}
