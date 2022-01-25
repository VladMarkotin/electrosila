<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.html */
class __TwigTemplate_5504eedc986af7b7049f0dbfefb12564d20b096cb298843fadf7b3c55c1ca7d7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" integrity=\"sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm\" crossorigin=\"anonymous\">

    <title>Страница регистрации пользователей:</title>
</head>
<body>

<div class=\"container\">
    <div class=\"alert alert-success\" style=\"display: none\" id=\"success_status\">Регистрация прошла успешно :)</div>

    <div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Добавить информацию</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"alert alert-danger\" role=\"alert\" id=\"status\" style=\"display: none\">
                    Ошибка! <span id=\"err-message\" aria-hidden=\"true\">&times;</span>
                </div>
                <form action=\"add\" method=\"post\" id=\"add-form\">
                    <div class=\"modal-body\">

                        <div class=\"form-group\">
                            <label for=\"fname\" class=\"col-form-label\">Имя:</label>
                            <input type=\"text\" class=\"form-control\" id=\"fname\" name=\"fname\" value=\"test\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"lname\" class=\"col-form-label\">Фамилия:</label>
                            <input type=\"text\" class=\"form-control\" id=\"lname\" name=\"lname\" value=\"testov\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"email\" class=\"col-form-label\">Email:</label>
                            <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" value=\"test1@test.com\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"phone\" class=\"col-form-label\">Телефон:</label>
                            <input type=\"text\" class=\"form-control\" id=\"phone\" name=\"phone\" value=\"+(375) (99) 999-99-99\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"pass\" class=\"col-form-label\">Пароль:</label>
                            <input type=\"password\" class=\"form-control\" id=\"pass\" name=\"pass\" value=\"12345\"/>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"repass\" class=\"col-form-label\">Пароль еще раз:</label>
                            <input type=\"password\" class=\"form-control\" id=\"repass\" name=\"repass\" value=\"12345\"/>
                        </div>

                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" id=\"closeModal\" data-dismiss=\"modal\">Закрыть</button>
                        <button type=\"submit\" class=\"btn btn-primary\" id=\"final_add_emp\">Добавить работниика</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class=\"modal fade\" id=\"edit_window\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\" id=\"editModalLabel\">Окончание работы</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <form action=\"edit\" method=\"post\">
                    <div class=\"modal-body\">

                        <div class=\"form-group\">
                            <input type=\"hidden\" class=\"form-control\" id=\"id\" name=\"id\">
                        </div>

                        <div class=\"form-group\">
                            <label for=\"edit-end-time\" class=\"col-form-label\">Время окончания работы:</label>
                            <input type=\"datetime-local\" class=\"form-control\" id=\"edit-end-time\" name=\"edit-end-time\">
                        </div>


                    </div>
                    <div class=\"modal-footer\">
                        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Закрыть</button>
                        <button type=\"submit\" class=\"btn btn-primary\" id=\"edit-form\">Закончить работу</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class = \"row\">
        <div class = \"col-md-12\">
            <h2>Регистрация работника</h2>
        </div>
    </div>
    <div class=\"row\">
        <div class = \"col-md-12\">

        </div>
    </div>

    <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"@mdo\">
        Добавить работника
    </button>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
        src=\"https://code.jquery.com/jquery-3.3.1.js\"
        integrity=\"sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=\"
        crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
<script src=\"app/views/templates/js/add.js\"></script>
<!--<script src=\"app/views/templates/js/edit.js\"></script>-->
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "index.html", "D:\\OpenServer\\OSPanel\\domains\\electrosila.local\\app\\views\\templates\\index.html");
    }
}
