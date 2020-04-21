<?php
namespace App\Http\Controllers\admin;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\RecordsModel;
use App\Models\BooksModel;
use Illuminate\Support\MessageBag;
use Auth;
use App\User;
use DB;
class BooksController extends Controller{

    public function index(){
        
        $aBooks = BooksModel::orderBy('name','asc')->get();
        // $available[];
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
        return view('/admin/abooks.index',compact( 'aBooks','available'));

    }

    public function create(){
        return view('/admin/abooks.create');
    }

    public function store(Request $request){
        
         $aValidations = array(
             'name' => 'required|max:60|alpha_num',
             'author' => 'max:60',
             'publisher' => 'max:60'
         );
         
         if ($request['date'] != '') {
            $aValidations['date'] = 'digits:4';
        }
         $this->validate($request, $aValidations);

        

        $name=$request['name'];
        if(empty($request['author']) || $request['author']=='')
        {
            $author='Anonimo';
        }
        else{
            $author=$request['author'];
        }

        if(empty($request['date']) || $request['date']=='')
        {
            $date='-';
        }
        else{
            $date=$request['date'];
        }

        if(empty($request['publisher']) || $request['publisher']=='')
        {
            $publisher='-';
        }
        else{
            $publisher=$request['publisher'];
        }

        $aData = array('name' => $name , 'author' => $author , 'date' => $date ,'publisher' => $publisher);
        
        // DB::table('books')->insert($aData);
        return redirect('/admin/abooks');
    }

    public function edit($bookid)
    {
        $oBook = BooksModel::where('idbooks',$bookid)->first();
        $image = $oBook->image;
        return view('/admin/abooks.edit',compact( 'bookid' , 'image'));
        
    }

    public function update(Request $request ,$bookid)
    {
        // $image = $request->file('image');
        // $extension = $image->getClientOriginalExtension();
        // Storage::disk('public')->put($image->getFilename().'.'.$extension, File::get($image))
        
        $aValidations = array(
            'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
        );

        $this->validate($request , $aValidations);

        if (!empty($request['image'])) {

            $image = $request['image'];
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            
            $destinationPath = 'uploads/books';
            $image->move($destinationPath, $storeImageName);

            
            
        }
        
        BooksModel::where('idbooks',$bookid)->update(['image' => $storeImageName]);

        return redirect('/admin/abooks');
    }

    public function show($id) {
        //
    }


}