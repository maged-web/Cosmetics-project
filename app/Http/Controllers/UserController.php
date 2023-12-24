<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    use ApiResponseTrait;
    public function showAllCustomers()
    {   
        
        $customerRole = Role::where('name', 'customer')->first();
        $customerUsers = $customerRole->users;
        if(!$customerUsers)
        {
            return $this->apiResponse(null,'No Users Retrived',400);

        }
        return $this->apiResponse($customerUsers,'Users get successfully',200);
    }

    public function blockUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->blocked = true;
            $user->save();
            return $this->apiResponse(null,'User blocked successfully',200);
        }
        return $this->apiResponse(null,'No User found',400);

    }
    
    public function unBlockUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->blocked = false;
            $user->save();

            return $this->apiResponse(null,'User unblocked successfully',200);
        }

        return $this->apiResponse(null,'No User found',400);
    }
}
