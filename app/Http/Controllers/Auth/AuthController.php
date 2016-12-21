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
        $this->auth->invite();
        // FIXME: You should redirect after a POST, always. -- Yoan
        // Or redirect to a page with this message.
        return view('auth.go_check_email');
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
        if ($token) {
            $this->auth->login($token);
            return redirect('/event');
        }
        return redirect('/')->withErrors('Token is dead');
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
