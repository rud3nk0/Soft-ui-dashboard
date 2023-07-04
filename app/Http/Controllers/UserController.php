<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('laravel-examples.user-management', ['users' => $users]);
    }

	 /**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function view($id)
    {
        $user = User::find($id);
        return view('laravel-examples.user-view', ['user' => $user]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->image->extension() === 'webp') {
            return redirect()->back()->withErrors(['image' => 'WebP format is not supported.']);
        }

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'location' => $request->location,
            'about_me' => $request->about_me,
            'image' => $imageName,
        ]);



        $users = User::all();
        return view('laravel-examples.user-management', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); // Получите данные пользователя по идентификатору из вашей базы данных или другого источника данных
        return view('laravel-examples.user-view', ['user' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id);
       return view('user-management.updateUser', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $userId = User::find($id);
    if ($userId) {
        $userId->name = $request->name;
        $userId->email = $request->email;
        $userId->phone = $request->phone;
        $userId->location = $request->location;
        $userId->role = $request->role;
//        if ($request->has('password')) {
            $userId->password = $request->password;
//        }
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $userId->image = $imageName;
        }
        $userId->save();
    }

    $users = User::all();
    return view('laravel-examples.user-management', ['users' => $users]);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        $users = User::all();
        return view('laravel-examples.user-management', ['users' => $users]);
    }
}
