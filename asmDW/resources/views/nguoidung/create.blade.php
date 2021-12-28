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
	            <form role="form" action="{{route('THEMMOInguoidung')}}" method="post" enctype="multipart/form-data">
	            	@csrf

            	<div class="form-group">
	                <label for="exampleInputEmail1">Tên đăng nhập</label>
	                <input type="text" class="form-control" id="exampleInputEmail1" name="username" placeholder="Tên đăng nhập">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputPassword1">Mặt khẩu</label>
	                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Thư điện tử </label>
	                <input type="email" class="form-control"  id="exampleInputEmail1" name="email" placeholder="Thư điện thử @gmail.com @yahoo.com....">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Số điện thoại</label>
	                <input type="number" class="form-control" id="exampleInputEmail1" name="phone" placeholder="0123456789">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Họ và tên</label>
	                <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" placeholder="Nguyen Van A, Nguyen Thi T">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Địa chỉ</label>
	                <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Số / ngõ / ngách / thành phố ">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputFile">Ảnh đại diện</label>
	                <input type="file" name="image" id="exampleInputEmail1">
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
	                <label for="exampleInputEmail1">Người tạo</label>
	                <select class="form-control m-bot15" id="exampleInputEmail1" name="created_by">
	                		@foreach ($created as $cre => $name)
                                <option value="{{$name->admin_email}}">{{$name->admin_email}}</option>
                            @endforeach
                            </select>
	            </div>
	            <div class="form-group">
	                <label for="exampleInputEmail1">Người sửa</label>
	                <select class="form-control m-bot15" id="exampleInputEmail1" name="updated_by">
                            @foreach ($created as $cre => $name)
                            <option value="{{$name->admin_email}}">{{$name->admin_email}}</option>
                            @endforeach
                            </select>
	            </div>
	            
	            <button type="submit" name="THEMnguoidung" class="btn btn-info">Submit</button>
	        </form>
	        </div>

	    </div>
	</section>

</div>

@endsection