<?php

class Controller
{
    public function runAction($actionName)
    {
        $actionName = $actionName . 'Action';
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include  VIEW_PATH . 'status/404page.html';
        }
    }
}
