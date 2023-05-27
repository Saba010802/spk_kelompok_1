@extends('admin.admin_master')

@section('admin')


  <div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
              
              
             
             
              
              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                             WELCOME {{ Auth::User()->role}}
                              
                          </h4>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              
                          </div>
                      </div>
                  </div>  
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>

@endsection

