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
                       <form method="POST" action="{{ route('store.data.siswa') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jenis kelamin <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jenis_kelamin" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Laki - Laki">Laki - Laki</option>
                                          <option value="Perempuan">Perempuan</option>
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
                                      <input type="text" name="kelas" class="form-control" required="">
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jurusan <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jurusan"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Jurusan</option>
                                          <option value="IPA">IPA</option>
                                          <option value="IPS">IPS</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 2nd row --}}      

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