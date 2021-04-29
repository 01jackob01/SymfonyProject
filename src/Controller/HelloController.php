<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route(path="/hi/{name}", name="hello")
     * @return Response
     */
    public function hi(string $name) : Response
    {
        //$name = $request->get('imie', 'Brak podanego parametru Imię');
        $helloWorld = 'Cześć ' . $name;
        return new Response('<html><body>' . $helloWorld . '</body></html>');
    }

    /**
     * @Route(path="/redirect/{action}")
     * @param string $action
     * @return RedirectResponse
     * @throws \Exception
     */
    public function moveToAction(string $action): RedirectResponse
    {
        return $this->redirectToRoute($action, ['name' => 'Some name']);
    }
}