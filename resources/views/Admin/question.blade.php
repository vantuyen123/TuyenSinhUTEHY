@extends('admin.Base')
@section('title','Danh mục bài viết')
@section('main')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{asset('admin')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">quản lý câu hỏi</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Thêm mới câu hỏi
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới câu hỏi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="{{ url('/admin/question') }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Tiêu đề câu hỏi</label>
                            <input class="form-control title" placeholder="Tiêu đề câu hỏi" name="title">
                        </div>
                        <div class="form-group">
                            <label>Nội dung câu hỏi</label>
                            <textarea class="form-control" rows="5" id="contents" name="contents"
                                      placeholder="Nội dung câu hỏi"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">Hoạt động</option>
                                <option value="0">Không hoạt động</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{----------------------------------------------------------}}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Danh sách câu hỏi</div>
                <div class="panel-body">
                    <div class="col-md-8">
                        <table id="tb1" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tiêu đề câu hỏi</th>
                                <th>Nội dung câu hỏi</th>
                                <th>Tên người đăng</th>
                                <th>Trạng thái</th>
                                <th>Tùy chọn</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($items as $item)
                                <tr class="onRow">
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->contents}}</td>
                                    <td>{{$item->iduser}}</td>
                                    <td>{{$item->status==1?'Hiện thị':'Không hiện thị'}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"
                                           href="{{asset('admin/question/update'.$item->id)}}">Sửa</a>
                                        <a class="btn btn-danger btn-xs"
                                           href="{{asset('admin/question/delete/'.$item->id)}}">Xóa</a>
                                        <a class="btn btn-success btn-xs"
                                           href="{{asset('admin/question/detail/'.$item->id)}}">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        @if(isset($itemsComment))
                            <ul class="list-group list-group-flush">
                                @foreach($itemsComment as $item)
                                    @if($item->parentid==null)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <a href="#">
                                                    {{$item->username}}
                                                </a>
                                                <div class="comment-text">
                                                    {{$item->comment}}
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <a class="btn btn-danger btn-xs"
                                                   href="{{asset('admin/comment/delete/'.$item->idcomment)}}">Xóa</a>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach($itemsComment as $item2)
                                                @if($item->idcomment==$item2->parentid)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <a href="#">
                                                                    {{$item2->username}}
                                                                </a>
                                                                <div class="comment-text">
                                                                    {{$item2->comment}}
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a class="btn btn-danger btn-xs"
                                                                   href="{{asset('admin/comment/delete/'.$item2->idcomment)}}">Xóa</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                            <form method="post">
                                                {{csrf_field()}}
                                                <input type="text" class="form-control" name="comment">
                                                <input type="hidden" class="form-control" name="parentid" value="{{$item->idcomment}}">
                                                <button class="btn btn-secondary">Bình luận</button>
                                            </form>
                                        </ul>
                                    </li>
                                    @endif
                                @endforeach
                                <form method="post">
                                    {{csrf_field()}}
                                    <input type="text" class="form-control" name="comment">
                                    <button class="btn btn-secondary">Bình luận</button>
                                </form>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <style>
        .widget .panel-body {
            padding: 0px;
        }

        .widget .list-group {
            margin-bottom: 0;
        }

        .widget .panel-title {
            display: inline
        }

        .widget .label-info {
            float: right;
        }

        .widget li.list-group-item {
            border-radius: 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        .widget li.list-group-item:hover {
            background-color: rgba(86, 61, 124, .1);
        }

        .widget .mic-info {
            color: #666666;
            font-size: 11px;
        }

        .widget .action {
            margin-top: 5px;
        }

        .widget .comment-text {
            font-size: 12px;
        }

        .widget .btn-block {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }
    </style>
    <div class="col-sm-12">
        <p class="back-link">tuyensinh.utehy.edu.vn</p>
    </div>
    </div><!-- /.row -->
@stop
