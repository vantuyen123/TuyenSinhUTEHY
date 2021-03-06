@extends('admin.Base')
@section('title','Tin nhắn')
@section('main')
    {{--{{$items2}}--}}
    <h3 class=" text-center">Tin nhắn</h3>
    {{--{{$items}}--}}
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Hộp thoại</h4>
                    </div>
                    <div class="chatNew">
                        <a href="{{asset('admin/messenger')}}" class="btn btn-primary">Tạo tin nhắn</a>
                    </div>
                </div>
                <div class="inbox_chat">
                    @foreach($items as $item)
                        <div class="chat_list active_chat row">
                            <div class="chat_people col-sm-10">
                                <a href="{{asset('admin/messenger/chat/'.$item->idguest)}}">
                                    <div class="chat_img"><img
                                                src="{{isset($item->img)?(asset('public/media/'.$item->img)):'img/user-profile.png'}}"
                                                alt="sunil"></div>
                                    <div class="chat_ib">
                                        <h5>{{$item->username}}</h5>
                                        <p>Nội dung tin nhắn...</p>
                                    </div>
                                </a>
                            </div>
                            @if(isset($items2))
                                @foreach($items2 as $item2)
                                    @if($item2->status==1&&$item->idguest==$item2->iduser)
                                        <div class="col-sm-2">
                                            <span class="indicator label-danger"></span>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @if(isset($itemDetail))
                <div class="mesgs old">
                    <div class="msg_history">
                        @foreach($itemDetail as $chat)
                            @if($chat->iduser==Auth::user()->id)
                                @if(isset($chat->contents))
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p>{{$chat->contents}}</p>
                                            <span class="time_date"> {{$chat->created_at}}</span></div>
                                    </div>
                                @endif
                            @else
                                @if(isset($chat->contents))
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"><img
                                                    src="{{isset($infoguest->img)?asset('public/media/'.$infoguest->img):'img/user-profile.png'}}"
                                                    alt="sunil"></div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p>{{$chat->contents}}</p>
                                                <span class="time_date"> {{$chat->created_at}}</span></div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="type_msg">
                        <form method="post">
                            {{csrf_field()}}
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" name="contents" placeholder="Viết tin nhắn ..."/>
                                <button class="msg_send_btn"><i class="fa fa-paper-plane-o"
                                                                aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="mesgs new">
                    <div class="type_msg">
                        <form method="post" action="{{asset('admin/messenger/new')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input class="form-control" type="email" name="email"
                                       placeholder="Email người nhận ...">
                                @if ( Session::has('error') )
                                    <span style="color: red">{{session('error')}}</span>
                                @endif
                            </div>
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" name="contents" placeholder="Viết tin nhắn ..."/>
                                <button class="msg_send_btn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <p class="text-center top_spac"> Design by <a target="_blank" href="#">tuyensinh.utehy.edu.vn</a></p>
    </div>
    <style>
        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            padding:
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>

@stop