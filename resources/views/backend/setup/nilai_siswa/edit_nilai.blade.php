@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="content-wrapper">
    <div class="container-full">

     
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit nilai siswa </h4>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="POST" action="{{ route('update.nilai.siswa', $editData[0]->siswa_id) }}">
                        @csrf
                         <div class="row">
                           <div class="col-12">	

                            <div class="add_item">

                            <div class="form-group">
                                <h5>Nama <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="siswa_id"  required="" class="form-control" type="hidden" disabled>
                                        <option type="hidden" value="" selected=""  >Select Nama siswa</option>
                                        @foreach ($siswa as $murid)

                                        <option value="{{ $murid->id }}" {{ ($editData['0']->siswa_id == $murid->id)? "selected" : "" }}>{{ $murid->nama }}</option>

                                        @endforeach
                                    </select>
                                
                                </div>
                            </div> 
                            {{-- end form group --}}
                         

                        @foreach ($editData as $data)
                                
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mata pelajaran <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            
                                            <select name="subject_id[]"  required="" class="form-control" >
                                                <option type="hidden" value="" selected="" disabled="" >Select Mata pelajaran</option>
                                                 @foreach ($mapel as $pelajaran)
        
                                                 <option value="{{ $pelajaran->id }}" {{ ($data->subject_id == $pelajaran->id ) ? "selected" : "" }}>{{ $pelajaran->name }}</option> 
        
                                                @endforeach 
                                            </select>
                                        
                                        </div>
                                    </div> {{-- end form group --}}
                                    
                                </div> {{-- end col md 4 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Nilai Mata pelajaran <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="nilai_mapel[]" class="form-control" value="{{ $data->nilai_mapel }}">
                                        </div>
                                        
                                    </div>  
                                </div> {{-- end col md 3 --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Nilai Keaktifan <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="nilai_keaktifan[]" class="form-control" value="{{ $data->nilai_keaktifan }}">
                                        </div>
                                        
                                    </div>  
                                </div> {{-- end col md 3 --}}
            
                                <div class="col-md-2" style="padding-top: 25px;">
                                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                </div> {{-- end col md 2 --}}
                            </div>  {{-- end row --}}

                        @endforeach
                        </div> {{-- end add_item --}}



                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" >
                               <a href="{{ route('nilai.siswa.view') }}" class="btn btn-rounded btn-primary mb-5">Back</a>
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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">

                <div class="col-md-4">
                    <div class="form-group">
                        <h5>Mata pelajaran <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subject_id[]"  required="" class="form-control">
                                <option value="" selected="" disabled="" >Select Mata pelajaran</option>
                                @foreach ($mapel as $pelajaran)

                                <option value="{{ $pelajaran->id }}">{{ $pelajaran->name }}</option>

                                @endforeach
                            </select>
                        
                        </div>
                    </div> {{-- end form group --}}
                    
                </div> {{-- end col md 4 --}}

                <div class="col-md-3">
                    <div class="form-group">
                        <h5>Nilai Mata pelajaran <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="nilai_mapel[]" class="form-control">
                        </div>
                        
                    </div>  
                </div> {{-- end col md 3 --}}

                <div class="col-md-3">
                    <div class="form-group">
                        <h5>Nilai Keaktifan <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="nilai_keaktifan[]" class="form-control">
                        </div>
                        
                    </div>  
                </div> {{-- end col md 3 --}}


                <div class="col-md-2" style="padding-top: 25px;">
                    <span class="btn btn-success addeventmore">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    <span class="btn btn-danger removeeventmore">
                        <i class="fa fa-minus-circle"></i>
                    </span>
                </div> {{-- end col md 2 --}}

            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addeventmore", function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter-=1;
        });


    });
 </script>

@endsection