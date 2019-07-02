<?php

/* Category/show.html */
class __TwigTemplate_d9504f36dd115244e04ae0743278c3144931156f9b5d4c7ec5a08c0a23450111 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_global/index.html", "Category/show.html", 1);
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
        echo "    <ul>
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["auctionsInCategory"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["auction"]) {
            // line 6
            echo "        <li class=\"auction\">
            <a href=\"/tairApp/auction/";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "auction_id", array()), "html", null, true);
            echo "\" class=\"auction-title\">
                ";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "title", array()));
            echo "
            </a>
            
            <span class=\"auction-date1\">";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "starts_at", array()));
            echo "</span>
            <span class=\"auction-date2\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "ends_at", array()));
            echo "</span>
            <span class=\"auction-price\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "starting_price", array()));
            echo " &euro;</span>
            
            <a href=\"/tairApp/auction/";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "auction_id", array()), "html", null, true);
            echo "\">
                <img src=\"#\" alt=\"Velika slika - ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "auction_id", array()), "html", null, true);
            echo "\" class=\"auction-big-image\">
            </a>
            
            <img src=\"#\" alt=\"Mala slika 1 - ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "auction_id", array()), "html", null, true);
            echo "\" class=\"auction-small-image-1\">
            <img src=\"#\" alt=\"Mala slika 2 - ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["auction"], "auction_id", array()), "html", null, true);
            echo "\" class=\"auction-small-image-2\">
        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['auction'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </ul>
";
    }

    // line 26
    public function block_naslov($context, array $blocks = array())
    {
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute(($context["category"] ?? null), "name", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "Category/show.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 27,  93 => 26,  88 => 23,  79 => 20,  75 => 19,  69 => 16,  65 => 15,  60 => 13,  56 => 12,  52 => 11,  46 => 8,  42 => 7,  39 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Category/show.html", "C:\\wamp64\\www\\tairApp\\Views\\Category\\show.html");
    }
}
