<?php
namespace App\Http\Controllers\Auth;
use App\LoginToken;
use App\AuthenticatesUser;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var AuthenticatesUser
     */
    protected $auth;
    /**
     * Create a new controller instance.
     *
     * @param AuthenticatesUser $auth
     */
    public function __construct(AuthenticatesUser $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Show the login page.
     *
     * @return Response
     */
    public function login()
    {
        
        return view('auth.login');
    }
    /**
     * Handle the login form submission.
     *
     * @return string
     */
    public function postLogin()
    {
        dd("HHHH");
        $this->auth->invite();
        // Or redirect to a page with this message.
        return 'Sweet - go check that email, yo.';
    }
    /**
     * Login the user, using the given token.
     *
     * @param  LoginToken $token
     * @return string
     */
    public function authenticate(Request $request)
    {
        $token = LoginToken::where("token",$request->token)->first();
        $this->auth->login($token);
        return redirect('/event');
    }
    /**
     * Log out the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Or put this on AuthenticatesUser, and
        // do $this->auth->logout();
        auth()->logout();
        return redirect('/');
    }
}