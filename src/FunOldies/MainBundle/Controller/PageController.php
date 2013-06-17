<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $display_blockA = "";
        $display_blockB = "";
        include_once('inc/instagramSnapWidget.php');
        return $this->render('FunOldiesMainBundle:Page:index.html.twig', array(
            'display_blockA' => $display_blockA,
            'display_blockB' => $display_blockB
        ));
    }
}
