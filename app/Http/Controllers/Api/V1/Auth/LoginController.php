<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Gate;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Api\RiderResource;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
       
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
       
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return response()->json(['message' => 'Failed to authenticate'], 401);
        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request)
    {
        
        $this->clearLoginAttempts($request);
        
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        if ($this->guard()->user()->hasRoleId(3)) {
            return response()->json([
                'status'  =>  'success',
                'message' =>  'You are Logged in as Customer!',
                'token'   => $request->user()->createToken($request->input('mobile_app'))->accessToken,
                'data'     => $this->guard()->user(),
            ]);
        } else if($this->guard()->user()->hasRoleId(4)) {
            $rider = User::with('rider', 'rider.shift', 'rider.assignZone')  //user:id,username,team_id
                ->where('id', $request->user()->id)->first();
            return response()->json([
                'status'  =>  'success',
                'message' =>  'You are Logged in as Rider!',
                'token'    => $request->user()->createToken($request->input('mobile_app'))->accessToken,
                // 'data'     => $rider,
                // 'rider'     => new RiderResource( $rider ),
            ]);
        } else {
            return response()->json(['message' => 'Failed to authenticate'], 401);
        }
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json(['message' => 'Failed to authenticate'], 401);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logout Success'], 205);
    }
}
