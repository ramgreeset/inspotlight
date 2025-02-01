<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Role\StoreRequest;
use App\Http\Requests\Api\Role\UpdateRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function index(){
        return RoleResource::collection(Role::all()->resolve());
    }
    public function show(Role $role){
        return RoleResource::make($role)->resolve();
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        $role = Role::create($data);

    }
    public function update(UpdateRequest $request, Role $role){
        $data = $request->validated();
        $role->update($data);
    }
    public function destroy(Role $role){
        $role->delete();
        return response()->json([
            'message' => 'Удалено'
        ],Response::HTTP_OK);
    }
}
