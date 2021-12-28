@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
	<section class="panel">
	    <header class="panel-heading">
	        Đăng ký người dùng
	    </header>
	    <div class="panel-body">
	        <div class="position-center">
	            <form role="form" action="{{route('UPDATEnguoidung', $nguoidung->id)}}" method="post" enctype="multipart/form-data">
	            	@csrf
	            	@method('put')
	            	<div class="form-group">
	            		<input type="hidden" name="id" id="id" value="{{$nguoidung->id}}"/>
	                <label">Tên đăng nhập</label>
	                <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập" value="{{$nguoidung->username}}"> 
	            </div>
	            <div class="form-group">
	                <label >Mặt khẩu</label>
	                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" value="{{$nguoidung->password}}">
	            </div>
	            <div class="form-group">
	                <label >Thư điện tử </label>
	                <input type="email" class="form-control"  id="exampleInputEmail1" name="email" placeholder="Thư điện thử @gmail.com @yahoo.com...."value="{{$nguoidung->email}}">
	            </div>
	            <div class="form-group">
	                <label >Số điện thoại</label>
	                <input type="number" class="form-control" name="phone" placeholder="0123456789"value="{{$nguoidung->phone}}">
	            </div>
	            <div class="form-group">
	                <label >Họ và tên</label>
	                <input type="text" class="form-control" name="fullname" placeholder="Nguyen Van A, Nguyen Thi T"value="{{$nguoidung->fullname}}">
	            </div>
	            <div class="form-group">
	                <label >Địa chỉ</label>
	                <input type="text" class="form-control" name="address" placeholder="Số / ngõ / ngách / thành phố "value="{{$nguoidung->address}}">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputFile">Ảnh đại diện</label>
	                <input type="file" name="image" id="exampleInputEmail1" value="{{$nguoidung->image}}">
	                <p class="help-block">Cho phép ảnh : jpeg,jpg,png</p>
	                
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Trạng thái</label>
	                <select class="form-control m-bot15" id="exampleInputEmail1" name="status">
                                <option value="1">Được phép đăng nhập</option>
                                <option value="0">Không được phép đăng nhập</option>
                                
                            </select>
	            </div>
	            <div class="form-group">
	                <label >Người tạo</label>
	                <input type="text" class="form-control" name="created_by" placeholder=" "value="{{$nguoidung->created_by}}">
	            </div>
	            <div class="form-group">
	                <label >Người sửa</label>
	                <input type="text" class="form-control" name="updated_by" placeholder=" "value="{{$nguoidung->updated_by}}">
	            </div>

	            <button type="submit" name="edit" class="btn btn-info">Cập nhật</button>
	        </form>
	        </div>

	    </div>
	</section>

</div>
@endsection