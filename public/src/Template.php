<?php
class Template
{
    private $theme;
    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    function view($template, $variables = null)
    {
        if (isset($variables)) :
            extract($variables);
        endif;
        include VIEW_PATH . 'layout/' . $this->theme  . '.html';
    }
}
