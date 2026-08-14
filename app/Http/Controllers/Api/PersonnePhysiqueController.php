<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\PersonnePhysique\ListPersonnePhysiques;
use App\Actions\PersonnePhysique\ShowPersonnePhysique;
use App\Actions\PersonnePhysique\CreatePersonnePhysique;
use App\Actions\PersonnePhysique\UpdatePersonnePhysique;
use App\Actions\PersonnePhysique\DeletePersonnePhysique;
use App\Http\Requests\PersonnePhysique\CreatePersonnePhysiqueRequest;
use App\Http\Requests\PersonnePhysique\UpdatePersonnePhysiqueRequest;
use App\Models\PersonnePhysique;
use Illuminate\Http\Request;

class PersonnePhysiqueController extends Controller
{
    public function index(ListPersonnePhysiques $action){
             return $action();
    }

    public function show(ShowPersonnePhysique $action, PersonnePhysique $personnePhysique){
                return $action($personnePhysique);

    }
    public function store(CreatePersonnePhysiqueRequest $request, CreatePersonnePhysique $action){
        return $action($request);

    }

    public function update(UpdatePersonnePhysiqueRequest $request, UpdatePersonnePhysique $action, PersonnePhysique $personnePhysique){
        return $action($request, $personnePhysique);
    }
    
    public function destroy(DeletePersonnePhysique $action, PersonnePhysique $personnePhysique){
        return $action($personnePhysique);
    }
}
