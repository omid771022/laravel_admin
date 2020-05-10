<?php
namespace App\Http\Controllers;
use App\managecomment;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\Requestmangecomment;
use Illuminate\Http\Request;
class ManagecommentController extends Controller
{
    public function index()
    {
 $mangecomment=managecomment::orderBy('id','DESC')->paginate(20);
    return view('back.managecomment.mangecomment',compact('mangecomment'));
    }
    
    public function store(Requestmangecomment $request)
    {
        $mangecomment = new managecomment();
        $mangecomment->name = $request->input('name');
        $mangecomment->email = $request->input('email');
        $mangecomment->comment = $request->input('comment');
        $mangecomment->save();
        $msg = 'تظر شا ارسال شد  در اولین  فرصت به شما پاسخ داده  میشود ';
        return redirect('/')->with('success', $msg);

    }
    public function destroy(managecomment $managecomment)
    {
//        $managecomment->delete();
//        $msg = "با موفقیت حذف شد ";
//        return redirect('/admin/mangecomment')->with('success', $msg);
    }
}
