<?php

namespace Tdev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    public function indexAction()
    {
        $news = array('Une news de test', 'Ca fait bizare de pas avoir de db', 'Et en plus c\'est pas très utile..');
        return $this->render('TdevCoreBundle:Core:index.html.twig',array('news'=>$news));
    }
}
