<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Association\CreateAssociation;
use App\Actions\Association\DeleteAssociation;
use App\Actions\Association\ListAssociations;
use App\Actions\Association\ShowAssociation;
use App\Actions\Association\UpdateAssociation;
use App\Http\Requests\Association\StoreAssociationRequest;
use App\Http\Requests\Association\UpdateAssociationRequest;
use App\Models\Association;

use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index(ListAssociations $action){
      
         return $action();
    }

    public function show(ShowAssociation $action, Association $association){
              return $action($association);
    }

    public function store(StoreAssociationRequest $request, CreateAssociation $action){
        return $action($request);
     
    }

    public function update(UpdateAssociationRequest $request, UpdateAssociation $action,Association $association){
        return $action($request, $association);

    }

    public function destroy(DeleteAssociation $action, Association $association){
        return $action($platform);
    }
}

