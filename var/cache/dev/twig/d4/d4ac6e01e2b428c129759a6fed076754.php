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
            <div class=\"metadata\">Rédigé par : ";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 12, $this->source); })()), "username", [], "any", false, false, false, 12), "html", null, true);
        echo "</div>
            <div class=\"metadata\">Mis à jour le : ";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 13, $this->source); })()), "updatedAt", [], "any", false, false, false, 13), "d/m/Y"), "html", null, true);
        echo "</div>
            ";
        // line 14
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDIT")) {
            // line 15
            echo "                <div class=\"btn btn-secondary\"><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit_trick", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15)]), "html", null, true);
            echo "\"><i class=\"bi bi-pencil\"></i> Editer</a></div>
            ";
        }
        // line 17
        echo "            ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 18
            echo "                <div class=\"btn btn-secondary\"><a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("edit_trick", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18)]), "html", null, true);
            echo "\"><i class=\"bi bi-eraser\"></i> Delete</a></div>
            ";
        }
        // line 20
        echo "        </div>
        <div class=\"card-boby\">
        <div class=\"image\">
            <img src=\"";
        // line 23
        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 23, $this->source); })()), "image", [], "any", false, false, false, 23);
        echo "\" width=\"100%\"/>
        </div>
        <div class=\"content\">
            <div class=\"text-body-primary\">";
        // line 26
        echo twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 26, $this->source); })()), "content", [], "any", false, false, false, 26);
        echo "</div>
        </div>
    </article>

    <h3>Commentaires</h3>

    ";
        // line 32
        if (((isset($context["justCommented"]) || array_key_exists("justCommented", $context) ? $context["justCommented"] : (function () { throw new RuntimeError('Variable "justCommented" does not exist.', 32, $this->source); })()) == true)) {
            // line 33
            echo "    <div class=\"alert alert-success mb-3\">
        <div>Merci pour votre commentaire. Il sera publié après validation.</div>
        <a class=\"btn btn-primmary\" href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_trick", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 35, $this->source); })()), "slug", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">Retour</a> 
    </div>
    ";
        } else {
            // line 38
            echo "
        ";
            // line 39
            if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 39, $this->source); })()), "user", [], "any", false, false, false, 39)) {
                // line 40
                echo "        <div class=\"form-floating mb-3 alert alert-primary\">
            ";
                // line 41
                echo                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 41, $this->source); })()), 'form_start');
                echo "
            ";
                // line 42
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 42, $this->source); })()), "content", [], "any", false, false, false, 42), 'row', ["attr" => ["placeholder" => "Comentaire...", "class" => "form-control"]]);
                echo "
            <button type=\"submit\" class=\"btn btn-success\">Envoyer</button>
            ";
                // line 44
                echo                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["formComment"]) || array_key_exists("formComment", $context) ? $context["formComment"] : (function () { throw new RuntimeError('Variable "formComment" does not exist.', 44, $this->source); })()), 'form_end');
                echo "
        </div>

        ";
            } else {
                // line 48
                echo "            <div class=\"text-body-primary alert alert-primary\">
            Vous devez être logué pour poster un commentaire.
        ";
                // line 53
                echo "            <a class=\"nav-link\" href=\"/login?_target_path=/trick/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 53, $this->source); })()), "slug", [], "any", false, false, false, 53), "html", null, true);
                echo "\">Connexion</a> 
            </div>
        ";
            }
            // line 56
            echo "    ";
        }
        // line 57
        echo "
    ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["trick"]) || array_key_exists("trick", $context) ? $context["trick"] : (function () { throw new RuntimeError('Variable "trick" does not exist.', 58, $this->source); })()), "comments", [], "any", false, false, false, 58));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 59
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["comment"], "status", [], "any", false, false, false, 59) == 1)) {
                // line 60
                echo "
    <section class=\"card text-white bg-primary mb-3\">
        <div class=\"card-header\">
            <strong>";
                // line 63
                echo twig_get_attribute($this->env, $this->source, $context["comment"], "username", [], "any", false, false, false, 63);
                echo "</strong>
            <div class=\"metadata\">";
                // line 64
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "date", [], "any", false, false, false, 64), "d/m/Y H:i"), "html", null, true);
                echo "</div>
        </div>
        <div class=\"card-boby\">
            <div class=\"content\">
                <div class=\"text-body-primary\">";
                // line 68
                echo twig_get_attribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 68);
                echo "</div>
            </div>
        </div>
    </section>
    ";
            }
            // line 73
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
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
        return array (  234 => 74,  228 => 73,  220 => 68,  213 => 64,  209 => 63,  204 => 60,  201 => 59,  197 => 58,  194 => 57,  191 => 56,  184 => 53,  180 => 48,  173 => 44,  168 => 42,  164 => 41,  161 => 40,  159 => 39,  156 => 38,  150 => 35,  146 => 33,  144 => 32,  135 => 26,  129 => 23,  124 => 20,  118 => 18,  115 => 17,  109 => 15,  107 => 14,  103 => 13,  99 => 12,  95 => 11,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
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
            <div class=\"metadata\">Rédigé par : {{ trick.username }}</div>
            <div class=\"metadata\">Mis à jour le : {{ trick.updatedAt | date(\"d/m/Y\") }}</div>
            {% if is_granted('ROLE_EDIT') %}
                <div class=\"btn btn-secondary\"><a href=\"{{ path(\"edit_trick\", {id: trick.id}) }}\"><i class=\"bi bi-pencil\"></i> Editer</a></div>
            {% endif %}
            {% if is_granted('ROLE_ADMIN') %}
                <div class=\"btn btn-secondary\"><a href=\"{{ path(\"edit_trick\", {id: trick.id}) }}\"><i class=\"bi bi-eraser\"></i> Delete</a></div>
            {% endif %}
        </div>
        <div class=\"card-boby\">
        <div class=\"image\">
            <img src=\"{{ trick.image | raw}}\" width=\"100%\"/>
        </div>
        <div class=\"content\">
            <div class=\"text-body-primary\">{{ trick.content | raw}}</div>
        </div>
    </article>

    <h3>Commentaires</h3>

    {% if justCommented == true %}
    <div class=\"alert alert-success mb-3\">
        <div>Merci pour votre commentaire. Il sera publié après validation.</div>
        <a class=\"btn btn-primmary\" href=\"{{ path(\"show_trick\", {\"slug\": trick.slug }) }}\">Retour</a> 
    </div>
    {% else %}

        {% if app.user %}
        <div class=\"form-floating mb-3 alert alert-primary\">
            {{ form_start(formComment) }}
            {{ form_row(formComment.content, {\"attr\":{\"placeholder\":\"Comentaire...\", \"class\":\"form-control\"}}) }}
            <button type=\"submit\" class=\"btn btn-success\">Envoyer</button>
            {{ form_end(formComment) }}
        </div>

        {% else %}
            <div class=\"text-body-primary alert alert-primary\">
            Vous devez être logué pour poster un commentaire.
        {#
        <a class=\"nav-link\" href=\"{{ path(\"app_login2\", {\"slug\": trick.slug }) }}\">Connexion</a> 
        #}
            <a class=\"nav-link\" href=\"/login?_target_path=/trick/{{ trick.slug }}\">Connexion</a> 
            </div>
        {% endif %}
    {% endif %}

    {% for comment in trick.comments %}
    {% if comment.status == 1 %}

    <section class=\"card text-white bg-primary mb-3\">
        <div class=\"card-header\">
            <strong>{{ comment.username | raw}}</strong>
            <div class=\"metadata\">{{ comment.date | date(\"d/m/Y H:i\") }}</div>
        </div>
        <div class=\"card-boby\">
            <div class=\"content\">
                <div class=\"text-body-primary\">{{ comment.content | raw}}</div>
            </div>
        </div>
    </section>
    {% endif %}
    {% endfor %}

</div>
{% endblock %}
", "home/trick.html.twig", "C:\\Users\\dav\\Documents\\srv\\gits\\oc6\\templates\\home\\trick.html.twig");
    }
}
