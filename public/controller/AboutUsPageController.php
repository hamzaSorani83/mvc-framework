<?php
class AboutUsPageController extends Controller
{
    function indexAction()
    {
        $page = new Page();
        $data = $page->findById(2);
        $template = new Template('default');
        $template->view('about-us-page', $data);
    }
}
