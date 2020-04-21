<?php
namespace App\Http\Controllers\usr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;
use Auth;
use App\User;
use DB;
class HomeController extends Controller{

    public function index(){
        $aUsers = UsersModel::where('id',Auth::user()->id)->get();
        foreach($aUsers as $oUser)
        {
            $actual = $oUser->actual_books;
        }
        $aRecords = RecordsModel::where('userid',Auth::user()->id)->where('dateReturn',NULL)->get();
        foreach($aRecords as $oRecord)
        {
            $aBooks = BooksModel::where('idbooks',$oRecord->bookid)->get();
            foreach($aBooks as $oBook)
            {
                $name = $oBook->name;
            }
            $oRecord->bookid = $name;
        }

        return view('usr/home.index' , compact('actual','aRecords'));
    }




}