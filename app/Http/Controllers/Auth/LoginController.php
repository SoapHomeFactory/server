<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
use Hash;

use Illuminate\Http\Response;

use App\User;

class LoginController extends Controller
{

    /**
    * Handle a login request to the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
    *
    * @throws \Illuminate\Validation\ValidationException
    */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $user = $this->retrieveUserAttemptingLoging($request);

        if ($this->attemptLogin($request, $user)) {
            return $this->sendLoginResponse($request, $user);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
    * Validate the user login request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return void
    *
    * @throws \Illuminate\Validation\ValidationException
    */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function retrieveUserAttemptingLoging(Request $request)
    {
        return User::where(
                $this->username(),
                ($this->credentials($request))[$this->username()]
            )->first();
    }

    /**
    * Attempt to log the user into the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return bool
    */
    protected function attemptLogin(Request $request, $user)
    {
        if (! $user || ! Hash::check(($this->credentials($request))['password'], $user->password))
        {
            return false;
        }

        return true;
    }

    /**
    * Get the needed authorization credentials from the request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array
    */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
    * Send the response after the user was authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    protected function sendLoginResponse(Request $request, $user)
    {

        if ($token = $this->authenticated($request, $user))
        {
            $response = array_merge(['user' => $user], $token);
        }

        return $request->wantsJson()
                    ? new Response($response, 200)
                    : $response;
    }

    /**
    * The user has been authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    protected function authenticated(Request $request, $user)
    {
        $token = $this->retrieveAuthToken($user, $request->header('X-Web-App'));

        if (empty($token))
        {
            $token = $this->createAuthToken($user, $request->header('X-Web-App'));
        }

        return ["token" => $token->plainTextToken];
    }

    protected function retrieveAuthToken($user, string $device)
    {
        return $user->tokens()
            ->where('name', $device)
            ->first();
    }

    protected function createAuthToken($user, string $device)
    {
        return $user->createToken($device);
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
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
    * Get the login username to be used by the controller.
    *
    * @return string
    */
    public function username()
    {
        return 'email';
    }
}
