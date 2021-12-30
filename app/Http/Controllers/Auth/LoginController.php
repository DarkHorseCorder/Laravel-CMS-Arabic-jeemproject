<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

        $this->validator($request);

        if(Auth::attempt($request->only('email','password'), $request->filled('remember'))){

            //Authentication passed...
            return redirect(route('admin.home'))->with('status', 'You are Logged in as Admin!');
            // if(Auth::user()->hasRoleId(2)){
            //     return redirect(route('customer.home'))->with('status', 'You are Logged in as Customer!');
            // } else {
            // }

        }

        // Authentication failed
        return $this->loginFailed();
    }


    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {

            $newUser = User::create([
                'name'          => $user->getName(),
                'email'         => $user->getEmail(),
                'password'      => bcrypt(request('password')),
                'provider_id'   => $user->getId(),
                'provider_name' => $driver,
            ]);
            // customer role
            $newUser->roles()->sync(2);
            $newUser->email_verified_at = now();

            // $newUser                    = new User;
            // $newUser->provider_name     = $driver;
            // $newUser->provider_id       = $user->getId();
            // $newUser->name              = $user->getName();
            // $newUser->email             = $user->getEmail();
            // $newUser->password          = bcrypt(request('password'));
            // // we set email_verified_at because the user's email is already veridied by social login portal
            // $newUser->email_verified_at = now();
            // // you can also get avatar, so create avatar column in database it you want to save profile image
            // // $newUser->avatar            = $user->getAvatar();
            // $newUser->save();

            auth()->login($newUser, true);
        }

        return redirect($this->redirectPath());
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:users|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

     /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
        ->back()
        ->withInput()
        ->with('error','Login failed, please try again!');
        // ->with('error','Wrong password or this account not approved yet.');
    }

    public function showLoginForm()
    {
        $pageURLs = [
            'en' => 'login',
            'de' => 'login',
            'ar' => 'login',
        ];

        return view('auth.login', compact('pageURLs'));
    }
}
