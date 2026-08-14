<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Service\ListServices;
use App\Actions\Service\ShowService;
use App\Actions\Service\CreateService;
use App\Actions\Service\UpdateService;
use App\Actions\Service\DeleteService;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(ListServices $action){
             return $action();
    }

    public function show(ShowService $action, Service $service){
                return $action($service);

    }
    public function store(StoreServiceRequest $request, CreateService $action){
        return $action($request);

    }

    public function update(UpdateServiceRequest $request, UpdateService $action, Service $service){
        return $action($request, $service);
    }
    
    public function destroy(DeleteService $action, Service $service){
        return $action($service);
    }
}
