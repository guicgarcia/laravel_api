<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return "index";
    }

    public function store(Request $request)
    {
        return "store";
    }

    public function show($id)
    {
        return "show" . $id;
    }

    public function update(Request $request, $id)
    {
        return "update";
    }

    public function destroy($id)
    {
        return "destroy";
    }
}
