<?php

namespace App\Http\Controllers\Auth;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = back();

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showRegistrationForm()
    {
        $this->authorize('user.create', User::class);
        $roles = Role::all();
        return view('auth.register', ['roles' => $roles]);
    }

    public function index()
    {
        $this->authorize('user.viewAny', User::class);
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        $this->authorize('user.create', User::class);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('user.create', User::class);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'integer'],
        ]);
//        Guru::create(['email'=>$request->email]);
        $create = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);
        if ($request->role == 2) {
            if ($create) {
                Guru::create(['user_id' => $create->id]);
            }
        }
        event(new Registered($create));
        $role_id = $request->role;
        if ($role_id !== null) {
            $user = User::find($create->id);
            $user->role()->attach($request->role);
            return redirect()->route('user')->with('status', 'Berhasil menambah data');
        } else {
            return back();
        }
    }

    protected function create(array $data)
    {
//        $this->authorize('user.create', User::class);
        $create = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
//            'role_id' => $data['role'],
        ]);
        return $create;
    }

    public function register(Request $request)
    {
//        $this->authorize('user.create', User::class);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);

        return redirect()->route('home');
    }

    public function show(User $user)
    {
        $this->authorize('user.update', User::class);
//        dd($user->role->id);
        $roles = Role::all();
        return view('users.show', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('user.update', User::class);
        if ($request->password == null) {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'role' => ['required', 'integer'],
            ]);
        } else {
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['string', 'min:8', 'confirmed'],
                'role' => ['required', 'integer'],
            ]);
        }
        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'role_id' => $request->role,
                'password' => Hash::make($request->password)
            ]);
        if ($request->role == 2) {
                Guru::create(['user_id' => $user->id]);
        }

        $user_id = User::find($user->id);
        $user_id->role()->sync([$request->role]);
        return redirect()->route('user')->with('status', 'Berhasil mengubah data');
    }

    public function destroy(User $user)
    {
        $this->authorize('user.delete', User::class);
        if ($user->guru == !null) {
            Guru::where('id', $user->guru->id)->delete();
        }
        $user_id = User::find($user->id);
        $user_id->role()->detach($user->role_id);
        $user::where('id', $user->id);
        $user->delete();
        return redirect()->route('user')->with('status', 'Berhasil menghapus data');
    }
}
