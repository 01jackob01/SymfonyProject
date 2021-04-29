<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CurrentDateController
 * @package App\Controller
 */
class CurrentDateController
{
    /**
     * @Route(path="/index", name="currentDate")
     * @return Response
     */
    public function main() : Response
    {
        $currentDate = new \DateTime();

        return new Response('<html><head></head><body>' . $currentDate->format(DATE_ATOM) . '</body></html>');
    }
}