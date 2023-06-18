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
            <h3 class="box-title"> Nilai Siswa</h3>
            <a href="{{ route('add.nilai.siswa') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add nilai </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Name</th>
                          <th>Kelas</th>
                          <th>jurusan</th>
                          <th width="35%">Action</th>
                          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($Alldata as $key => $nilai)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $nilai['siswa']['nama'] }}</td>
                          <td>{{ $nilai['siswa']['kelas'] }}</td>
                          <td>{{ $nilai['siswa']['jurusan']}}</td>

                          <td>
                            <a href="{{ route('nilai.siswa.edit',$nilai->siswa_id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('nilai.siswa.details',$nilai->siswa_id) }}" class="btn btn-primary">Detail</a>
                            <a href="{{ route('nilai.siswa.delete',$nilai->siswa_id) }}" class="btn btn-danger" id="delete">Delete</a>
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