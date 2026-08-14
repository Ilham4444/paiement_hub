<?php

 namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Actions\Platform\CreatePlatform;
use App\Actions\Platform\DeletePlatform;
use App\Actions\Platform\ListPlatforms;
use App\Actions\Platform\ShowPlatform;
use App\Actions\Platform\UpdatePlatform;
use App\Http\Requests\Platform\StorePlatformRequest;
use App\Http\Requests\Platform\UpdatePlatformRequest;
use App\Models\Platform;

use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index(ListPlatforms $action){
      
         return $action();
    }

    public function show(ShowPlatform $action, Platform $platform){
              return $action($platform);
    }

    public function store(StorePlatformRequest $request, CreatePlatform $action){
        return $action($request);
     
    }

    public function update(UpdatePlatformRequest $request, UpdatePlatform $action,Platform $platform){
        return $action($request, $platform);

    }

    public function destroy(DeletePlatform $action, Platform $platform){
        return $action($platform);
    }
}

