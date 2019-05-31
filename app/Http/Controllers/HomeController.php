<?php

namespace App\Http\Controllers;

use App\User;
use App\Tintuc;
use App\Tinmuaban;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TinmuabanCollection;

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
            $data = Tinmuaban::createTinmuaban($request->all());
        }else{
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
       
        if($idTin == 1){
            $title ="Tin tức dự án";
            $id = "tintucduan";
        }else{
            $title ="Tin tức nhà đất";
            $id = "tintucnhadat";
        }   
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
}
