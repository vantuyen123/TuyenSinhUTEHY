@extends('admin.Base')
@section('title','Danh mục Bài viết')
@section('main')
    <style>
        .btn{
            padding: 0;
        }
    </style>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{asset('admin')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Bài viết</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bài viết</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-primary" href="{{asset('admin/post/add')}}">Thêm Bài viết</a>
                </div>
                <div class="panel-body">
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả ngắn</th>
                                <th># Tag</th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th>Thời gian tạo</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img class="thumbnail" width="100px" src="{{isset($item->coverimg)?asset('../storage/app/media/'.$item->coverimg):asset('public/Admin/img/spkthy.png')}}" ></td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->tag}}</td>
                                    <td>{{$item->status==1?'Hiện thị':'Ẩn'}}</td>
                                    <th>{{$item->iduser}}</th>
                                    <th>{{$item->created_at}}</th>
                                    <td>
                                        <a class="btn btn-info" href="{{asset('admin/post/update/'.$item->id)}}">Sửa</a>
                                        <a class="btn btn-danger" href="{{asset('admin/post/delete/'.$item->id)}}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">tuyensinh.utehy.edu.vn</p>
    </div>
    </div><!-- /.row -->
@stop
