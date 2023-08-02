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
            <h3 class="box-title"> </h3>

            <div class="form-group">
              <h5>Pilih jurusan <span class="text-danger">*</span></h5>
              <div class="controls">
                <form action="/setup/siswa/prestasi/cari" method="GET">
                  @csrf
                  <select name="cari"  required="" class="form-control">
                      <option value="IPA">IPA</option>
                      <option value="IPS">IPS</option>
    
                  </select>
                  <input type="submit" class="btn btn-rounded btn-info mt-5" value="Submit" >
                </form>
              </div>
          </div> 

            {{-- <a href="{{ route('add.siswa') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">IPA </a> --}}
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th width="5%">No</th>
                          <th>Name</th>
                          <th>jurusan</th>
                          {{-- <th>Hasil Perhitungan</th> --}}
                          <th>Status</th>
                          
                          {{-- <th width="25%">Action</th> --}}
                          
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $key => $siswa)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $siswa->nama }}</td>
                          <td>{{ $siswa->jurusan }}</td>
                          {{-- <td>{{ $siswa->hasil_hitung }}</td> --}}
                          @if($siswa->status=="Terpilih Menjadi Siswa Berprestasi")
                        
                          <td class="text-success">{{ $siswa->status }}</td>
                          @else
                          <td class="text-danger">{{ $siswa->status }}</td>
                          @endif
                          {{-- <td>
                            <a href="{{ route('data.siswa.edit',$siswa->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('data.siswa.delete',$siswa->id) }}" class="btn btn-danger" id="delete">Delete</a>
                          </td> --}}
                          
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