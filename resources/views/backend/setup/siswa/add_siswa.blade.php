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
                                      <input type="text" name="nama" class="form-control" required="" value="{{ old('nama') }}">

                                    @error('nama')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jenis kelamin <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jenis_kelamin" id="gender" required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Gender</option>
                                          <option value="Laki - Laki" {{ old('jenis_kelamin') == "Laki - Laki" ? 'selected' : null }}>Laki - Laki</option>
                                          <option value="Perempuan" {{ old('jenis_kelamin') == "Perempuan" ? 'selected' : null }}>Perempuan</option>
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
                                      <input type="text" name="kelas" class="form-control" required="" value="{{ old('kelas') }}">

                                      @error('kelas')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Jurusan <span class="text-danger">*</span></h5>
                                  <div class="controls">
                          
                                      <select name="jurusan"  required="" class="form-control">
                                          <option value="" selected="" disabled="" >Select Jurusan</option>
                                          <option value="IPA" {{ old('jurusan') == "IPA" ? 'selected' : null }}>IPA</option>
                                          <option value="IPS" {{ old('jurusan') == "IPS" ? 'selected' : null }}>IPS</option>
                                      </select>
        
                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 2nd row --}}  
                             
                             <div class="row"> {{--first 3nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama Ayah <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama_ayah" class="form-control" required="" value="{{ old('nama_ayah') }}">

                                      @error('nama_ayah')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Pekerjaan Ayah <span class="text-danger">*</span></h5>
                                  <div class="controls">

                                    <select name="pekerjaan_ayah"  required="" class="form-control">
                                      <option value="" selected="" disabled="" >Select pekerjaan</option>
                                      <option value="20" >PNS</option>
                                      <option value="50" >Karyawan</option>
                                      <option value="70" >Petani</option>
                                      <option value="70" >Nelayan</option>
                                      <option value="100" >Buruh</option>
                                      <option value="60" >Pedagang</option>
                                      <option value="30" >Penambak Ikan</option>
                                      <option value="0" >Tidak Bekerja</option>
                                    </select>

                                      @error('pekerjaan_ayah')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 3nd row --}} 

                             <div class="row"> {{--first 4nd row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama Ibu <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="nama_ibu" class="form-control" required="" value="{{ old('nama_ibu') }}">

                                      @error('nama_ibu')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Pekerjaan Ibu <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                    <select name="pekerjaan_ibu"  required="" class="form-control">
                                      <option value="" selected="" disabled="" >Select pekerjaan</option>
                                      <option value="20" >PNS</option>
                                      <option value="50" >Karyawan</option>
                                      <option value="70" >Petani</option>
                                      <option value="79" >Nelayan</option>
                                      <option value="100" >Buruh</option>
                                      <option value="60" >Pedagang</option>
                                      <option value="30" >Penambak Ikan</option>
                                      <option value="0" >Tidak Bekerja</option>
                                    </select>

                                      @error('pekerjaan_ibu')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}
                             </div> {{--end 4nd row --}} 

                             {{--first 5nd row foto --}} 
                              <div class="row">

                               <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Lampiran <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" id="image" class="form-control" > 
                                    </div>
                                    
                                </div>
                              </div> {{-- End md-6 form input --}}

                              <div class="class col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                      <img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" 
                                      style="width: 100px; width: 100px; boarder: 1px solid #000000">
                                  </div>
                                  
                                </div>
                              </div> {{-- end md-6 show foto --}}


                              </div>  {{--end 5nd row --}}                            

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