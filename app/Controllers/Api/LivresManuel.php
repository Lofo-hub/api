<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LivreModel;

/**
 * Étape A : un endpoint écrit « à la main », sans ResourceController.
 * Route : GET api/manuel/livres/(:num)
 */
class LivresManuel extends BaseController
{
    // TODO 1 : si le livre n'existe pas, renvoyer un 404
    //          avec un corps JSON {"erreur": "Livre ... introuvable"}.
    //          Indice : $this->response->setStatusCode(...)->setJSON(...)
    // TODO 2 : sinon, renvoyer le livre en JSON avec le code 200.
    public function show($id)
{
    $livre = model(LivreModel::class)->find($id);

    if ($livre === null) {
        return $this->response
            ->setStatusCode(ResponseInterface::HTTP_NOT_FOUND)
            ->setJSON([
                'erreur' => "Livre {$id} introuvable",
            ]);
    }

    return $this->response
        ->setStatusCode(ResponseInterface::HTTP_OK)
        ->setJSON([
            'status' => 200,
            'data'   => $livre,
        ]);
}
}
