@include('admin.head')
<div class="container admin-admin">
    <div class="row">
        <div class="col-md-3">
            @include('admin.sitebar')
        </div>
            <div class="row">
                <div class="col_lg_12">
                    <h3 class="page-header">
                        Danh sách <small>trả lời Comment</small>
                    </h3>
                </div>  
            <div class="table-responsive" style="margin-top: 2%;">
                <table class="table">
                    <thead>
                        <tr class="rip_tr">
                            <th style="width: 20%; text-align: center">tên bài viết</th>
                            <th style="width: 20%; text-align: center">nội dung bình luận chính</th>
                            <th style="width: 20%;text-align: center">tên người Comment</th>
                            <th style="width: 20%;text-align: center">Nội dung trả lời</th>
                            <th style="width: 15%;text-align: center">Ngày đăng</th>
                            <th style="width: 5%;text-align: center">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($reply_comment as $tltt)
                            <tr>
                                <td tyle="text-align: center">{{$tltt->name}}</td>
                                <td tyle="text-align: center">{{$tltt->comment_body}}</td>
                                <td tyle="text-align: center">{{$tltt->user_id}}</td>
                                <td tyle="text-align: center">{{$tltt->comment_reply}}</td>
                                <td tyle="text-align: center">{{$tltt->created_at}}</td>
                                <td>
                                    <a href="../admin/reply_comment/delete/{{$tltt->id_reply}}" class="btn btn-success">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table></div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')