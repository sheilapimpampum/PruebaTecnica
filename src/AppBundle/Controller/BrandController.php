<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Models;
use AppBundle\Entity\Brand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;


class BrandController extends Controller
{
    public function CreateBrandAbdModelsAction(){
        $entityManager = $this->getDoctrine()->getManager();

        $brand = new Brand();
        $brand->setName('Opel');
        $entityManager->persist($brand);

        $model1 = new Models();
        $model1->setBrandId($brand);
        $model1->setName("Astra");
        $entityManager->persist($model1);


        $brand2 = new Brand();
        $brand2->setName('Fiat');
        $entityManager->persist($brand2);

        $model2 = new Models();
        $model2->setBrandId($brand2);
        $model2->setName("Punto");
        $entityManager->persist($model2);

        $model3 = new Models();
        $model3->setBrandId($brand2);
        $model3->setName("500");
        $entityManager->persist($model3);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved brands and models');

    }

}


