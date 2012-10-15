<?php

/* FrontFrontBundle:Emails:email_confirmation.html.twig */
class __TwigTemplate_3bc85ebc97482b1f0c02609fa338f938 extends Twig_Template
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
        echo "Hello!,
<br/>
<br/>
To finish the registration of <a href=\"http://www.seowatchman.com\">www.SEOwatchman.com</a> please click on the following link: <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getContext($context, "activation_link"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getContext($context, "activation_link"), "html", null, true);
        echo "</a>
<br/>
<br/>
<i>If you did not register on www.SEOwatchman.com please ignore this message, your email will be deleted soon from our database.</i>
<br/>
<br/>
Have a beautiful day!
<br/>
SEOwatchman TEAM";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Emails:email_confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 4,  17 => 1,);
    }
}
