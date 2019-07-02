<?php

/* Auction/show.html */
class __TwigTemplate_65356712876513e564ef136d9238af71d732689b0ddcbfc106dc1bbd41074f94 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html", "Auction/show.html", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
            'naslov' => array($this, 'block_naslov'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "_global/index.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["auction"] ?? null), "title", array()));
        echo "</h1>   
    <p>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["auction"] ?? null), "description", array()), "html", null, true);
        echo "</p>
    <p>Pocetna cena: ";
        // line 6
        echo twig_escape_filter($this->env, ($context["lastOfferPrice"] ?? null), "html", null, true);
        echo " EUR</p>
    <p>Datum pocetka: ";
        // line 7
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["auction"] ?? null), "starts_at", array()), "j.n.Y"), "html", null, true);
        echo "</p>
    <p>Datum zavrsetka: ";
        // line 8
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute(($context["auction"] ?? null), "ends_at", array()), "j.n.Y"), "html", null, true);
        echo "</p>
";
    }

    // line 11
    public function block_naslov($context, array $blocks = array())
    {
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["auction"] ?? null), "title", array()));
        echo "
";
    }

    public function getTemplateName()
    {
        return "Auction/show.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 12,  55 => 11,  49 => 8,  45 => 7,  41 => 6,  37 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Auction/show.html", "C:\\wamp64\\www\\tairApp\\Views\\Auction\\show.html");
    }
}
