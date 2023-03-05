
@include('admin.head')
<div id="wrapper"  class="container admin-admin">
    <div class="row">
        <div id="sidebar-wrapper" class="col-md-3">
            @include('admin.sitebar')
        </div>
        <div id="page-content-wrapper"  class="col-md-9 admin-content">
            <h2> New Field  Vị trí </h2>
            @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            {!! Form::open(array('action' => 'Admin\PriceController@store')) !!}
            <div class="row add-user">
                <div class="col-md-1">
                    Name Field
                </div>
                <div class="col-md-11">
                    {!! Form::text('name_field', '', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="row add-user">
                <div class="col-md-1">
                  Số Vị trí
                </div>
                <div class="col-md-11">
                    {!! Form::text('stt', '', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="row add-user">
                <div class="col-md-1">
                  Mô tả 
                </div>
                <div class="col-md-11">
                    {!! Form::text('mo_ta', '', array('class' => 'form-control')) !!}
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