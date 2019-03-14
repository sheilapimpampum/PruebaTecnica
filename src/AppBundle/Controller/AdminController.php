<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Get;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Models;
use AppBundle\Entity\Brand;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminController extends Controller
{
    public function AdminAction(){
        return new Response(
            '<html><body>Eres ROLE_USER o ROLE_ADMIN</body></html>'
        );

    }
    public function AdminTestloginAction(){
        return new Response(
            '<html><body>Eres ROLE_ADMIN</body></html>'
        );

    }
    public function AdminListAction(){
        $brands= $this->getDoctrine()
            ->getRepository(Brand::class)
            ->findAll();

        $result = array();
        foreach ($brands as $brand){
            $array_models = array();

            $models= $this->getDoctrine()
                ->getRepository(Models::class)
                ->findBy(array("brand_id"=> $brand->getId()));
            foreach ($models as $model){
                array_push($array_models,array('id'=> $model->getId(),'name'=> $model->getName()));
            }
            array_push($result, array('id'=> $brand->getId(),'name'=> $brand->getName(), 'models'=>$array_models));

        }
        return new JsonResponse($result);
    }
}


