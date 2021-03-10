@extends('admin.Base')
@section('title','Danh mục Bài viết')
@section('main')
    <script type="text/javascript">
        function changeImg(input) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function () {
            $('#avatar').click(function () {
                $('#img').click();
            });
        });
    </script>
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Bài viết/ Thêm mới</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($item))
                        Sửa Bài viết
                    @else
                        Thêm Bài viết
                    @endif</div>
                <div class="panel-body">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Danh mục bài viết</label>
                                <br>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Danh mục bài viết <span class="caret"></span></button>
                                    <ul class="dropdown-menu" style="color: black !important;">
                                        @foreach($itemsCategory as $itemCate)
                                            @if($itemCate->status==1)
                                                <?php $check = 0?>
                                                @if(isset($itemCatecheck))
                                                    @foreach($itemCatecheck as $itemCheck)
                                                        @if($itemCate->id==$itemCheck->idca)
                                                            <?php $check = 1;?>
                                                            <li><input type="checkbox" value="{{$itemCate->id}}"
                                                                       checked="checked"
                                                                       name="idcategory[]">{{$itemCate->title}}</li>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($check==0)
                                                    <li><input type="checkbox" value="{{$itemCate->id}}"
                                                               name="idcategory[]">{{$itemCate->title}}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Tên Bài viết</label>
                                <input class="form-control" placeholder="tên Bài viết" name="title"
                                       value="{{isset($item->title)?$item->title:''}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>#Tag</label>
                                <input class="form-control" placeholder="#tag" name="tag"
                                       value="{{isset($item->tag)?$item->tag:''}}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Trạng thái Bài viết</label>
                                <select name="status" class="form-control">
                                    <option value="1"
                                            selected {{isset($item->status)?($item->status==1?'selected':''):''}}>
                                        Hiện
                                    </option>
                                    <option value="0" {{isset($item->status)?($item->status==0?'selected':''):''}}>
                                        Ẩn
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <br>
                                    <textarea class="form-control" rows="5" name="description"
                                              placeholder="mô tả ngắn">{{isset($item->description	)?$item->description	:''}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input id="img" type="file" name="coverimg" value="" class="form-control"
                                           onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px"
                                         src="{{isset($item->coverimg)?asset('public/media/'.$item->coverimg):asset('public/Admin/img/spkthy.png')}}">
                                    <p class="help-block">Ảnh đại diện.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label>Mô tả Bài viết</label>
                                <br>
                                <textarea class="form-control ckeditor" rows="5" name="contents"
                                          placeholder="mô tả">{{isset($item->contents)?$item->contents:''}}</textarea>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace('contents', {
                                        language: 'vi',
                                        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                                        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                                        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    });
                                </script>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div><!-- /.panel-->
    </div><!-- /.col-->
    <div class="col-sm-12">
        <p class="back-link">tuyensinh.utehy.edu.vn</p>
    </div>
    </div><!-- /.row -->
@stop
