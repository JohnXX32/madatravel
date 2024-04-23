<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserStore;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(UserStore $request)
    {
        $input = $request->validated();

        if(!Auth::attemp($request->only('email','mdp'),$request->boolean('remember')))
        {
            throw ValidationException::withMessage([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        //return redirect()->back()->withSuccess('User Created successfully.');
        return redirect()->route('user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        $input = $request->validated();
        User::create($input);
        //return redirect()->back()->withSuccess('User Created successfully.');
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::destroy($id);

        return redirect()->back()->withSuccess('User Deleted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStore $request, $id)
    {
        $input = $request->validated();
        User::where('id',$id)->update($input);
        return redirect()->back()->withSuccess('User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
