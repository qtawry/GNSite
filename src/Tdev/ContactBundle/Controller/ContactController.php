<?php

namespace Tdev\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function indexAction()
    {
        $this->getRequest()->getSession()->getFlashBag()->add('info','Le formulaire de contact n\'est pas encore disponible.');
        return $this->redirect($this->generateUrl('tdev_core_homepage'));
    }
}
