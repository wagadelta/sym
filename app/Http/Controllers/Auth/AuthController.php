<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

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

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin(Request $request)
{
    $this->validate($request, [
        'usuario' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('usuario', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
        return redirect()->intended($this->redirectPath());
    }

    return redirect($this->loginPath())
                ->withInput($request->only('usuario', 'remember'))
                ->withErrors([
                    'usuario' => 'These credentials do not match our records.',
                ]);
}


}
