<?php

namespace Tdev\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NewsController extends Controller
{
    public function indexAction($page)
    {
        if($page<1)
            throw new NotFoundHttpException('Les pages commencent à 1');

        $news = array('Une news de test', 'Ca fait bizare de pas avoir de db', 'Et en plus c\'est pas très utile..', 'Mais on fait avec..','Pas le choix');
        return $this->render('TdevNewsBundle:News:index.html.twig', array('news'=>$news));
    }
    public function viewAction($id)
    {
        return $this->render('TdevNewsBundle:News:view.html.twig', array('id' => $id));
    }
    public function addAction()
    {
        $request = $this->getRequest();
        if($request->isMethod('POST')){
            $request->getSession()->getFlashBag()->add('success','News ajoutée');
            return $this->redirect($this->generateUrl("tdev_news_view",array('id'=>1)));
        }
        return $this->render('TdevNewsBundle:News:add.html.twig');
    }
    public function editAction($id)
    {
        $request = $this->getRequest();
        if($request->isMethod('POST')){
            $request->getSession()->getFlashBag()->add('success',"News $id editée");
            return $this->redirect($this->generateUrl("tdev_news_homepage"));
        }
        return $this->render('TdevNewsBundle:News:edit.html.twig', array('name' => $id));
    }
    public function deleteAction($id)
    {
        $request = $this->getRequest();
        if($request->isMethod('POST')){
            $request->getSession()->getFlashBag()->add('success',"News $id supprimée");
            return $this->redirect($this->generateUrl("tdev_news_homepage"));
        }
        return $this->render('TdevNewsBundle:News:delete.html.twig', array('id' => $id));
    }
}
