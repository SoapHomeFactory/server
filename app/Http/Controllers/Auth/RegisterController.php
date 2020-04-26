<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Auth\Events\Registered;
use App\User;

class RegisterController extends Controller
{
    /**
    * Handle a registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
      $this->validateRegister($request);

      event(new Registered($user = $this->create($request->all())));

      if ($token = $this->registered($request, $user)) {
          $response = [
            'token' => $token->plainTextToken,
            'user' => $user
          ];
      }

      return $request->wantsJson()
                  ? new Response($response, 201)
                  : $response;
    }

    protected function validateRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    protected function create(array $attributes)
    {
        return User::create($attributes);
    }

    /**
    * The user has been registered.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  mixed  $user
    * @return mixed
    */
    protected function registered(Request $request, $user)
    {
        return $user->createToken($request->header('X-Web-App'));
    }
}
