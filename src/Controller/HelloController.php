<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * @Route(path="/hi")
     * @return Response
     */
    public function hi(Request $request) : Response
    {
        $name = $request->get('imie', 'Brak podanego parametru Imię');
        $helloWorld = 'Cześć ' . $name;
        return new Response('<html><body>' . $helloWorld . '</body></html>');
    }
}