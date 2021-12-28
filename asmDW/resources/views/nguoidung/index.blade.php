@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách người dùng
    </div>
    @if (session()->has('message'))
			<div class="alert alert-success">
				{{session()->get('message')}}
			</div>
	@endif
    <div class="row w3-res-tb">
    <div class="table-responsive">
    	<div>
    		<a class="btn btn-success" href="{{URL::to('/THEMnguoidung')}}">Thêm mới người dùng</a>
    	</div>
    	
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Ảnh Đại diện</th>
            <th>Tên người dùng</th>
            <th>Thư điện tử </th>
            <th>Số điện thoại</th>
            <th>Họ và tên</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Người tạo</th>
            <th>Người sửa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          		$stt = 0;
          	@endphp
          	@foreach ($nguoidung as $item)
            <tr>
              <th scope="row">{{ ++$stt }}</th>
              <td><img src="{{asset($item->image) }}" height="100" width="100"></td>
              <td>{{ $item->username }}</td>
              <td>{{ $item->email }}</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->fullname }}</td>
              <td>{{ $item->address }}</td>
              <td>
              	@php

					if($item->status==0){
				@endphp
						 '<a href="{{URL::to('/mokhoa/'.$item->id)}}"><span class="fa-times-styling fa fa-times-circle"></span></a>';
				@php
					}else{
				@endphp
						 '<a href="{{URL::to('/khoa/'.$item->id)}}"><span class="fa-check-styling fa fa-check-circle"></span></a>';
				@php
					}
              	@endphp
              </td>
              <td>{{ $item->created_by }}</td>
              <td>{{ $item->updated_by }}</td>
              <td>
              	<a href="{{URL::to('/SUAnguoidung/'.$item->id)}}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-active"></i></a>
              	<a href="{{URL::to('/XOAnguoidung/'.$item->id)}}" onclick="return confirm('are you sure?')" class="active styling-delete" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection