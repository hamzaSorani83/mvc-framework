<?php
class ContactController extends Controller
{
    function indexAction()
    {
        $page = new Page();
        $data = $page->findById(3);
        $template = new Template('default');
        $template->view('contact/contact-us-page', $data);
    }

    function submitContactFormAction()
    {
        $page = new Page();
        $data = $page->findById(4);
        $template = new Template('default');
        $template->view('contact/contact-us-thank-you', $data);
    }
}
