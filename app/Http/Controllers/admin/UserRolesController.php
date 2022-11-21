<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRolesController extends Controller
{

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles); //syncroles quita y agrega todos los roles de un usuario para no haber duplicados


        return back()->withFlash('los Roles han sido Actualizados');
    }
}
