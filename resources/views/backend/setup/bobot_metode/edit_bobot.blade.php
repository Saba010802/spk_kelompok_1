@extends('admin.admin_master')

@section('admin')


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit Bobot </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.data.bobot',$bobot->id) }}" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                           <div class="col-12">	
                         
                            <div class="row"> {{--first 1st row --}}
                              <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Nama kriteria <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="kriteria" class="form-control" required="" value="{{ $bobot->kriteria }}">

                                    @error('kriteria')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                               <div class="col-md-6">

                                <div class="form-group">
                                  <h5>Bobot <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input type="text" name="bobot" class="form-control" required="" value="{{ $bobot->bobot }}">

                                    @error('bobot')
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                  </div>
                                </div>

                               </div> {{--end col md 6 --}}

                             </div> {{--end 1st row --}}


                            

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit" >
                               <a href="{{ route('bobot') }}" class="btn btn-rounded btn-primary mb-5">Back</a>
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