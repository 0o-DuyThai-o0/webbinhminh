@include('admin.head')
<div class="container admin-admin">
    <div class="row">
        <div class="col-md-3">
            @include('admin.sitebar')
        </div>
            <div class="row">
                <div class="col_lg_12">
                    <h3 class="page-header">
                        Danh sách <small>Comment</small>
                    </h3>
                </div>  
            <div class="table-responsive" style="margin-top: 2%;">
                <table class="table">
                    <thead>
                        <tr class="rip_tr">
                            <th style="width: 20%; text-align: center">tên bài viết</th>
                            <th style="width: 20%;text-align: center">tên người Comment</th>
                            <th style="width: 30%;text-align: center">Nội dung comment</th>
                            <th style="width: 20%;text-align: center">Ngày đăng</th>
                            <th style="width: 10%;text-align: center">Delete</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($comment as $tt)
                            <tr>
                                <td tyle="text-align: center">{{$tt->name}}</td>
                                <td tyle="text-align: center">{{$tt->user_id}}</td>
                                <td tyle="text-align: center">{{$tt->comment_body}}</td>
                                <td tyle="text-align: center">{{$tt->created_at}}</td>
                                <td>
                                    <a href="../admin/comment/delete/{{$tt->id_cm}}" class="btn btn-success">
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