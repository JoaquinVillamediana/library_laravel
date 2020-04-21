<?php
namespace App\Http\Controllers\usr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;
use Auth;
use Hash;
use App\User;
use DB;
class ProfileController extends Controller{

    public function index(){
        $aSearchUsers = DB::table('users')->select('id')->where('name',Auth::user()->name )->get(); 
        foreach ($aSearchUsers as $oSearchUser)
        {
            $userid = $oSearchUser->id;
        }
        $aRecords = RecordsModel::where('userid',$userid)->orderBy('dateRecord','asc')->get();
        foreach($aRecords as $oRecord)
        {
            $bookid = $oRecord->bookid;
            $aBookNames =  DB::table('books')->select('name')->where('idbooks',$bookid )->get();
            foreach($aBookNames as $oBookName)
            {
                $name = $oBookName->name;
            }
            $oRecord->bookid = $name;
        }
        
        return view('usr/profile.index', ['aRecords' => $aRecords]);
    }

    public function edit($userid)
    {

        return view('usr/profile.edit',compact('userid'));
    }

    public function update(Request $request , $userid)
    {
        $aValidations = array(
            'image' => 'max:10240|mimes:jpeg,png,jpg,gif',
            'name' => 'max:60|alpha_num'
        );

        if ($request['oldpass'] != '' || $request['newpass'] != '' || $request['confirm'] != '') {
            $aValidations['oldpass'] = 'required|max:60|min:8';
            $aValidations['newpass'] = 'required|max:60|min:8';
            $aValidations['confirm'] = 'required|max:60|min:8';
        }

        $this->validate($request , $aValidations);

        if (!empty($request['image'])) {

            $image = $request['image'];
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            
            $destinationPath = 'uploads/profile';
            $image->move($destinationPath, $storeImageName);
            UsersModel::where('id',$userid)->update(['image' => $storeImageName]);
            
            
        }

        if (!empty($request['oldpass'])  || !empty($request['newpass'])  || !empty($request['confirm']))
        {
            
            if($request['newpass'] == $request['confirm'])
            {  
                $oUser = UsersModel::where('id',Auth::user()->id)->first();
                if( Hash::check($request['oldpass'], Auth::user()->password, []))
                {
                    UsersModel::where('id',$userid)->update(['password' => bcrypt($request['newpass'])]);
                }
                else{
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'passerror' => ['passerror']
            ]);
            }
            }
            else{
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'coincidence' => ['coincidence']
                ]);
    
                 throw $error;
            }

        }
    

        if(!empty($request['name']))
        {
            UsersModel::where('id',$userid)->update(['name' => $request['name']]);
        }
        
        return redirect('/usr/profile');

    }

    public function show($id) {
        //
    }










}