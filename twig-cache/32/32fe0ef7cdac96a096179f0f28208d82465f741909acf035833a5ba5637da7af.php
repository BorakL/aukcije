<?php

/* Proba/primer.html */
class __TwigTemplate_68ec87130037094b3144f6a1902c227628ee0ae79612912552df603972022630 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Ovo je Proba</h1>";
    }

    public function getTemplateName()
    {
        return "Proba/primer.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Proba/primer.html", "C:\\wamp64\\www\\tairApp\\Views\\Proba\\primer.html");
    }
}
