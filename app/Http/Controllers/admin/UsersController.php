<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;
use Auth;
use App\User;
use DB;
class UsersController extends Controller{

    public function index(){
        $aUsers = UsersModel::orderBy('name','asc')->get();


        return view('admin/users.index' , ['aUsers' => $aUsers]);
    }

    public function create(){
        return view('admin/users.create');
    }

    public function store(Request $request){
        $aValidations = array(
            'type' => 'required',
            'name' => 'required|max:60',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:32'
        );

        if ($request['type'] == 2) {
            $aValidations['dni'] = 'required|max:11';
        }

        $this->validate($request, $aValidations);

        $password = bcrypt($request['password']);
        $name = $request['name'];
        if ($request['type'] == 2) {
            $dni = $request['dni'];
        }
        $type = $request['type'];
        $email = $request['email'];

        $userEmail = UsersModel::where('email', $request['email'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

        if ($request['type'] == 2) {
            $aData = array('name' => $name , 'email' => $email, 'password' => $password , 'created_at' => now(), 'updated_at' => now(), 'type' => $type ,'DNI' => $dni);
        }
        
        if ($request['type'] == 1) {
            $aData = array('name' => $name , 'email' => $email, 'password' => $password , 'created_at' => now(), 'updated_at' => now(), 'type' => $type);
        }

        DB::table('users')->insert($aData);
        // return redirect('/admin/users');
        return redirect()->route('users.index','admin');
        
     }

    public function edit(){}


    public function destroy(){}


}