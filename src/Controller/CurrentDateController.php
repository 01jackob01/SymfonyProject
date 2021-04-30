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
     * @Route(path="/index", name="currentDate", methods={"POST"})
     * @return Response
     */
    public function main() : Response
    {
        $currentDate = new \DateTime();

        return $this->getDateResponse('Current date', $currentDate);
    }

    /**
     * @Route(path="/", name="tommorowDate", methods={"GET"})
     * @return Response
     */
    public function tommorowDate(): Response
    {
        $tommorow = new \DateTime();
        $tommorow->add(new \DateInterval('P1D'));

        return $this->getDateResponse("Tommorow date", $tommorow);
    }

    /**
     * @param string $title
     * @param \DateTime $dateTime
     * @return Response
     */
    private function getDateResponse(string $title, \DateTime $dateTime)
    {
        $html = <<<EOL
<htmm>
<head>
    <title>{$title}</title>
</head>
<body>
    <h1>{$title}</h1>
    <p>{$dateTime->format(DATE_ATOM)}</p>
</body>
</htmm>
EOL;

        return new Response($html);
    }
}