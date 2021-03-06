<?php

namespace App\Http\Controllers\v0;

use App\Http\Controllers\Controller;
use App\Http\Requests\v0\DependentesAtivaRequest;
use App\Repositories\v0\DependentesAtivaRepository;

class DependentesAtivaController extends Controller
{
    protected $repository;
    public function __construct(DependentesAtivaRepository $repository)
	{
        $this->repository = $repository;
    }

    /**
    * @OA\Get(
    *     tags={"dependentesAtiva"},
    *     path="api/v0/dependentesAtiva",
    *     description="Return a list with dependentesAtivas",
    *     @OA\Response(
    *         response=200,
    *         description="A list with dependentesAtivas",
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="An error happened"
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Missing Data"
    *     ),
    *     @OA\Response(
    *         response=501,
    *         description="Not implemented"
    *     ),
    * )
    */
    public function search(DependentesAtivaRequest $request)
    {
        $response = $this->repository->search($request);
        return response()->json($response->data, $response->status, $response->headers, $response->options);
    }
}
