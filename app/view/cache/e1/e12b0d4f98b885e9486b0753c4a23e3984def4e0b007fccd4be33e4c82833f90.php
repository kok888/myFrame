<?php

/* say.html */
class __TwigTemplate_18db2b4a71d38e85306a9e35371fd0c8f512a5437f2feb7c174b6ea22789b225 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
这是视图文件
<?php echo \$data;
        echo \$hello;
?>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "say.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "";
    }
}
