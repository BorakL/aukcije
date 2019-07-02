<?php

/* _global/index.html */
class __TwigTemplate_b43da04039ec450fcf9505f936aa15d2e8b02e9807aabb442e73bf0a99ac7ddf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'naslov' => array($this, 'block_naslov'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head>
        <title>Ta&amp;Ta - ";
        // line 3
        $this->displayBlock('naslov', $context, $blocks);
        echo "</title>
        <meta>
        <link rel=\"stylesheet\" href=\"/tairapp/assets/css/main.css\" >
    </head>
    <body>
        <header class=\"site-header\">
            <div class=\"banners\">
                <a href=\"/\" class=\"banner\">
                    <img src=\"/assets/img/banner-1.jpg\" alt=\"Banner\">
                </a>
            </div>
            <div class=\"social-icons\">
                <a href=\"#\"><img src=\"/assets/img/social/linkedin.png\" alt=\"Li\"></a>
                <a href=\"#\"><img src=\"/assets/img/social/facebook.png\" alt=\"Fb\"></a>
                <a href=\"#\"><img src=\"/assets/img/social/twitter.png\" alt=\"Tw\"></a>
                <a href=\"#\"><img src=\"/assets/img/social/google-plus.png\" alt=\"Gp\"></a>
                <a href=\"#\"><img src=\"/assets/img/social/youtube.png\" alt=\"YT\"></a>
            </div>
            <div class=\"search-box\">
                <form method=\"post\" action=\"/search\">
                    <input type=\"text\" name=\"q\" placeholder=\"kljucne reci pretrage\">
                    <button type=\"submit\">Search</button>
                </form>
            </div>
            <nav id=\"main-menu\">
                <ul>
                    <li><a href=\"/tairApp\"> Pocetna </a></li>
                    <li><a href=\"/tairApp/category\"> Kategorije </a></li>
                    <li><a href=\"/profile\"> Profil </a></li>
                    <li><a href=\"/contact\"> Kontakt </a></li>
                    <li><a href=\"/log-out\"> Odjava </a></li>
                </ul>
            </nav>

        </header>
        <main>
            ";
        // line 39
        $this->displayBlock('main', $context, $blocks);
        // line 41
        echo "        </main>
        <footer class=\"site-footer\">&copy; 2018 - Aukcijska kuca Ta&amp;Ta</footer>
    </body>
</html>";
    }

    // line 3
    public function block_naslov($context, array $blocks = array())
    {
        echo " Pocetna ";
    }

    // line 39
    public function block_main($context, array $blocks = array())
    {
        // line 40
        echo "            ";
    }

    public function getTemplateName()
    {
        return "_global/index.html";
    }

    public function getDebugInfo()
    {
        return array (  82 => 40,  79 => 39,  73 => 3,  66 => 41,  64 => 39,  25 => 3,  21 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_global/index.html", "C:\\wamp64\\www\\tairApp\\Views\\_global\\index.html");
    }
}
