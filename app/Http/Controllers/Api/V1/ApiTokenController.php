<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AuthApiService;

class ApiTokenController extends Controller
{
    private $authApiService; 
    function __construct() {
        $this->authApiService = new AuthApiService(); 
    }

    public function profile(Request $request)
    {
        
        $ret = $this->authApiService->profile($request);
        return $this->response($ret);
    }

    public function login(Request $request)
    {
        $ret = $this->authApiService->login($request);
        return $this->response($ret);
    }

    private function response($ret) {
        if ($ret==null) {
            return response()->json(['success'=>false, 'message' => 'Unautorized']);
        }
        else {
            return response()->json(['success'=>true, 'message' => $ret]);
        }
    }
    
}
