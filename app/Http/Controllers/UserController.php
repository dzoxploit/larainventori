<?php


namespace App\Http\Controllers;


use App\Userdata;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $userdata = DB::table('users')->get();
                return view('user.listuser', ['userdata' => $userdata]);
    }  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Userdata::destroy($id);
        return redirect('user');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get')){
            $pegawais = DB::table("pegawais")
            ->pluck("first_name","nip");
            return view('user.edituser', ['userdata' => Userdata::findOrFail($id), 'pegawais' => $pegawais]);
        } else {
            $rules = [
                'nip' => 'required|string|max:10',
                'name' => 'required|string|max:255',
                'path_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ];
            $this->validate($request, $rules);
            $userdata = Userdata::find($id);
            $userdata->name = $request->name;
            $userdata->nip = $request->nip;
            $file       = $request->file('path_image');
            $fileName   = $file->getClientOriginalName();
            $request->file('path_image')->move("images/", $fileName);
            $userdata->path_image = $fileName;
            // $userdata->password = bcrypt($request->password);
            $userdata->save();
            return redirect('user')->with('success','User updated successfully');
        }
        
    }

    public function reset(Request $request)
    {

        if ($request->isMethod('get')){
            return view('user.newpassword', ['userdata' => Userdata::findOrFail(Auth::user()->id)]);
        } 
        else {
            $rules = [
             'id' => 'string',
             'password' => 'required|string|min:6|confirmed',
            ];
            $this->validate($request, $rules);
            $userdata = Userdata::findOrFail(Auth::user()->id);
            $userdata->password = bcrypt($request->password);
            $userdata->save();
            return redirect('dashboard')->with('success','Data user reset password successfully');
        }
        
    }

    public function show(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('profile.profile_index', ['userdata' => Userdata::findOrFail($id)]);
        else {
                $rules = [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'created_at' => 'required|date',
                ];
                $this->validate($request, $rules);
                $userdata = Userdata::findOrFail($id);
                $userdata->name = $request->name;
                $userdata->email = $request->email;
                $userdata->created_at = $request->created_at;
                return redirect('userdata');
        }
    }

}