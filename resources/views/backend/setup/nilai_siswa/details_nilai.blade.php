@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  {{-- <h3 class="page-title">Assign Subject Data</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="/setup/assign/subject/view"><i class="mdi mdi-arrow-left-bold-circle"></i></a></li>
                          </ol>
                      </nav>
                  </div> --}}
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">List Nilai siswa </h3>
               
               
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4>
                    <strong>Nama : </strong> {{ $details['0']['siswa']['nama'] }}
                </h4>

                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">No</th>
                              <th width="20%">Mata pelajaran</th>
                              <th width="30%">Nilai Mata pelajaran </th>
                              <th width="20%">Nilai keaktifan </th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($details as $key => $detail)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $detail['mapel']['name']}}</td>
                              <td>{{ $detail->nilai_mapel }}</td>
                              <td>{{ $detail->nilai_keaktifan }}</td>
                              
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                          
                      </tfoot>
                    </table>

                    @php
                        $mapel = App\Models\SchoolSubject::all();
                        $totalMapel = count($mapel);
                        $NilaiMapel = App\Models\NilaiSiswa::select('nilai_mapel')->where('siswa_id', $detail->siswa_id)->sum('nilai_mapel');

                        $nilaiKeaktifan = App\Models\NilaiSiswa::select('nilai_keaktifan')->where('siswa_id', $detail->siswa_id)->sum('nilai_keaktifan')
                    @endphp

                    <div class="with-border">

                        <h5 class="box-title">Rata - rata Mata pelajaran : {{ $NilaiMapel/$totalMapel }}</h3> <br>
                        <h5 class="box-title">Rata - rata Keaktifan : {{ $nilaiKeaktifan/$totalMapel }}</h3>

                    </div>

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
    
    </div>
</div>


@endsection