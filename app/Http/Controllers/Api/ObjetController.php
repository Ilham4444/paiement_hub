<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Objet\ListObjets;
use App\Actions\Objet\ShowObjet;
use App\Actions\Objet\CreateObjet;
use App\Actions\Objet\UpdateObjet;
use App\Actions\Objet\DeleteObjet;
use App\Http\Requests\Objet\StoreObjetRequest;
use App\Http\Requests\Objet\UpdateObjetRequest;
use App\Models\Objet;
use Illuminate\Http\Request;

class ObjetController extends Controller
{
    public function index(ListObjets $action){
             return $action();
    }

    public function show(ShowObjet $action, Objet $objet){
                return $action($objet);

    }
    public function store(StoreObjetRequest $request, CreateObjet $action){
        return $action($request);

    }

    public function update(UpdateObjetRequest $request, UpdateObjet $action, Objet $objet){
        return $action($request, $objet);
    }
    
    public function destroy(DeleteObjet $action, Objet $objet){
        return $action($objet);
    }
}
