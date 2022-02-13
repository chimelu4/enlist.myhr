<?php $page='settings';?>
@extends('master')
@section('content')
<?php   use \App\Http\Controllers\IdentificationController; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add ID Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form >
@csrf
  <div class="form-group">
    <label for="title">ID Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="ID Name">
   
  </div>
 
 
</form>
         <button type="submit" class="btn saveIdType btn-primary">Save</button> 
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
               
              </div>
            </div>
          </div>
        </div>
     
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page" >ID Types</a></li>                        
                      </ol>
                    </nav>
           
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>All Means of Identification</h4>
                  </div>
                  <div class="card-body">
                    
                  <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">Add</button>
               <div class="container">
               <div class="row">
               <div class="col-md-12">

               <div class="table-responsive">
                      <table class="table  table-hover" id="example"  >
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th >Name</th>
                            <th class="text-center">Members With ID</th>
                            <th class="text-center">Created On</th>
                            <th class="text-center">Updated On</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($identifications as $identity)

                        
                            <tr>
                            <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                              <td > {{$identity->name}}</td>
                               <td class="text-center"><div class="badge badge-primary">{{getIdRowNumber($identity->id); }}</div></td>
                               <td class="text-center">{{ $identity->created_at }}</td>
                               <td class="text-center">{{ $identity->updated_at }}</td>
                             <td class="text-center"><a  href="{{URL::to('/edit-id-type')}}/{{$identity->id}}"  class="btn tablebtn btn-secondary">Edit</a>        
                             <a href=""  data-id="{{$identity->id}}"   class="btn tablebtn delete-id-type btn-danger">Delete</a></td>
                            </tr>
                          
                          
                        @endforeach
                                              
                          
                        </tbody>
                      </table>
                    </div>










               
               </div>
               
               
               </div>
               
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
  $(".saveIdType").on("click", function(event){
    event.preventDefault();
//alert('form submit');
var title = $('#title').val();

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'post',
  url:'save-id-type',
  data:{title:title},
  success: function(data){
    if(data == 1){
      $('#exampleModal').modal('hide');
      Fnon.Hint.Success('ID type created successfully. Well Done!', {
        position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
        animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
       callback:function(){
        // callback
        }
      });
location.reload(false);

}else  {
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




      //Deleting id type
      $(document).on('click', '.delete-id-type',function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"delete-id-type/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                          if(data == 1){
                          
                              // Remove row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800,function(){
        $(this).remove();});

                      }else {
                        Fnon.Hint.Danger('Error detected. Record might be a duplicate', {
                          callback:function(){
                          // callback
                          }
                        });
                      }

                        }  
                  });  
              
          }
        }); 
    
  });
</script>
@endsection