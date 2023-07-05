<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function __construct(protected User $user)
    {

    }

    public function register(Request $user_request)
    {
        $data = $user_request->all();
        $validator = Validator::make($data,[
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'max:100'],
        ]);
        if ($validator->fails()) {
            return response("User can't perform this action.", 401);
        }
        // dd($data);
        $random = Str::random(8);
        $user = $this->user::create([
            'name' => $random,
            'email' => $random.'@test.com',
            'password' => Hash::make($random)
        ]);
        // UserCreated::dispatch($user); // if this exist with observer the Event will be dispatched twice

        $user->token = $user->createToken(time())->plainTextToken;
        info('token '.$user->token);
        return $user;
    }

    public function get($user_id)
    {
        $user = $this->user::find($user_id);
        if(! Gate::allows('get', $user)) {
            abort(403);
        }
        return $user;
    }

    public function index()
    {
        if(! Gate::allows('index', App\Models\User::class)) {
            abort(403);
        }
        // TODO: Filtering
        // TODO: Pagination
        return $this->user::all();
    }
}
