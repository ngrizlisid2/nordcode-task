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

/* task/tasks_list.html.twig */
class __TwigTemplate_5a02f66d89e2643b8ffd1f6ff8ba6a6ad8fa51b74446fcc3794dcce63cffacc2 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/tasks_list.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "task/tasks_list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo " tasks ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "     <div>
         <a href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("new_task_page");
        echo "\" class=\"btn btn-primary btn-lg square\" role=\"button\">new task</a>
     </div>
     <div>
         <form class=\"form-group\" action=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tasks_csv");
        echo "\" method=\"get\" target=\"_blank\">
             <label for=\"inputDateFrom\">Date from</label>
             <input type=\"date\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" name=\"date_from\" id=\"inputDateFrom\" class=\"form-control\" required>
             <br>
             <label for=\"inputDateTo\">Date to</label>
             <input type=\"date\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y-m-d"), "html", null, true);
        echo "\" name=\"date_to\" id=\"inputDateTo\" class=\"form-control\" required>
             <button class=\"btn btn-lg btn-primary\" type=\"submit\">
                 get csv
             </button>
         </form>
     </div>

     <div>
         ";
        // line 23
        if ((twig_length_filter($this->env, (isset($context["tasks"]) || array_key_exists("tasks", $context) ? $context["tasks"] : (function () { throw new RuntimeError('Variable "tasks" does not exist.', 23, $this->source); })())) > 0)) {
            // line 24
            echo "             <table style=\"width:50%\">
                 <tr>
                     <th>id</th>
                     <th>title</th>
                     <th>date</th>
                     <th>time spent min.</th>
                 </tr>
                 ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) || array_key_exists("tasks", $context) ? $context["tasks"] : (function () { throw new RuntimeError('Variable "tasks" does not exist.', 31, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
                // line 32
                echo "                     <tr>
                         <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getId", [], "any", false, false, false, 33), "html", null, true);
                echo "</td>
                         <td>";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getTitle", [], "any", false, false, false, 34), "html", null, true);
                echo "</td>
                         <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getDate", [], "any", false, false, false, 35), "Y-m-d"), "html", null, true);
                echo "</td>
                         <td>";
                // line 36
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getTimeSpent", [], "any", false, false, false, 36), "html", null, true);
                echo "</td>
                     </tr>
                 ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "             </table>
         ";
        } else {
            // line 41
            echo "             there are no tasks
         ";
        }
        // line 43
        echo "     </div>
     <div>
         ";
        // line 45
        if (((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 45, $this->source); })()) > 1)) {
            // line 46
            echo "         <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_tasks_page");
            echo "?page=";
            echo twig_escape_filter($this->env, ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 46, $this->source); })()) - 1), "html", null, true);
            echo "\" class=\"btn btn-primary btn-lg square\" role=\"button\">prev page</a>
         ";
        }
        // line 48
        echo "         &nbsp;<a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_tasks_page");
        echo "?page=";
        echo twig_escape_filter($this->env, ((isset($context["page"]) || array_key_exists("page", $context) ? $context["page"] : (function () { throw new RuntimeError('Variable "page" does not exist.', 48, $this->source); })()) + 1), "html", null, true);
        echo "\" class=\"btn btn-primary btn-lg square\" role=\"button\">next page</a>
     </div>

 ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "task/tasks_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 48,  157 => 46,  155 => 45,  151 => 43,  147 => 41,  143 => 39,  134 => 36,  130 => 35,  126 => 34,  122 => 33,  119 => 32,  115 => 31,  106 => 24,  104 => 23,  93 => 15,  87 => 12,  82 => 10,  76 => 7,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

 {% block title %} tasks {% endblock %}

 {% block body %}
     <div>
         <a href=\"{{ path('new_task_page') }}\" class=\"btn btn-primary btn-lg square\" role=\"button\">new task</a>
     </div>
     <div>
         <form class=\"form-group\" action=\"{{ path('tasks_csv') }}\" method=\"get\" target=\"_blank\">
             <label for=\"inputDateFrom\">Date from</label>
             <input type=\"date\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" name=\"date_from\" id=\"inputDateFrom\" class=\"form-control\" required>
             <br>
             <label for=\"inputDateTo\">Date to</label>
             <input type=\"date\" value=\"{{ \"now\"|date(\"Y-m-d\") }}\" name=\"date_to\" id=\"inputDateTo\" class=\"form-control\" required>
             <button class=\"btn btn-lg btn-primary\" type=\"submit\">
                 get csv
             </button>
         </form>
     </div>

     <div>
         {% if tasks|length > 0 %}
             <table style=\"width:50%\">
                 <tr>
                     <th>id</th>
                     <th>title</th>
                     <th>date</th>
                     <th>time spent min.</th>
                 </tr>
                 {% for task in tasks %}
                     <tr>
                         <td>{{ task.getId }}</td>
                         <td>{{ task.getTitle }}</td>
                         <td>{{ task.getDate|date('Y-m-d') }}</td>
                         <td>{{ task.getTimeSpent }}</td>
                     </tr>
                 {% endfor %}
             </table>
         {% else %}
             there are no tasks
         {% endif %}
     </div>
     <div>
         {% if page > 1 %}
         <a href=\"{{ path('user_tasks_page') }}?page={{ page -1 }}\" class=\"btn btn-primary btn-lg square\" role=\"button\">prev page</a>
         {% endif %}
         &nbsp;<a href=\"{{ path('user_tasks_page') }}?page={{ page +1 }}\" class=\"btn btn-primary btn-lg square\" role=\"button\">next page</a>
     </div>

 {% endblock %}", "task/tasks_list.html.twig", "/var/www/symfony_docker/templates/task/tasks_list.html.twig");
    }
}
