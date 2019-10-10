<?php

namespace App\Repositories;

use App\Car;

interface CarRepositoryInterface
{
    public function __construct(Car $cars);

	public function index();
	
	public function show($id);
	
	public function store(array $data);
	
	public function update($id, array $data);
	
	public function destroy($id);
}