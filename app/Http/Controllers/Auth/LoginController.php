<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    public function login(Request $request)
    {
        // Check validation
        $this->validate($request, [
            'mobile' => 'required|regex:/[0-9]{10}/|digits:10',            
        ]);
 
        // Get user record
        $user = User::where('mobile', $request->get('mobile','password'))->first();

        // Check Condition Mobile No. Found or Not
        if($request->get('mobile') != $user->mobile) {
            \Session::put('errors', 'Your mobile number not match in our system..!!');
            return back();
        } else{
            if (Hash::check('passwordToCheck', $user->password)) {
                // Success
                return redirect('/products');
            }else{
                return back();
            }
                      
        }             
    }
  //  protected $redirectTo = '/products';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
