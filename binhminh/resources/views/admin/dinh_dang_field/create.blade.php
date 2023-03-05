
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper"  class="col-md-9 admin-content">
            <h2>Định dạng Mới</h2>
            {!! Form::open(array('action' => 'Admin\SizeController@store')) !!}
            <div class="row add-user">
                <div class="col-md-1">
                    Tên Định dạng
                </div>
                <div class="col-md-11">
                    {!! Form::text('ten_dinh_dang','',array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="row add-user">
                <div class="col-md-1">
                   Mô tả
                </div>
                <div class="col-md-11">
                    {!! Form::text('mo_ta','',array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="row add-user">
                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    {!! Form::submit('Create',array('class' => 'btn btn-default')) !!}
                </div>
            </div>

            {!! Form::close() !!}



        </div>

    </div>

</div>
@include('admin.footer')