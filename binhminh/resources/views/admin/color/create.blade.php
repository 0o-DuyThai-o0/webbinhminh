
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper"  class="col-md-9 admin-content">
            <h2> New Color </h2>
            {!! Form::open(array('action' => 'Admin\ColorController@store')) !!}
            <div class="row add-user">
                <div class="col-md-8">
                     <label for=""> Mã màu </label>
                     <input type="text" name="ma_mau" >
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