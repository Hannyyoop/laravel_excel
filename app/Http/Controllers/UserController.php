<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(7)->withQueryString();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('user.index')->with('msg', 'User Created Successfully');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('msg', 'User deleted successfully');
    }
       public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

     public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('msg', 'Users imported successfully.');
    }
}
