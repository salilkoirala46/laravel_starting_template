<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends BaseController {

    public function index(): JsonResponse
    {
        $users = User::all();
    
        return $this->sendResponse(UserResource::collection($users), 'users retrieved successfully.');
    }

}

?>