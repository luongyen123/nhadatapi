<?php

namespace App\Http\Controllers;

use App\User;
use App\Tintuc;
use App\Xaphuong;
use App\Tinmuaban;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use App\Http\Resources\TinmuabanCollection;
use App\Quanhuyen;
use App\Tinh;
use App\Loaitin;

class HomeController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index(){
        $number_tinmua = Tinmuaban::count();
        $number_tintuc = Tintuc::where('loaitin_id',2)->count();
        $number_tinduan = Tintuc::where("loaitin_id",1)->count();
        $number_user = User::count();
        $title = "Home page Admin";
        $id = "home";
        return view('contents.index',\compact(['number_tinmua','title','id','number_tintuc','number_tinduan','number_user']));
    }
    /**
     * Loai bai ==1=> them tin mua ban
     * Loai bai ==2 => them tin tuc nha dat
     */
    public function createNews(Request $request){
        $loaibai = $request->loaibai;
        
        if($loaibai ==1){
            $slug = $this->createSlug($request->tieude,$loaibai);
            $request->request->set('slug',$slug);
            $data = Tinmuaban::createTinmuaban($request->all());
        }else{
            $slug = $this->createSlug($request->tieude,$loaibai);
            $request->request->set('slug',$slug);
            $data = Tintuc::createNews($request->all());
        }
        return $this->successResponseMessage($data,200,"Tao thanh cong");
    }

    public function getTinmuaban(){
        $title ="Tin mua bán";
        $id = "tinmuaban";

        $tinmuaban = Tinmuaban::paginate(10);       

        return view('contents.tinmuaban',\compact(['tinmuaban','title','id']));
    }
    public function getTintucnhadat($idTin){
        $loaitin = Loaitin::findorFail($idTin);       
        $title = $loaitin->Tenloaitin;
        $id = "tintucduan".$idTin;
          
        $tintucs = Tintuc::where('loaitin_id',$idTin)->paginate(10);
        return view('contents.tintucnhadat',\compact(['tintucs','title','id']));
    }
    public function getEditTinmua($idTin){
        
        $title ="Sửa bài viết Tin mua bán nhà đất";
        $id = "tinmuaban";
        $tinmua = Tinmuaban::where('id',(int)$idTin)->first();
      
        return view('contents.editTinmua',\compact(['tinmua','title','id']));
    }
    public function postEditTinmua(Request $request){
        $id = $request->news_id;

        if($request->tinhthanh == ""){
            $request->request->set('tinhthanh', $request->matinh_id);
        }
        if($request->quanhuyen == ""){
            $request->request->set('quanhuyen', $request->maqh_id);
        }
        if($request->xaphuong == ""){
            $request->request->set('xaphuong', $request->maxp_id);
        }
        $data = Tinmuaban::updateTinmua($request->all(),$id);
        return $this->successResponseMessage($data,200," Sửa thành công");
    }

    public function getEditTintuc($idTin){
        $title ="Sửa bài viết Tin mua bán nhà đất";
        $id = "tintucnhadat";
        $tintuc = Tintuc::where('id',(int)$idTin)->first();
      
        return view('contents.editTintuc',\compact(['tintuc','title','id']));
    }

    public function postEditTintuc(Request $request){
        $data = Tintuc::updateTintuc($request->all(),$request->news_id);
        return $this->successResponseMessage($data,200," Sửa thành công");
    }

    public function getUser(){
        $title ="Quản lý user";
        $id = "quanlyuser";

        $users = User::paginate(10);       

        return view('contents.listUser',\compact(['users','title','id']));
    }

    public function activeUser($id){
        $user = User::findorFail($id);
        if($user->status ==1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();  
       return \redirect('admin/getUser');
    }

    public function editUser($idUser){
        $user_edit = User::findorFail($idUser);
        $title ="Edit user";
        $id = "quanlyuser";
        return view('contents.editUser',\compact(['user_edit','title','id']));
    }

    public function postEditUser(Request $request){
        $data = User::editUser($request->all(),$request->user_id);
        return $this->successResponseMessage(new UserResource($data), 200, "Update thanh cong");
    }

    public function deleteUser($id){
        $user = User::findorFail($id);
        $user->delete();
       return \redirect('admin/getUser');
    }
    public function deleteTintuc($id){
        $tintuc = Tintuc::findorFail($id);
        $tintuc->delete();
       return redirect()->route('admin/tintucnhadat/', ['id' => $tintuc->loaitin_id]);
    }
    public function deleteTinmua($id){
        $tinmua = Tinmuaban::findorFail($id);
        $tinmua->delete();
       return \redirect('admin/tinmuaban');
    }
    public function getTailieu(){
        $title ="Tai lieu he thong";
        $id = "tailieu";

        // $users = User::paginate(10);       

        return view('contents.tailieu',\compact(['title','id']));
    }
    public function createSlug($title,$type)
    {
        $id=0;
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id,$type);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0,$type)
    {    
        if($type ==1){
            return DB::table('tinmuaban')->select('slug')
            ->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)->get();
        }else{
            return DB::table('tintuc')->select('slug')
            ->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)->get();
        }  
                  
    }
    public function createXaphuong(Request $request){
        $slug = str_slug("tin tuc mua ban ".$request->type." ".$request->tenxa);       
       $request->request->set('slug',$slug);

       $xaphuong = Xaphuong::createNews($request->all());
       return redirect('/admin/quanhuyen');
    }
    public function createQuanhuyen(Request $request){
        $slug = str_slug("tin tuc mua ban ".$request->type." ".$request->tenqh);       
       $request->request->set('slug',$slug);

       $quanhuyen = Quanhuyen::createNews($request->all());
       return redirect('/admin/quanhuyen');
    }

    public function createTinh(Request $request){
        $slug = str_slug("tin tuc mua ban ".$request->type." ".$request->tentinhtp);       
       $request->request->set('slug',$slug);

       $tinh = Tinh::createNews($request->all());
       return redirect('/admin/quanhuyen');
    }

    public function loaiTin(){
        $loaitin = Loaitin::paginate();
        $id="theloai";
        $title="Phân loại tin tức";
        return view('contents.loaiTin',\compact(['loaitin','title','id']));
    }
    public function createThemloai(Request $request){
        $slug = str_slug($request->Tenloaitin);       
        $request->request->set('slug',$slug);
        $loaitin = Loaitin::createNews($request->all());
        return redirect('/admin/loaiTin');
    }
}
