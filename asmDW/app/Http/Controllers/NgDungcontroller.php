<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NgDungcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::select('select * from nguoidung');
        return view('nguoidung.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created = DB::table('tlb_admin')->orderby('id')->get();
        return view('nguoidung.create')->with('created',$created);
    }
     public function active($idd)
    {
        DB::table('nguoidung')->where('id',$idd)->update(['status'=>1]);
        return redirect()->route('DSnguoidung')->with('message','kich hoat  thanh cong');
    }
     public function close($idd)
    {
        DB::table('nguoidung')->where('id',$idd)->update(['status'=>0]);
        return redirect()->route('DSnguoidung')->with('message','Chan thanh cong');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data=array();
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $address = $request->address;
        $status = $request->status;
        $created_by = $request->created_by;
        $updated_by = $request->updated_by;
        $get_image = $request->file('image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('/public/upload/nguoidung',$new_image);
            $data['image'] = $get_image;
            DB::insert('insert into nguoidung(username, fullname, address, email, phone, password, image, status, created_by, updated_by) values (?,?,?,?,?,?,?,?,?,?)',[$username, $fullname, $address, $email, $phone, $password, $get_image, $status, $created_by, $updated_by]);
            return redirect()->route('DSnguoidung')->with('message','Them moi thanh cong');
        }
        $data['image'] ='';
        

        $ketqua = DB::insert('insert into nguoidung(username, fullname, address, email, phone, password, image, status, created_by, updated_by) values (?,?,?,?,?,?,?,?,?,?)',[$username, $fullname, $address, $email, $phone, $password, $get_image, $status, $created_by, $updated_by]);

        if($ketqua){

            return redirect()->route('DSnguoidung')->with('message','Them moi thanh cong');
        } else 
            echo "<h1>Them moi that bai</h1>";
        $created = DB::table('tlb_admin')->orderby('id')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idd)
    {
        // lay record theo id
        $nguoidung = DB::table('nguoidung')->find($idd);
        // tra ve giao dien cung record vua tim duoc
        if(!empty($nguoidung)){
            return view('nguoidung.edit', compact('nguoidung'));
        } else {
            echo "<h1>Category not found</h1>";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // validate servers
        // nhận data từ form client
        $id = $request->id;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $address = $request->address;
        $created_by = $request->created_by;
        $updated_by = $request->updated_by;
        // cap nhat vào bảng category
        $result = DB::table('nguoidung')
                    ->where('id', $id)
                    ->update(["username"=>$username, "fullname"=>$fullname, "address"=>$address, "email"=>$email, "phone"=>$phone, "password"=>$password, "created_by"=>$created_by, "updated_by"=>$updated_by]);
        
        if ($result){
            // điều hướng trả về trang danh sách chuyên ngành
            // truyền đi biến flash session: chỉ tồn tại theo request/ response
            return redirect()->route('DSnguoidung')->with('message','Cập nhật thành công');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idd)
    {
        DB::table('nguoidung')->where('id', $idd)->delete();
        return redirect()->route('DSnguoidung')->with('message','Xóa thành công');
    }
}
