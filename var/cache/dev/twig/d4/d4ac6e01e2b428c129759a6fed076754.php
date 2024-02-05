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

/* home/trick.html.twig */
class __TwigTemplate_e192a5f8e17f0e2bba6228514f4038c3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/trick.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/trick.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/trick.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<div class=\"example-wrapper\">

    <article class=\"card border-light mb-3\">
        <div class=\"card-header\">
            <h1>";
        // line 11
        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 11, $this->source); })()), "title", [], "any", false, false, false, 11);
        echo "</h1>
            <div class=\"metadata\">";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 12, $this->source); })()), "createdAt", [], "any", false, false, false, 12), "d/m/Y"), "html", null, true);
        echo "</div>
        </div>
        <div class=\"card-boby\">
        <div class=\"image\">
            <img src=\"";
        // line 16
        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 16, $this->source); })()), "image", [], "any", false, false, false, 16);
        echo "\"/>
        </div>
        <div class=\"content\">
            <div class=\"text-body-primary\">";
        // line 19
        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 19, $this->source); })()), "content", [], "any", false, false, false, 19);
        echo "</div>
        </div>
    </article>

    <h3>Commentaires</h3>

    ";
        // line 25
        if (((isset($context["justCommented"]) || array_key_exists("justCommented", $context) ? $context["justCommented"] : (function () { throw new RuntimeError('Variable "justCommented" does not exist.', 25, $this->source); })()) == true)) {
            // line 26
            echo "    <div class=\"alert alert-primary\">Merci pour votre commentaire. Il sera publié après validation.</div>
    ";
        } else {
            // line 28
            echo "    <div class=\"form-floating mb-3 alert alert-primary\">
        ";
            // line 29
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 29, $this->source); })()), 'form_start');
            echo "
        ";
            // line 30
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 30, $this->source); })()), "content", [], "any", false, false, false, 30), 'row', ["attr" => ["placeholder" => "Contenu", "class" => "form-control"]]);
            echo "
        <button type=\"submit\" class=\"btn btn-success\">Envoyer</button>
        ";
            // line 32
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 32, $this->source); })()), 'form_end');
            echo "
    </div>
    ";
        }
        // line 35
        echo "
    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 36, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 37
            echo "    <section class=\"card text-white bg-secondary mb-3\">
        <div class=\"card-header\">
            <strong>";
            // line 39
            echo twig_get_attribute($this->env, $this->source, $context["comment"], "name", [], "any", false, false, false, 39);
            echo "</strong>
            <div class=\"metadata\">";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "date", [], "any", false, false, false, 40), "d/m/Y"), "html", null, true);
            echo "</div>
        </div>
        <div class=\"card-boby\">
            <div class=\"content\">
                <div class=\"text-body-primary\">";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 44);
            echo "</div>
            </div>
        </div>
    </section>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "home/trick.html.twig";
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
        return array (  178 => 49,  167 => 44,  160 => 40,  156 => 39,  152 => 37,  148 => 36,  145 => 35,  139 => 32,  134 => 30,  130 => 29,  127 => 28,  123 => 26,  121 => 25,  112 => 19,  106 => 16,  99 => 12,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ trick.title | raw}}{% endblock %}

{% block body %}

<div class=\"example-wrapper\">

    <article class=\"card border-light mb-3\">
        <div class=\"card-header\">
            <h1>{{ trick.title | raw}}</h1>
            <div class=\"metadata\">{{ trick.createdAt | date(\"d/m/Y\") }}</div>
        </div>
        <div class=\"card-boby\">
        <div class=\"image\">
            <img src=\"{{ trick.image | raw}}\"/>
        </div>
        <div class=\"content\">
            <div class=\"text-body-primary\">{{ trick.content | raw}}</div>
        </div>
    </article>

    <h3>Commentaires</h3>

    {% if justCommented == true %}
    <div class=\"alert alert-primary\">Merci pour votre commentaire. Il sera publié après validation.</div>
    {% else %}
    <div class=\"form-floating mb-3 alert alert-primary\">
        {{ form_start(formComment) }}
        {{ form_row(formComment.content, {\"attr\":{\"placeholder\":\"Contenu\", \"class\":\"form-control\"}}) }}
        <button type=\"submit\" class=\"btn btn-success\">Envoyer</button>
        {{ form_end(formComment) }}
    </div>
    {% endif %}

    {% for comment in comments %}
    <section class=\"card text-white bg-secondary mb-3\">
        <div class=\"card-header\">
            <strong>{{ comment.name | raw}}</strong>
            <div class=\"metadata\">{{ comment.date | date(\"d/m/Y\") }}</div>
        </div>
        <div class=\"card-boby\">
            <div class=\"content\">
                <div class=\"text-body-primary\">{{ comment.content | raw}}</div>
            </div>
        </div>
    </section>
    {% endfor %}

</div>
{% endblock %}
", "home/trick.html.twig", "C:\\Users\\dav\\Documents\\srv\\gits\\oc6\\templates\\home\\trick.html.twig");
    }
}
