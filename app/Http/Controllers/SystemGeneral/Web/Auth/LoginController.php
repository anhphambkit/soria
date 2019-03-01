<?php
/**
 * Created by PhpStorm.
 * User: AnhPham
 * Date: 3/1/19
 * Time: 21:53
 */

namespace App\Http\Controllers\SystemGeneral\Web\Auth;

use App\Core\Exceptions\ValidationException;
use App\Http\Controllers\SystemGeneral\Web\BaseGeneralController;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends BaseGeneralController
{
    /*
    |--------------------------------------------------------------------------
    | Login AdminController
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
    protected $redirectTo = '/';

    /**
     * LoginController constructor.
     * @param GeneralSettingServices $generalSettingServices
     */
    public function __construct(GeneralSettingServices $generalSettingServices)
    {
        parent::__construct($generalSettingServices);
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function showLogin() {
        return view(config('setting.theme.system') . '.auth.pages.login');
    }

    /**
     * @param Request $request
     * @return type|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postLogin(Request $request)
    {
//        dd($request->all());
        $this->validateLogin($request);

//        $dataLogin = $request->only(['username', 'password']);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

//        if(!$this->isBackend)
//            $this->checkAllowUserLogin($request->all());

        if ($this->attemptLogin($request)) {
//            if(!$this->checkActivated())
//                return $this->sendFailedActivationResponse();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * @param array $credentials
     */
    protected function checkAllowUserLogin(array $credentials)
    {
        $userRepository = app(UserRepositories::class);
        $userRepository->setModel(new User);
        $user = $userRepository->findByCredentials($credentials,true,config('agoyu.ignore_login_frontend'));
        if($user)
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.account access denied.')],
            ]);
    }

    /**
     * @return bool
     */
    protected function checkActivated()
    {
        $completed = Activation::completed(Auth::user());
        if (! $completed) {
            $this->guard()->logout();
            return false;
        }
        return true;
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            "error_login" => [trans('auth.failed')],
        ]);
    }

    /**
     *
     */
    protected function sendFailedActivationResponse()
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.account not validated')],
        ]);
    }
}

