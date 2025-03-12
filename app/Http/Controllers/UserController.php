<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use function PHPUnit\Framework\fileExists;

// use Spatie\Permission\Models\Role;
// use DB;
// use Hash;
// use Illuminate\Support\Arr;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //: View
    {
        // $data = User::latest()->paginate(10);
        $query = User::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->global . '%')
                    ->orWhere('phone', 'like', '%' . $request->global . '%')
                    ->orWhere('email', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $data = $query->where('status', 'active')->paginate(10);

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //: View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     // 'password' => 'required|same:confirm-password|'min:8'',
        //     'password' => ['required', 'string'],
        //     'confirm-password' => ['required', 'string', 'confirmed'],
        //     'role' => 'required'
        // ]);

        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'defaultLanguage' => 'required',
            'profilePic' => 'required|image|mimes:jpeg,png,jpg,gif',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' will automatically validate if password and confirm-password match
            'password_confirmation' => 'required|string|min:8'
        ]);

        // try {
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->default_language = $request->defaultLanguage;

            if ($request->hasFile('profilePic')) {
                $image = $request->profilePic;
                // return $image;
                $profilepic = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $user->pro_pic = $profilepic;
                $image->move(public_path('user_profile/'), $profilepic);
            }

            $user->save();

            return redirect()->route('user.index')->with('msg', 'User created successfully!');
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }

        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);

        // $user = User::create($input);
        // $user->assignRole($request->input('roles'));

        // return redirect()->route('users.index')
        //                 ->with('msg','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //: View
    {
        // $user = User::find($id);
        // return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //: View
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();

        // return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //: RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'role' => 'required',
            'defaultLanguage' => 'required',
            'profilePic' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        // try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->default_language = $request->defaultLanguage;


            if ($request->hasFile('profilePic')) {
                $image = $request->profilePic;
                // return $image;
                $profilepic = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $currentimagepath = public_path('user_Profile/' . $user->pro_pic);
                $user->pro_pic = $profilepic;
                if (file_exists($currentimagepath)) {
                    unlink($currentimagepath);
                }
                $image->move(public_path('user_profile/'), $profilepic);
            }

            $user->save();

            return redirect()->route('user.index')->with('msg', 'User updated successfully!');
        // } catch (\Exception $e) {
        //     return view('layouts.error')->with('error', 'Somthing went wrong please try again later!');
        // }

        // $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = Arr::except($input,array('password'));    
        // }

        // $user = User::find($id);
        // $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$id)->delete();

        // $user->assignRole($request->input('roles'));

        // return redirect()->route('users.index')
        //                 ->with('msg','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //: RedirectResponse
    {
        $user = User::find($id);
        $profilepic = public_path('user_Profile/' . $user->pro_pic);
        if (file_exists($profilepic)) {
            unlink($profilepic);
        }
        $user->delete();
        return redirect()->route('user.index')
            ->with('msg', 'User deleted successfully');
    }

    public function deactiveindex(Request $request)
    {
        $query = User::query();

        if ($request->filled('global')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->global . '%')
                    ->orWhere('phone', 'like', '%' . $request->global . '%')
                    ->orWhere('email', 'like', '%' . $request->global . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $data = $query->where('status', 'deactive')->paginate(10);
        return view('users.deactiveindex', compact('data'));
    }

    public function deactive($id)
    {
        $data = User::find($id);
        $data->status = 'deactive';
        $data->save();

        return redirect()->back()->with('msg', 'User deactivated successfully!');
    }

    public function active($id)
    {
        $data = User::find($id);
        $data->status = 'active';
        $data->save();

        return redirect()->route('user.index')->with('msg', 'User activated successfully!');
    }
}
