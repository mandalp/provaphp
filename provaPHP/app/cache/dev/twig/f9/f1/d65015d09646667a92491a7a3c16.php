<?php

/* ::base-logado.html.twig */
class __TwigTemplate_f9f1d65015d09646667a92491a7a3c16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'metadados' => array($this, 'block_metadados'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        ";
        // line 5
        $this->displayBlock('metadados', $context, $blocks);
        echo " 
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        echo "   
        <style type=\"text/css\">
        \tp#menu_up{
        \t\tbackground-color: #ccc;
        \t\twidth:98%;
        \t\theight:25px;
        \t\tpadding:5px 0px 0px 20px;
        \t\t-moz-box-shadow: 5px 5px 20px #000;
\t\t\t\t-webkit-box-shadow: 5px 5px 20px #000;
\t\t\t\tbox-shadow: 1px 1px 10px #000;
        \t}
       \t.records_list{
\t\t\t\tmargin:auto;
\t\t\t\tborder:solid 2px #1C6FBB;
\t\t\t}
       \t\t
        </style> 
        ";
        // line 24
        $this->displayBlock('javascripts', $context, $blocks);
        // line 25
        echo "    </head>
    <body>
    \t<p id=\"menu_up\"> 
    \t\t<span>Olá ";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["usuarioLogado"]) ? $context["usuarioLogado"] : $this->getContext($context, "usuarioLogado")), "html", null, true);
        echo "</span>    &nbsp; | &nbsp;  \t\t
\t    \t<a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("provaBundle_admin_logout"), "html", null, true);
        echo "\">Sair</a>
    \t</p>
    \t
    \t<hr />
    \t
        ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        echo "        
    </body>
</html>
";
    }

    // line 5
    public function block_metadados($context, array $blocks = array())
    {
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Painel administrativo";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 24
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base-logado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 34,  101 => 24,  96 => 7,  90 => 6,  85 => 5,  77 => 34,  69 => 29,  65 => 28,  60 => 25,  58 => 24,  38 => 7,  34 => 6,  30 => 5,  24 => 1,);
    }
}
