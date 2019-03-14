<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;


class AdminController
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
}


