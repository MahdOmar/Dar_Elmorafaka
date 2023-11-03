{{-- @extends('layouts.dashboard')

@section('content')



<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 col-md-8 col-sm-12">
      <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Inscrits</h2>
      
  </div>  
  
  <div class="col-lg-6 col-md-8 col-sm-12 ">
    <a href="/inscription/create" class="btn btn-primary mt-2 " style="margin-left: 650px">Nouveau</a>    
</div>  
  </div>


<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Nom
      </th>
      <th class="th-sm">Prénom
      </th>
      <th class="th-sm">Date de Naissance
      </th>
      <th class="th-sm">Projet
      </th>
      <th class="th-sm">Status
      </th>
      <th class="th-sm">Options
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nom</td>
      <td>Prénom </td>
      <td>1995/04/25</td>
      <td>Description Projet</td>
      <td>Orienté ou non</td>
      <td> <a href="" data-toggle='tooltip' title="edit" data-placement="bottom" class="float-left btn btn-sm btn-outline-warning"><i class="fas fa-edit " >Editer</i></a>
        <form class="float-left ml-2" action="" method="POST">
            @csrf
            @method('delete')
            <a href="" data-toggle='tooltip' title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fas fa-trash " >Supprimer</i></a>

        </form></td>
  
    </tr>
  </tbody>
  
</table>

</div>
@endsection --}}


@extends('layouts.dashboard')

@section('content')

<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Projets</h2>
    
</div>  








<div class="col-lg-12 col-md-12 col-sm-12  ">



  <div class="card p-4">
   
     
      <div class="body">
        <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Id
              </th>
              <th class="th-sm">Projet
              </th>
              <th class="th-sm">Lieu
              </th>
              <th class="th-sm">Type
              </th>
              <th class="th-sm">Participants
              </th>
              <th class="th-sm">Structure
              </th>
              <th class="th-sm">Orientation
              </th>
              <th class="th-sm">Validation
              </th>
           
              <th class="th-sm">Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projets as $projet)
            <tr>
              <td>{{ $projet->id }}</td>
              <td>{{  Illuminate\Support\Str::limit($projet->projet, 30, '...')}}</td>
              <td>{{ $projet->lieu_projet }}</td>
              <td>{{ $projet->type_projet }}</td>
              <td>{{ $projet->nombre_participants }}</td>
              <td>{{ $projet->structure->name }}</td>
              @if ($projet->orientation == "Non Oriente")
              <td><h5><span class="badge bg-danger text-white">{{ $projet->orientation }}</span></h5></td>

              @else
              <td><h5><span class="badge bg-success text-white">{{ $projet->orientation }}</span></h5></td>

                  
              @endif
              @if ($projet->validation == "Non Valide")
              <td><h5> <span class="badge bg-danger text-white"> {{ $projet->validation }} </span></h5></td>

              @else
              <td><h5><span class="badge bg-success text-white"> {{ $projet->validation }} </span></h5></td>

                  
              @endif
              <td>
                <a href="{{ route('projet.membre',$projet->id) }}" data-toggle='tooltip' title="Pariticipants" data-placement="bottom" class="float-left btn btn-sm btn-outline-primary ml-2"><i class="fa fa-user " ></i></a>
                <button  title="orientation"  class="float-left btn btn-sm btn-outline-secondary ml-2" data-toggle="modal" data-target="#orientation" onclick="getProject({{ $projet->id }})" id="modal"><i class="fa fa-rotate-right " ></i></button>
               
                @if ($projet->orientation != "Non Oriente" && !(App\Models\Orientation::where('project_id', $projet->id)->exists()))
                <button  title="validation"  class="float-left btn btn-sm btn-outline-success ml-2" data-toggle="modal" data-target="#validation" onclick="getProject2({{ $projet->id }})" id="modal"><i class="fa fa-check"></i></button>
                @endif
              
                <a href="{{ route('projet.edit',$projet->id) }}" data-toggle='tooltip' title="edit" data-placement="bottom" class="float-left btn btn-sm btn-outline-warning ml-2"><i class="fa fa-edit " ></i></a>
                                            <form class="float-left ml-2" action="{{ route('projet.destroy',$projet->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle='tooltip' title="delete" data-placement="bottom" class="dltBtn btn btn-sm btn-outline-danger"><i class="fa fa-trash " ></i></a>

                                            </form>

              </td>
             
            </tr>
                
            @endforeach
           
           
        
        </table>
      
      
         
      </div>
          
      </div>
  </div>
   {{-- Modal --}}
   
   <div class="modal fade" id="orientation"  aria-labelledby="orientationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orientationlLabel">Orientation Projet</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>       
         </div>
        <div class="modal-body">
          <form action="{{ route('projet.orienter') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control d-none" id="projectId" name='projectId' value=""  >

              <label for=""> Orientation<span class="text-danger">*</span></label>                           

              <select name="orientation" id="orienter" class="form-control show-tick">
                <option value="">-- Selectionner --</option>
                <option value="Non Oriente" {{old('orientation') == 'Non Oriente' ? 'selected' : ''}}>Non Oriente</option>
                <option value="ANADE" {{old('orientation') == 'ANADE' ? 'selected' : ''}}>ANADE</option>
                <option value="ANGEM" {{old('orientation') == 'ANGEM' ? 'selected' : ''}}>ANGEM</option>
            </select>
             </div>

         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary orn">Orienter</button>
        </div>
      </form>
      </div>
    </div>
  </div>


   {{-- Modal --}}
   
   <div class="modal fade" id="validation"  aria-labelledby="validationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orientationlLabel">Validation Projet</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>       
         </div>
        <div class="modal-body">
          <form action="{{ route('projet.valider') }}" method="POST">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control d-none" id="projectId2" name='projectId' value=""  >

              <label for=""> Validation<span class="text-danger">*</span></label>                           

              <select name="validation" id="valider" class="form-control show-tick">
                <option value="">-- Selectionner --</option>
                <option value="Non Valide" {{old('orientation') == 'Non Oriente' ? 'selected' : ''}}>Non Valide</option>
                <option value="Valide" {{old('validation') == 'Valide' ? 'selected' : ''}}>Valide</option>
             
            </select>
             </div>

         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary vld">Valider</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>



 

@endsection

<script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/popper.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

  function getProject(id)
  {
   
    $('#projectId').val(id);
  }

  function getProject2(id)
  {
   
    $('#projectId2').val(id);
  }
  
 
  $(document).on('click','.dltBtn',function(e)
  {
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
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
      
        form.submit();
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
        } else {
        swal("Your imaginary file is safe!");
        }
        });
        

        

  })



    
 
</script>