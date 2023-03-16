<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user')->with('user',json_decode($user, true));

    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        return redirect()->back();

    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            $data = [
                'status' => 200,
                'users' => $user,
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'posts' => 'No records found'
            ];

        }

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit($id){
        $users = User::find($id);

        return view('update_user')->with('users',json_decode($users, true));
    }

    public function update(UpdateUserRequest $request)
    {
        User::where('id',$request->id)->update([
            'name'=>$request->up_name,
            'surname'=>$request->up_surname,
            'email'=>$request->up_email,
            'phone'=>$request->up_phone,
        ]);
        return redirect('/api/users');
    }

}
