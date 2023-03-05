
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper" class="col-md-9 admin-content">
        @include('admin.succsess')
            <div class="row">
                <h2>ALl Color Product  </h2>
            </div>
            <div class="row">
                <table class="table table-bordered edit-son">
                    <thead>
                    <tr>
                        <th>stt</th>
                        <th>Mã màu </th>
                        <th> Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $stt=0;$stt<=20;?>
                        @foreach($color as $hm)
                       <?php $stt++; ?>
                     <tr>
                          <td><?= $stt;?></td>
                          <td>
                              <div style="width: 50px;height: 50px;background:<?= $hm->ma_mau;?>"></div>
                          </td>
                       
                         
                         <td>
                             <div class="action-home">
                                 <a href="/binhminh/admin/color/<?php echo $hm->id ?>/edit"><button type="button" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa !" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                     </button>
                                 </a>
                                  <form class="delete" action="{{ route('Deteleatt' , $hm->id)}}" method="POST" style="display: inline-block;">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <div class="no-border ">
                                        <button type="submit" class="btn btn-danger btn-round btn-just-icon btn-sm" id="b4"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
                                    </div>
                                 </form>
                                 <script>
                                        $(".delete").on("submit", function(){
                                            return confirm("Bạn có muốn xóa không ?");
                                        });
                                 </script>

                         </td>
                     </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@include('admin.footer')