<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\nguoidung;
class NguoidungController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        nguoidung::all();
        $nguoidung = nguoidung::all();
        return view('nguoidung.index', compact('nguoidung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $created = DB::table('tlb_admin')->orderby('id')->get();
        $nguoidung = nguoidung::all();
        return view('nguoidung.create', compact('nguoidung'))->with('created',$created);
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
        $obj = new nguoidung();
        $obj->username = $request->username;
        $obj->password = $request->password;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->fullname = $request->fullname;
        $obj->address = $request->address;
        $obj->status = $request->status;
        $obj->created_by = $request->created_by;
        $obj->updated_by = $request->updated_by;
        $obj->image = $request->file('image');

        if($obj->image){
            $get_name_image = $obj->image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$obj->image->getClientOriginalExtension();
            $obj->image->move(public_path('/upload/nguoidung'),$new_image);
            $obj->image = '/upload/nguoidung/'.$new_image;
            $res = $obj->save();
            return redirect()->route('DSnguoidung')->with('message','Them moi thanh cong');
        }
        $data['image'] ='';
        

        $res = $obj->save();

        if($res){

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
        $nguoidung = nguoidung::find($idd);
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
    public function update(Request $request, $id)
    {
        echo "id=".$id;
        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $phone = $request->phone;
        $fullname = $request->fullname;
        $address = $request->address;
        $created_by = $request->created_by;
        $updated_by = $request->updated_by;
        $image = $request->image;
        $status = $request->status;

        $nguoidung = nguoidung::find($id);
        $nguoidung->username = $username;
        $nguoidung->password = $password;
        $nguoidung->email = $email;
        $nguoidung->phone = $phone;
        $nguoidung->fullname = $fullname;
        $nguoidung->address = $address;
        $nguoidung->created_by = $created_by;
        $nguoidung->updated_by = $updated_by;
        $nguoidung->image = $image;
        $nguoidung->status = $status;
        $result = $nguoidung->save();


        $obj = new nguoidung();
        if ($result){

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
