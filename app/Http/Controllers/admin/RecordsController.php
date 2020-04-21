<?php


namespace App\Http\Controllers\admin;
date_default_timezone_set('America/Buenos_Aires');
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;

use Auth;
use App\User;
use DB;
class RecordsController extends Controller{

    public function index(){
        $aRecords = RecordsModel::orderBy('dateRecord','asc')->get();

        foreach($aRecords as $oRecord)
        {
            $aBooks = BooksModel::where('idbooks',$oRecord->bookid)->get();
            foreach($aBooks as $oBook)
            {
            $oRecord->bookid = $oBook->name;
            }
            $aUsers = UsersModel::where('id',$oRecord->userid)->get();
            foreach($aUsers as $oUser)
            {
                $oRecord->userid = $oUser->email;
            }
        }


        return view('admin/records.index' , ['aRecords' => $aRecords]);




    }









}