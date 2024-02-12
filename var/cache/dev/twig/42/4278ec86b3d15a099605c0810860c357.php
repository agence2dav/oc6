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
            content{ display:block; margin:40px;}
            article{ display:block; margin:0px;}
            section{ display:block; margin:0px;}
            .example-wrapper { margin: 1em auto; width: 95%; font: 18px/1.5 sans-serif; }
            .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
            .image{margin-bottom:20px;}
            .content{padding:20px;}
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
        // line 47
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 49
        echo "
        ";
        // line 50
        $this->displayBlock('javascripts', $context, $blocks);
        // line 53
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
        // line 64
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        echo "\">Home
                        <span class=\"visually-hidden\">(current)</span>
                    </a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
        // line 69
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        echo "\">Tricks</a>
                    </li>
                    
                    ";
        // line 72
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 73
            echo "                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
            // line 74
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("new_trick");
            echo "\">New trick</a>
                    </li>
                    ";
        }
        // line 77
        echo "
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/about\">About</a>
                    </li>
                    ";
        // line 81
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 81, $this->source); })()), "user", [], "any", false, false, false, 81)) {
            // line 82
            echo "                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
            // line 83
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            echo "\">Connexion</a>
                    </li>
                    ";
        } else {
            // line 86
            echo "                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"";
            // line 87
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            echo "\">Déconnexion</a>
                    </li>
                    ";
        }
        // line 90
        echo "                    <li class=\"nav-item dropdown\">
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
        // line 109
        $this->displayBlock('body', $context, $blocks);
        // line 110
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

    // line 47
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 48
        echo "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 50
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 51
        echo "            ";
        $this->displayBlock('importmap', $context, $blocks);
        // line 52
        echo "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 51
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

    // line 109
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
        return array (  293 => 109,  274 => 51,  264 => 52,  261 => 51,  251 => 50,  241 => 48,  231 => 47,  212 => 5,  193 => 110,  191 => 109,  170 => 90,  164 => 87,  161 => 86,  155 => 83,  152 => 82,  150 => 81,  144 => 77,  138 => 74,  135 => 73,  133 => 72,  127 => 69,  119 => 64,  106 => 53,  104 => 50,  101 => 49,  99 => 47,  54 => 5,  48 => 1,);
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
            content{ display:block; margin:40px;}
            article{ display:block; margin:0px;}
            section{ display:block; margin:0px;}
            .example-wrapper { margin: 1em auto; width: 95%; font: 18px/1.5 sans-serif; }
            .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
            .image{margin-bottom:20px;}
            .content{padding:20px;}
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
                    <a class=\"nav-link\" href=\"{{ path(\"app_home\") }}\">Tricks</a>
                    </li>
                    
                    {% if is_granted('ROLE_ADMIN') %}
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ path(\"new_trick\") }}\">New trick</a>
                    </li>
                    {% endif %}

                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"/about\">About</a>
                    </li>
                    {% if not app.user %}
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ path(\"app_login\") }}\">Connexion</a>
                    </li>
                    {% else %}
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"{{ path(\"app_logout\") }}\">Déconnexion</a>
                    </li>
                    {% endif %}
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
