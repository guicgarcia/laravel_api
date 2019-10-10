<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\Services\CarService;
use Symfony\Component\HttpFoundation\Response;

class CarsController extends Controller
{
    private $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            return response()->json($this->service->index(), Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function show($id)
    {
        $car = $this->service->show($id);

        try {
            return response()->json($car, Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->error();
        }
    }

    public function store(Request $request)
    {
        try {
            return response()->json(
                $this->service->store($request->all()), 
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            return response()->json(
                $this->service->store($request->all()), 
                Response::HTTP_CREATED
            );
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            return response()->json(
                $this->service->destroy($id), 
                Response::HTTP_OK
            );
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}
