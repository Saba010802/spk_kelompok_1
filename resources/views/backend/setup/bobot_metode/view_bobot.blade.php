@extends('admin.admin_master')

@section('admin')



<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
            
              </div>
          </div>
      </div>
       <!-- end Content Header (Page header) -->

      
      <!-- Main content -->
<section class="content">
    <div class="row">

      <div class="col-12">

       <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> Bobot Metode</h3>
            <a href="{{ route('add.bobot')  }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add bobot </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Kriteria</th>
                          <th>Bobot</th>
                          
                          <th width="25%">Action</th>
                          
                      </tr>
                  </thead>
                  <tbody>

                    @foreach ($alldata as $key => $bobot)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $bobot->kriteria }}</td>
                          <td>{{ $bobot->bobot }}</td>

                          <td>
                            <a href="{{ route('data.bobot.edit',$bobot->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('data.bobot.delete',$bobot->id) }}" class="btn btn-danger" id="delete">Delete</a>
                          </td>
                          
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      
                  </tfoot>
                </table>
              </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- /.box -->          
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->






@endsection