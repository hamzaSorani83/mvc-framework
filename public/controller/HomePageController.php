<?php

class HomePageController extends Controller
{
    function indexAction()
    {
        $page = new Page();
        $data = $page->findById(1);
        $template = new Template('default');
        $template->view('home-page', $data);
    }
}
