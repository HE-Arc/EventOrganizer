<?php
namespace App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;


class AuthenticatesUser
{
    use ValidatesRequests;
    /**
     * @var Request
     */
    protected $request;
    /**
     * Create a new AuthenticatesUser instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Send a sign in invitation to the user.
     */
    public function invite()
    {
        $this
            ->validateRequest()
            ->createToken()
            ->send();
    }
    /**
     * Log in the user associated with a token.
     *
     * @param  LoginToken $token
     * @return void
     */
    public function login(LoginToken $token)
    {

        Auth::login($token->user,$token->remember);
        $token->delete();
    }
    /**
     * Validate the request data.
     *
     * @return $this
     */
    protected function validateRequest()
    {
        $this->validate($this->request, [
            'email' => 'required|email'
        ]);
        return $this;
    }
    /**
     * Prepare a log in token for the user.
     *
     * @return LoginToken
     */
    protected function createToken()
    {
        $user = User::where(["email" => $this->request->email])->first();
        if(!$user){
            $user = User::create([
                "email" => $this->request->email,
                "password" => bcrypt(uniqid())
            ]);
        }
        return LoginToken::generateFor($user,$this->request->remember === "on");
    }
}