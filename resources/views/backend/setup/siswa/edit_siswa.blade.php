@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add data siswa </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.data.siswa', $alldata->id) }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama" class="form-control" required="" value="{{ $alldata->nama}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jenis kelamin <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jenis_kelamin" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Laki - Laki" {{ ($alldata->jenis_kelamin == 'Laki - Laki')? 'selected': '' }}>Laki - Laki</option>
                                          <option value="Perempuan" {{ ($alldata->jenis_kelamin == 'Perempuan')? 'selected': '' }}>Perempuan</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 1st row --}}


                             <div class="row"> {{--first 2nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Kelas <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="kelas" class="form-control" required="" value="{{ $alldata->kelas}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jurusan <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jurusan"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Jurusan</option>
                                          <option value="IPA" {{ ($alldata->jurusan == 'IPA')? 'selected': '' }}>IPA</option>
                                          <option value="IPS" {{ ($alldata->jurusan == 'IPS')? 'selected': '' }}>IPS</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 2nd row --}}  


                             <div class="row"> {{--first 3nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama wali <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama_wali" class="form-control" required="" value="{{ $alldata->nama_wali}}">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Penghasilan wali <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="penghasilan_wali" class="form-control" required="" value="{{ $alldata->penghasilan_wali}}">

                                      @error('penghasilan_wali')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 3nd row --}}   

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
                               <a href="{{ route('siswa') }}" class="btn btn-rounded btn-primary mb-5">Back</a>
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>


    
    </div>
</div>


@endsection