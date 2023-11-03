@extends('layouts.dashboard')

@section('content')

<div class="">
  <div class="row ">
    <div class="col-lg-6 col-md-8 col-sm-12">
      <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Structures</h2>
      
  </div>  
  </div>
  
  <div class="card p-4">
  
    <div class="">
      <div class="top">
       
      <a href="{{ route('structure.create') }}" class="btn btn-primary" >Ajouter Utilisateur</a>
  
      </div>
      
  </div>
<hr>
  <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
      <tr>
        
        </th>
        <th class="th-sm">Nom
        </th>
        <th class="th-sm">Email
        </th>

        <th class="th-sm">Structure
        </th>
     
        <th class="th-sm">Actions
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
      <tr>
        <td>{{ $item->name  }}</td>
        <td>{{ $item->email  }}</td>
        <td>{{ $item->structure->name  }}</td>
        <td>
          <a href="{{ route('structure.show',$item->id) }}"  data-toggle='tooltip' role="button" title="edit" data-placement="bottom" class="float-left btn btn-sm btn-warning ml-2 "><i class="fa fa-edit " ></i></a>

          <form action="{{ route('structure.reset',$item->id) }}" method="POST">
            @csrf
          <button type="submit"  data-id="{{ $item->id }}" data-toggle='tooltip' role="button" title="réinitialiser mot de passe" data-placement="bottom" class="float-left rstBtn btn btn-sm btn-info ml-2 "><i class="fa fa-rotate-right " ></i></button>

        </form>
              <form class="float-left ml-2" action="{{ route('structure.delete',$item->id) }}" method="POST">
                  @csrf
                 
                  <a data-toggle='tooltip' title="delete" data-id="{{ $item->id }}"  data-placement="bottom" class="dltBtn btn btn-sm btn-danger text-white"><i class="fa fa-trash " ></i></a>

              </form>
        </td>
      </tr>
          
      @endforeach
     
    </tfoot>
  </table>







  </div>



  
</div>




</div>




@endsection

<script src="{{ asset("js/jquery.min.js") }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>



$(document).on('click','.rstBtn',function(e)
  {
    console.log("*////////////");
     
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var form = $(this).closest('form');
        var dataId = $(this).data('id');
        e.preventDefault();
        
       
        swal({
        title: "Are you sure?",
        text: "You want to reset the password!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
      
        form.submit();
        swal("success", {
          icon: "success",
        });
        } else {
        swal("OK!");
        }
        });
        

        

  })





  

  $(document).on('click','.dltBtn',function(e)
  {
    console.log("*////////////");
     
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var form = $(this).closest('form');
        var dataId = $(this).data('id');
        e.preventDefault();
        
       
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
      
        form.submit();
        swal("Poof! Your User has been deleted!", {
          icon: "success",
        });
        } else {
        swal("OK");
        }
        });
        

        

  })




  </script>