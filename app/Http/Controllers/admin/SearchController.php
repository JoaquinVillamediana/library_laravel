<?php
namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BooksModel;
use Auth;
use App\User;
use DB;
class SearchController extends Controller{

    public function index(){
        return view('frontend/search.index');
    }

    public function search(Request $request){
        $type = $request['type'];
        $word = $request['word'];
        
        if($type == "author" )
        {
            $aSearchBooks = BooksModel::where('author','like','%'.$word.'%')->orderBy('idbooks','asc')->get();
        }

        if($type == "name" )
        {
            $aSearchBooks = BooksModel::where('name','like','%'.$word.'%')->orderBy('idbooks','asc')->get();
        }

        if($type == "publisher" )
        {
            $aSearchBooks = BooksModel::where('publisher','like','%'.$word.'%')->orderBy('idbooks','asc')->get();
        }      
    // var_dump($aSearchBook);
        return view('frontend/search.index' , ['aSearchBooks' => $aSearchBooks]);
    }

    

}
















?>