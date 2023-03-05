<?php namespace App\Http\Controllers\Site;
use App\comment;
use Illuminate\Support\Facades\DB;
?>

<div class="container">
    <div class="comment-area  mt-4">
        <div class="card card-body">
            <h6 class="card-title">Leave a comment</h6>
            <form action="{{url('comments')}}" method="POST">
                <input type="hidden" value="<?php echo $product->id; ?>" name="id">
                <div class="mhap d-flex">
                    <input name="comment_body" class="form-control" rows="3" required style="border-radius: 10px; border: #ccc solid 2px" placeholder="Write comment ...">
                </div>
            </form>
        </div>
    </div>

    <div class="in_ra_comment" style="max-height: 500px; overflow-x: auto; padding: 10px; border: #ccc solid 1px; margin: 20px 0 ">
        @foreach (db::table('comments')->get() as $tt)

            <?php if($product->id == $tt->id) { ?>
                <div class="user" style="display: flex; margin: 10px 0; ">
                    <div class="avatar_user" style="margin: 10px 0">
                        <img src="./public/img/img_user.jpg" alt="" width="40px" height="40px" style="border-radius: 20px">
                    </div>

                    <div class="comment_ben_trong" style="margin-left:10px; background-color:#ccc;border-radius: 20px;padding:10px 20px">
                        <div class="name_user">
                            <b>User</b>
                        </div>

                        <div class="binhluanchinh">
                            {{$tt->comment_body}}  
                        </div>

                        
                        <div class="the_edit" style="margin: 0 10px">
                            <label for="input-check" class="reply pl-0">
                                    <b>
                                        <a href="binhminh/comment/delete/{{$tt->id_cm}}" class="">
                                            Delete
                                        </a>    
                                    </b>
                            </label>
                        </div>
                        
                    </div>
                </div>   
                    
                <div class="tra_loi" style="padding 10px 20px">
                    @include('site.reply_comment')
                </div>
                
            <?php } ?>
        @endforeach
    </div>
</div>


