<?php
// Copyright 1999-2025. WebPros International GmbH. All rights reserved.

class IndexController extends pm_Controller_Action
{
    public function indexAction()
    {
        $this->view->pageTitle = 'Custom Dashboard Extension';
        $this->view->description = 'Home page dashboard extension example';
    }
}
