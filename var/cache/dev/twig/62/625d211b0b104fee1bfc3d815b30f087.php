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

/* home/create.html.twig */
class __TwigTemplate_f3c8a67cbb9bcad68d9be45708e55885 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/create.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/create.html.twig"));

        // line 2
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 2, $this->source); })()), ["bootstrap_4_layout.html.twig"], true);
        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "home/create.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "New Post";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "
    <h1>New Post</h1>

    ";
        // line 10
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 10, $this->source); })()), 'form_start');
        echo "

    ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 12, $this->source); })()), "title", [], "any", false, false, false, 12), 'row', ["attr" => ["placeholder" => "Titre"]]);
        echo "
    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 13, $this->source); })()), "content", [], "any", false, false, false, 13), 'row', ["attr" => ["placeholder" => "Contenu"]]);
        echo "
    ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 14, $this->source); })()), "image", [], "any", false, false, false, 14), 'row', ["attr" => ["placeholder" => "Image (Url)"]]);
        echo "

    <button type=\"submit\" class=\"btn btn-success\">
        ";
        // line 17
        if (((isset($context["edit_mode"]) || array_key_exists("edit_mode", $context) ? $context["edit_mode"] : (function () { throw new RuntimeError('Variable "edit_mode" does not exist.', 17, $this->source); })()) == true)) {
            // line 18
            echo "        Modifier
        ";
        } else {
            // line 20
            echo "        Enregistrer
        ";
        }
        // line 22
        echo "    </button>

    ";
        // line 24
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formTrick"]) || array_key_exists("formTrick", $context) ? $context["formTrick"] : (function () { throw new RuntimeError('Variable "formTrick" does not exist.', 24, $this->source); })()), 'form_end');
        echo "

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "home/create.html.twig";
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
        return array (  129 => 24,  125 => 22,  121 => 20,  117 => 18,  115 => 17,  109 => 14,  105 => 13,  101 => 12,  96 => 10,  91 => 7,  81 => 6,  62 => 4,  51 => 1,  49 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% form_theme formTrick 'bootstrap_4_layout.html.twig' %}

{% block title %}New Post{% endblock %}

{% block body %}

    <h1>New Post</h1>

    {{ form_start(formTrick) }}

    {{ form_row(formTrick.title, {\"attr\":{\"placeholder\":\"Titre\"}}) }}
    {{ form_row(formTrick.content, {\"attr\":{\"placeholder\":\"Contenu\"}}) }}
    {{ form_row(formTrick.image, {\"attr\":{\"placeholder\":\"Image (Url)\"}}) }}

    <button type=\"submit\" class=\"btn btn-success\">
        {% if edit_mode == true %}
        Modifier
        {% else %}
        Enregistrer
        {% endif %}
    </button>

    {{ form_end(formTrick) }}

{% endblock %}
", "home/create.html.twig", "C:\\Users\\dav\\Documents\\srv\\gits\\oc6\\templates\\home\\create.html.twig");
    }
}
