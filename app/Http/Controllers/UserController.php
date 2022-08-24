<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('pages.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('-------------create----------');
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user  = $request->validated();
        // User::create([
        //     'name' => $user['name'],
        //     'email' => $user['email'],
        //     'user_type' => $user['user_type'],
        //     'password' => Hash::make($user['password']),
        // ]);
        // dd($request);
        $user = new User();
        $data = $request->only($user->getFillable());
        $data['password'] =  Hash::make($request->password);
        $data['conf_room'] = 0;
        // $data['created_by'] = 1;
        $data['created_by'] = Auth::user()->id;
        // if (is_null($data['created_by'])) {
        //     $data['created_by'] = 1;
        // }



        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d H:i:s');
        $data['created_date'] = $date;

        // $data['status'] = "logged_out";
        //        print_r(Auth::user()->id);
        //        echo '<br>';
        // dd(Auth::user('id'));
        // $data['created_date'] = Carbon::now()->toDateTimeString();
        //        dd(Carbon::now()->toDateTimeString());
        // $data['password'] =  sha1($request->password);
        $user->fill($data);

        $user->save();

        session()->flash('success', 'New User has added successfully !!');

        return  redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.edit')->with('user', $user);
        // return view('pages.user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $user = User::find($id);
        $data = $request->only($user->getFillable());
        print_r($data['name'], '\n');
        $name = $data['name'];
        $rowPass = $data['password'];
        if ($data['password'] != '') {
            print($data['password']);
            echo '</br>';
            // $data['password'] =  Hash::make($request->password);
            $options = [
                'cost' => 10,
            ];
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT, $options);
            print_r($data['password']);
            echo '</br>';

            // echo password_hash($data['password'], PASSWORD_BCRYPT, $options);
        } else {
            unset($data['password']);
        }
        $user->fill($data);
        $user->save();

        // $hash = row('SELECT PASSWORD FROM `user` WHERE name = 'user3');
        $hash = DB::table('user')
            ->select('password')
            ->where('name', $data['name'])
            ->get();
        $pass = DB::select("SELECT password FROM user WHERE name = '$name' ");
        // $pass = DB::select("SELECT password FROM user WHERE name = '$data['name']");
        echo gettype($pass) . "<br>";

        if (password_verify($rowPass, $pass[0]->password)) {

            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }

        // dd($pass[0]->password);
        // dd($data);
        session()->flash('success', 'User credentials changed successfully !!');
        // redirect('/edit/{{$id}}');
        return redirect()->to('user/edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
