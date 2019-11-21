<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Exception;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $data = $request->all();
            $request->validate([
                'username'      => ['required', 'string', 'max:255', 'unique:users'],
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'      => ['required', 'string', 'min:6'],
                'phone'         => ['required', 'unique:users'],
            ]);

            //creating user
            $user = User::create([
                'username'      => $data['username'],
                'email'         => $data['email'],
                'password'      => bcrypt($data['password']),
                'phone'         => $data['phone'],
            ]);

            Session::flash('message', 'User Created Successfully!');
            Session::flash('alert-status', 'success');
            return redirect()->route('user.index');
            
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-status', 'danger');
            return redirect()->route('user.index');
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);
            return view('user.edit', compact('user'));
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $request->validate([
            'username'      => ['required', 'string', 'max:255', 'unique:users,id,:id'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users,id,:id'],
            'phone'         => ['required', 'unique:users,id,:id'],
        ]);

        try {

            //creating user
            $user = User::find($id);
            if($user){

                if(isset($data['password'])){
                    $request->validate([
                        'password'  => ['string', 'min:6'],
                    ]);

                    $user->password     = bcrypt($data['password']);
                }

                $user->username  = $data['username'];
                $user->email     = $data['email'];
                $user->phone     = $data['phone'];

                $user->update();

                Session::flash('message', 'User Created Successfully!');
                Session::flash('alert-status', 'success');
                return redirect()->route('user.index');
            }

            Session::flash('message', 'User Not Found!');
            Session::flash('alert-status', 'danger');
            return redirect()->route('user.index');
                
            
        } catch (Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('alert-status', 'danger');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete())
        {
            return response()->json([
                'status'      => 'success'
            ]);
        }
        return response()->json([
            'status'      => 'error'
        ]);
    }
}
