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

/* user_welcome.txt */
class __TwigTemplate_626a1dd75d9c2a105045cce4d2a90797b54872a49fcc8cc971395276db034dfe extends \Twig\Template
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
        echo "Subject: Willkommen auf „";
        echo ($context["SITENAME"] ?? null);
        echo "“

";
        // line 3
        echo ($context["WELCOME_MSG"] ?? null);
        echo "

Bitte bewahre diese E-Mail in deinen Unterlagen auf. Die Daten deines Benutzerkontos lauten:

----------------------------
Benutzername: ";
        // line 8
        echo ($context["USERNAME"] ?? null);
        echo "

Board-URL:    ";
        // line 10
        echo ($context["U_BOARD"] ?? null);
        echo "
----------------------------

Dein Passwort wurde sicher in unserer Datenbank gespeichert und kann nicht wiederhergestellt werden. Falls es vergessen werden sollte, kannst du es über die E-Mail-Adresse, die deinem Benutzerkonto zugeordnet ist, zurücksetzen lassen.

Vielen Dank für deine Registrierung.

";
        // line 17
        echo ($context["EMAIL_SIG"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "user_welcome.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 17,  56 => 10,  51 => 8,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user_welcome.txt", "");
    }
}
