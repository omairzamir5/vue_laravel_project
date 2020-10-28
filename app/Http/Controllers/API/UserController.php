<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Hash;

use App\SampleUsers;

class UserController extends Controller
{


    public function store(Request $request)
    {   
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            'phone' => 'required',
        ]);

        $user = SampleUsers::create([
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => $request['image'],
            'phone' => $request['phone']
         ]);

        return response()->json($user);
    }

    public function show()
    {
        $user = SampleUsers::all();

        return response()->json(array('users' => $user));
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            'phone' => 'required',
        ]);

        $user = SampleUsers::findOrFail($id);

        $user->update($request->all());

        return response()->json([
            'message' => 'User Updated successfully'
           ]);
    }

    public function destroy($id)
    {
        $user = SampleUsers::findOrFail($id);
        $user->delete();
        return response()->json([
         'message' => 'User deleted successfully'
        ]);
    }
}
