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
     * @Route(path="/hi", name="hello")
     * @return Response
     */
    public function hi(Request $request) : Response
    {
        $name = $request->get('imie', 'Brak podanego parametru Imię');
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
        if ('hello' == $action) {
            return $this->redirectToRoute('hello', ['imie' => 'Some name']);
        } else if ('currentDate' == $action) {
            return $this->redirectToRoute('currentDate');
        }
        throw new \Exception('Wrong action');
    }
}