<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use App\ValidationCar;
use App\Repositories\CarRepositoryInterface;
use App\Exceptions\CustomValidationException;

class CarService
{
    private $repo;

    public function __construct(CarRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    public function show($id)
    {
        return $this->repo->show($id);
    }

    public function store(array $data)
    {
        $validator = Validator::make($data, ValidationCar::RULE_CAR);
        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors());
        }
        
        return $this->repo->store($data);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationCar::RULE_CAR);
        if ($validator->fails()) {
            throw new CustomValidationException('Falha na validação dos dados', $validator->errors());
        }
        
        return $this->repo->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}