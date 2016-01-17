<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Entrust;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $username = 'name';
    protected $redirectPath = '/home';
    protected $redirectAfterLogout = '/auth/login';
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'jabatan' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nama' => "Dewi Rizqia Najipah",
            'jabatan' => $data['jabatan'],
            'nip' => "",
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        if (Auth::user()->hasRole('admin'))
        {
            return redirect()->intended('admin');
        }
        elseif (Auth::user()->hasRole('subbag'))
        {
            return redirect()->intended('keuangan');
        }
        elseif (Auth::user()->hasRole('bagian'))
        {
            return redirect()->intended('bagian');
        }
        elseif (Auth::user()->hasRole('wd2'))
        {
            return redirect()->intended('keuangan');
        }
        elseif (Auth::user()->hasRole('dekan'))
        {
            return redirect()->intended('dekan');
        }
        elseif (Auth::user()->hasRole('ktu'))
        {
            return redirect()->intended('ktu');
        }
        else
        {
            return redirect()->intended('bpp');   
        }
    }



    


    // protected function handleUserWasAuthenticated(Request $request, $throttles)
    // {
    //     if ($throttles) {
    //         $this->clearLoginAttempts($request);
    //     }
    //     if (method_exists($this, 'authenticated')) {
    //         return $this->authenticated($request, Auth::user());
    //     }
    //     if (Entrust::hasRole('admin'))
    //     {
    //         return redirect()->intended('/');
    //     }
    //     elseif (Entrust::hasRole('subbag'))
    //     {
    //         return redirect()->intended('keuangan');
    //     }
    //     elseif (Entrust::hasRole('bagian'))
    //     {
    //         return redirect()->intended('admin');
    //     }
    //     // elseif (Entrust::hasRole('wd2'))
    //     // {
    //     //     return redirect()->intended('keuangan');
    //     // }
    //     // elseif (Entrust::hasRole('dekan'))
    //     // {
    //     //     return redirect()->intended('keuangan');
    //     // }
    //     // elseif (Entrust::hasRole('ktu'))
    //     // {
    //     //     return redirect()->intended('keuangan');
    //     // }
    //     // elseif (Entrust::hasRole('bpp'))
    //     // {
    //     //     return redirect()->intended('keuangan');
    //     // }
    //     else
    //     {
    //         return redirect()->intended('keuangan');
    //     }
    // }


}
