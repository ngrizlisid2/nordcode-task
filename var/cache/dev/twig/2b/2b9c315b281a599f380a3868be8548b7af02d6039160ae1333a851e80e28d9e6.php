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

/* task/task_form.html.twig */
class __TwigTemplate_c938b7b8c323cede42839db61738f9fccd1fc776131e2177deb9c0f05f16357a extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/task_form.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "task/task_form.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "task new ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    ";
        if (array_key_exists("error_text", $context)) {
            // line 7
            echo "        ";
            echo twig_escape_filter($this->env, (isset($context["error_text"]) || array_key_exists("error_text", $context) ? $context["error_text"] : (function () { throw new RuntimeError('Variable "error_text" does not exist.', 7, $this->source); })()), "html", null, true);
            echo "
    ";
        }
        // line 9
        echo "    <form method=\"post\">
        <h1 class=\"h3 mb-3 font-weight-normal\">Create new task</h1>

        <label for=\"inputTitle\">Title</label>
        <input type=\"text\" value=\"\" name=\"title\" id=\"inputTitle\" class=\"form-control\" required autofocus>
        <br>
        <label for=\"inputComment\">Comment</label>
        <textarea name=\"comment\" id=\"inputComment\" class=\"form-control\"></textarea>
        <br>
        <label for=\"inputDate\">Date</label>
        <input type=\"date\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" name=\"date\" id=\"inputDate\" class=\"form-control\" required>
        <br>
        <label for=\"inputTimeSpent\">Time Spent</label>
        <input type=\"number\" value=\"0\" name=\"time_spent\" id=\"inputTimeSpent\" class=\"form-control\" required>
        <br>
        <button class=\"btn btn-lg btn-primary\" type=\"submit\">
            create
        </button>
    </form>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "task/task_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 19,  82 => 9,  76 => 7,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

 {% block title %}task new {% endblock %}

{% block body %}
    {% if error_text is defined %}
        {{ error_text }}
    {% endif %}
    <form method=\"post\">
        <h1 class=\"h3 mb-3 font-weight-normal\">Create new task</h1>

        <label for=\"inputTitle\">Title</label>
        <input type=\"text\" value=\"\" name=\"title\" id=\"inputTitle\" class=\"form-control\" required autofocus>
        <br>
        <label for=\"inputComment\">Comment</label>
        <textarea name=\"comment\" id=\"inputComment\" class=\"form-control\"></textarea>
        <br>
        <label for=\"inputDate\">Date</label>
        <input type=\"date\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" name=\"date\" id=\"inputDate\" class=\"form-control\" required>
        <br>
        <label for=\"inputTimeSpent\">Time Spent</label>
        <input type=\"number\" value=\"0\" name=\"time_spent\" id=\"inputTimeSpent\" class=\"form-control\" required>
        <br>
        <button class=\"btn btn-lg btn-primary\" type=\"submit\">
            create
        </button>
    </form>
{% endblock %}", "task/task_form.html.twig", "/var/www/symfony_docker/templates/task/task_form.html.twig");
    }
}
