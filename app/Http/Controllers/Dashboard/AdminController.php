<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $users=User::where([['id','!=',1],['id','!=',auth()->user()->id]])
            ->where(function ($query) use ($request){
                return $query->when($request->input('search') , function ($q) use($request) {
                    return $q->where('name','like','%'.$request->input('search').'%')
                        ->orWhere('email','like','%'.$request->input('search').'%');
                });
            })->latest()->paginate(10);
        return view('admins.index',compact('users'));
    }


    public function create()
    {
        return view('admins.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:20|unique:users,name',
            'email' => 'required|email|max:35|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'required|array|min:1',
        ]);
        $data=$request->except(['password']);
        $data['password']=bcrypt($request->input('password'));
        $user=User::create($data);
        $user->attachRole('admin');
        foreach ($request->input('permissions') as $permission){
            $user->attachPermission('tickets-'.$permission);
        }
        session()->flash('success','Created Successfully');
        return redirect()->route('admins.index');

    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('admins.update',compact('user'));
    }


    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $request->validate([
            'name' => ['required',Rule::unique('users')->ignore($user->id)],
            'email' => ['required',Rule::unique('users')->ignore($user->id)],
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'required|array|min:1',
        ]);
        $data=$request->except(['permissions','password','_method','_token','password_confirmation']);
        $data['password']=bcrypt($request->input('password'));
        $user->update($data);
        $user->permissions()->detach();
        foreach ($request->input('permissions') as $permission){
            $user->attachPermission('tickets-'.$permission);
        }
        session()->flash('success','Updated Successfully');
        return redirect()->route('admins.index');
    }


    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        session()->flash('success','Deleted Successfully');
        return redirect()->route('admins.index');
    }
}
