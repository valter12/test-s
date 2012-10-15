<?php

/* FrontFrontBundle:Default:plans.html.twig */
class __TwigTemplate_4b03c7362299f58f2c24e14624fbc276 extends Twig_Template
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    <div class=\"pricing\">
        <h1>14-day Free Trial! <a href=\"\">Click here</a></h1>
        <div class=\"rows\">
            <div class=\"item\">14-day Free Trial on All Accounts</div>
            <div class=\"item\">Top100 SERPs (google, bing, yahoo)</div>
            <div class=\"item\">Store SERPs data</div>
            <div class=\"item\">Number of domains</div>
            <div class=\"item\">Keywords per domain</div>
            <div class=\"item\">Competitors per domain</div>
            <div class=\"item\">Daily email/Goal email</div>
            <div class=\"item\">Back-link checker</div>
            <div class=\"item\">Alexa rank, google page-rank</div>
            <div class=\"item\">Organizer (budget planner)</div>
            <div class=\"item\">Site uptime verifier</div>
            <div class=\"item\">Google, Bing, Yahoo bot tracker</div>
            <div class=\"item\">Export history (CVS, PDF)</div>
            <div class=\"item\">Custom report creation</div>
        </div>
        <div class=\"card\">
            <div class=\"top\">
                <h2>Basic</h2>
                <div class=\"description\">Description</div>
                <div class=\"price\">
                    <span class=\"currency\">\$</span>
                    <span class=\"amount\">5</span>
                    <span class=\"period\">/month</span>
                </div>
            </div>
            <div class=\"items\">
                <div class=\"item\">Yes</div>
                <div class=\"item\">every day (flexible rate)</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">1</div>
                <div class=\"item\">3</div>
                <div class=\"item\">1</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\"><a class=\"btn btn-success\" href=\"\">Order</a></div>
            </div>
        </div>
        <div class=\"card highlight\">
            <div class=\"top\">
                <h2>Agency</h2>
                <div class=\"description\">Description</div>
                <div class=\"price\">
                    <span class=\"currency\">\$</span>
                    <span class=\"amount\">50</span>
                    <span class=\"period\">/month</span>
                </div>
            </div>
            <div class=\"items\">
                <div class=\"item\">Yes</div>
                <div class=\"item\">every day (flexible rate)</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">3</div>
                <div class=\"item\">20</div>
                <div class=\"item\">5</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\">No</div>
                <div class=\"item\"><a class=\"btn btn-success\" href=\"\">Order</a></div>
            </div>
        </div>
        <div class=\"card\">
            <div class=\"top\">
                <h2>Elite</h2>
                <div class=\"description\">Description</div>
                <div class=\"price\">
                    <span class=\"currency\">\$</span>
                    <span class=\"amount\">200</span>
                    <span class=\"period\">/month</span>
                </div>
            </div>
            <div class=\"items\">
                <div class=\"item\">Yes</div>
                <div class=\"item\">every day (flexible rate)</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">20</div>
                <div class=\"item\">200</div>
                <div class=\"item\">20</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\">Yes</div>
                <div class=\"item\"><a class=\"btn btn-success\" href=\"\">Order</a></div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "FrontFrontBundle:Default:plans.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  26 => 2,);
    }
}
