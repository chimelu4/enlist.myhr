<?php $page='settings';?>
@extends('master')
@section('content')
<?php   use \App\Http\Controllers\IdentificationController; ?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/all-id-type')}}"><i class="fas fa-list"></i> ID Types</a></li>
                        <li class="breadcrumb-item " aria-current="page">Edit</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">

           
<div >


<div class="card">
                  <div class="card-header">
                    <h4>Editing <span style="color: gray; font-size:14px">[ {{$data->name}} ] </span></h4>
                  </div>
                  <div class="card-body">
               <div class="col-md-6">
               
               <form >
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{$data->name}}" id="title" name="title" aria-describedby="emailHelp" placeholder="ID Name">
                            <input type="hidden" class="form-control" value="{{$data->id}}" id="id"  name="id" >
                    
                    
                            

                    
                    </div>
                    
                    <button  type="submit" class="btn updateIDType btn-primary ">Update</button>
                    </form> 
               </div> 
     </div>
                </div>
</div>
</div>
          </div>
        </section>
      </div>
     
@endsection
@section('js')
<script>
  $(document).ready(function(){

    

  //adding idType
  $(".updateIDType").on("click", function(event){
    event.preventDefault();
//alert('form submit');
var title = $('#title').val();
var id = $('#id').val();

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'post',
  url:'../update-id-type',
  data:{title:title,id:id},
  success: function(data){
    if(data == 1){

      Fnon.Hint.Success('ID type updated successfully. Well Done!', {
        position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
        animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
       callback:function(){
        // callback
        }
      });
location.reload(false);

}else{
Fnon.Hint.Danger(data, {
  position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
        animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
       callback:function(){
        // callback
        }
});
}

  }

}) ;      
    
    
});




    
    
  });
</script>
@endsection