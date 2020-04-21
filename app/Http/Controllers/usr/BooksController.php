<?php
namespace App\Http\Controllers\usr;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;
use Auth;
use App\User;
use DB;
class BooksController extends Controller{

    public function index(){
        
        $aBooks = BooksModel::orderBy('name','asc')->get();
        $aUsers = UsersModel::where('name',Auth::user()->name)->get();
        
        
        foreach($aUsers as $oUser)
        {
            if(Auth::user()->id == $oUser->id)
            {
                $actualbooks = $oUser->actual_books;
            }
        }
        $i=0;
        foreach($aBooks as $oBook)
        {
            $available[$i]="yes";
            $aRecords = RecordsModel::where('bookid',$oBook->idbooks)->get();
            foreach($aRecords as $oRecord)
            {
                
                if($oRecord->dateReturn==NULL)
                {
                    $available[$i]="no";
                }
            }
            $i++;
        }
        return view('/usr/books.index',compact( 'aBooks','available','actualbooks'));

    }

    public function create(){
        $aRecords = RecordsModel::where('userid',Auth::user()->id)->where('dateReturn',NULL)->get();
        foreach($aRecords as $oRecord)
        {
            $aBooks = BooksModel::where('idbooks',$oRecord->bookid)->get();
            foreach($aBooks as $oBook)
            {
                $oRecord->bookid = $oBook->name;
            }
        }
        return view('/usr/books.return' ,['aRecords' => $aRecords]);
    }

    public function store(Request $request){
        
            if(!empty($request['book_id']) && $request['book_id']!='')
            {
            $bookid = $request['book_id'];
            $aData = array('dateRecord' => now() , 'bookid' => $bookid , 'userid' => Auth::user()->id );
            DB::table('records')->insert($aData);
            $aUsers = UsersModel::where('id',Auth::user()->id)->get();
            foreach($aUsers as $oUser)
            {
                $actualbooks=$oUser->actual_books; 
            }
            $actualbooks++;
            UsersModel::where('id',Auth::user()->id)->update(['actual_books' => $actualbooks]);

            }
        return redirect('/usr/books');
    }

    public function update(Request $request,$recordid)
    {
        RecordsModel::where('recordid',$recordid)->update(['dateReturn' => now()]);
        $aUsers = UsersModel::where('id',Auth::user()->id)->get();
        foreach($aUsers as $oUser)
        {
            $actualbooks=$oUser->actual_books; 
        }
        $actualbooks--;
        UsersModel::where('id',Auth::user()->id)->update(['actual_books' => $actualbooks]);
        
        
        return redirect('/usr/books');

    }

    public function show($id) {
        //
    }


}