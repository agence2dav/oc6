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

/* base.html.twig */
class __TwigTemplate_05c4784e54957d6978be56c66839a175 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'importmap' => [$this, 'block_importmap'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
        
        <!-- 
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/5/cerulean/bootstrap.min.css\"> 
        -->
        <!--
        -->
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/5/darkly/bootstrap.min.css\">

        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css\">
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css\">
        <!--
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_assets/css/custom.min.css\">
        -->
        
        <style>
            body {
                background-image: linear-gradient(to top,#6f93ca,#0567ff8c);
                background-size: cover;
                background-repeat:no-repeat;
                background-attachment:fixed;}
            content{ display:block; width:80%; margin:0 auto;}
            .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
            .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
        </style>
        
        <!-- Global Site Tag (gtag.js) - Google Analytics
        <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-KGDJBEFF3W\"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KGDJBEFF3W');
        </script> -->

        ";
        // line 43
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 45
        echo "
        ";
        // line 46
        $this->displayBlock('javascripts', $context, $blocks);
        // line 49
        echo "    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg bg-primary\" data-bs-theme=\"dark\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand\" href=\"/\">Surf</a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                    <a class=\"nav-link active\" href=\"";
        // line 60
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        echo "\">Home
                        <span class=\"visually-hidden\">(current)</span>
                    </a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
        // line 65
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tricks");
        echo "\">Tricks</a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
        // line 68
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("new_trick");
        echo "\">New trick</a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/about\">About</a>
                    </li>
                    <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle show\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dropdown</a>
                    <div class=\"dropdown-menu\">
                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"#\">Separated link</a>
                    </div>
                    </li>
                </ul>
                <form class=\"d-flex\">
                    <input class=\"form-control me-sm-2\" type=\"search\" placeholder=\"Search\">
                    <button class=\"btn btn-secondary my-2 my-sm-0\" type=\"submit\">Search</button>
                </form>
                </div>
            </div>
    </nav>
    <content>
        ";
        // line 92
        $this->displayBlock('body', $context, $blocks);
        // line 93
        echo "    </content>
    </body>
    
    <script async src=\"https://cdn.carbonads.com/carbon.js?serve=CKYIE23N&placement=bootswatchcom\" id=\"_carbonads_js\"></script>
    <script src=\"https://cdn.carbonads.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdn.carbonads.com/_vendor/prismjs/prism.js\" data-manual></script>
    <script src=\"https://cdn.carbonads.com/_assets/js/custom.js\"></script>

</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 43
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 44
        echo "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 46
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 47
        echo "            ";
        $this->displayBlock('importmap', $context, $blocks);
        // line 48
        echo "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 47
    public function block_importmap($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "importmap"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "importmap"));

        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\ImportMapRuntime')->importmap("app");
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 92
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  258 => 92,  239 => 47,  229 => 48,  226 => 47,  216 => 46,  206 => 44,  196 => 43,  177 => 5,  158 => 93,  156 => 92,  129 => 68,  123 => 65,  115 => 60,  102 => 49,  100 => 46,  97 => 45,  95 => 43,  54 => 5,  48 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/favicon.ico\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
        
        <!-- 
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/5/cerulean/bootstrap.min.css\"> 
        -->
        <!--
        -->
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/5/darkly/bootstrap.min.css\">

        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_vendor/bootstrap-icons/font/bootstrap-icons.min.css\">
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_vendor/prismjs/themes/prism-okaidia.css\">
        <!--
        <link rel=\"stylesheet\" href=\"https://bootswatch.com/_assets/css/custom.min.css\">
        -->
        
        <style>
            body {
                background-image: linear-gradient(to top,#6f93ca,#0567ff8c);
                background-size: cover;
                background-repeat:no-repeat;
                background-attachment:fixed;}
            content{ display:block; width:80%; margin:0 auto;}
            .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
            .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
        </style>
        
        <!-- Global Site Tag (gtag.js) - Google Analytics
        <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-KGDJBEFF3W\"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KGDJBEFF3W');
        </script> -->

        {% block stylesheets %}
        {% endblock %}

        {% block javascripts %}
            {% block importmap %}{{ importmap('app') }}{% endblock %}
        {% endblock %}
    </head>
    <body>
        <nav class=\"navbar navbar-expand-lg bg-primary\" data-bs-theme=\"dark\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand\" href=\"/\">Surf</a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
                <ul class=\"navbar-nav me-auto\">
                    <li class=\"nav-item\">
                    <a class=\"nav-link active\" href=\"{{ path(\"app_home\") }}\">Home
                        <span class=\"visually-hidden\">(current)</span>
                    </a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ path(\"tricks\") }}\">Tricks</a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ path(\"new_trick\") }}\">New trick</a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/about\">About</a>
                    </li>
                    <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle show\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Dropdown</a>
                    <div class=\"dropdown-menu\">
                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"#\">Separated link</a>
                    </div>
                    </li>
                </ul>
                <form class=\"d-flex\">
                    <input class=\"form-control me-sm-2\" type=\"search\" placeholder=\"Search\">
                    <button class=\"btn btn-secondary my-2 my-sm-0\" type=\"submit\">Search</button>
                </form>
                </div>
            </div>
    </nav>
    <content>
        {% block body %}{% endblock %}
    </content>
    </body>
    
    <script async src=\"https://cdn.carbonads.com/carbon.js?serve=CKYIE23N&placement=bootswatchcom\" id=\"_carbonads_js\"></script>
    <script src=\"https://cdn.carbonads.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdn.carbonads.com/_vendor/prismjs/prism.js\" data-manual></script>
    <script src=\"https://cdn.carbonads.com/_assets/js/custom.js\"></script>

</html>
", "base.html.twig", "C:\\Users\\dav\\Documents\\srv\\gits\\oc6\\templates\\base.html.twig");
    }
}
