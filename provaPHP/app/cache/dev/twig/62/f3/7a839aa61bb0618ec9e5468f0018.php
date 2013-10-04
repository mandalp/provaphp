<?php

/* provaBundle:Public:form-admin-login.html.twig */
class __TwigTemplate_62f37a839aa61bb0618ec9e5468f0018 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "\t\t\t
\t<div style=\"float:right\">
\t\t<p><a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("provaBundle_cria_root"), "html", null, true);
        echo "\">Criar usuário root</a></p>
\t</div>
\t\t
\t<div id=\"login\">
\t\t<h3>Login</h3>\t
\t\t
\t\t<form method=\"post\" action=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("provaBundle_admin_login"), "html", null, true);
        echo "\">
\t\t\t<label>Usu&aacute;rio:</label><br />
\t\t\t<input type=\"text\" size=\"20\" name=\"fm_login_email\" />
\t\t\t<br /><br />
\t\t\t
\t\t\t<label>Senha:</label><br />
\t\t\t<input type=\"password\" size=\"20\" name=\"fm_login_senha\" />
\t\t\t<br /><br />
\t\t\t
\t\t\t<input type=\"submit\" name=\"fm_submit_login\" value=\"Entrar\"/>
\t\t\t
\t\t</form>\t\t\t\t\t
\t</div>
\t
\t<div>
\t\t<p><a href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("provaBundle_homepage"), "html", null, true);
        echo "\">Voltar a página inicial</a></p>
\t</div>
\t\t

";
    }

    public function getTemplateName()
    {
        return "provaBundle:Public:form-admin-login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 28,  44 => 13,  35 => 7,  31 => 5,  28 => 4,);
    }
}
