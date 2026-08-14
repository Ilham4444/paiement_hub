<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Societe\CreateSociete;
use App\Actions\Societe\DeleteSociete;
use App\Actions\Societe\ListSocietes;
use App\Actions\Societe\ShowSociete;
use App\Actions\Societe\UpdateSociete;
use App\Http\Requests\Societe\StoreSocieteRequest;
use App\Http\Requests\Societe\UpdateSocieteRequest;
use App\Models\Societe;

use Illuminate\Http\Request;

class SocieteController extends Controller
{
    public function index(ListSocietes $action){
      
         return $action();
    }

    public function show(ShowSociete $action, Societe $societe){
              return $action($societe);
    }

    public function store(StoreSocieteRequest $request, CreateSociete $action){
        return $action($request);
     
    }

    public function update(UpdateSocieteRequest $request, UpdateSociete $action,Societe $societe){
        return $action($request, $societe);

    }

    public function destroy(DeleteSociete $action, Societe $societe){
        return $action($societe);
    }
}

