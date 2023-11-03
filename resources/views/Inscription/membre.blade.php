
@extends('layouts.dashboard')

@section('content')

<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="{{ route('projet.index') }}" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Projet/{{ $projet->id }}/Participants</h2>
    
</div>  



<div class="col-lg-12 col-md-12 col-sm-12  ">
  <form action="{{ route('membre.store') }}" method="POST">
    @csrf
  <fieldset  class="form-group  p-3" style="border:2px solid #dee2e6 ">
      <legend class="w-auto px-2"><b>Informations Personnels</b></legend>
      <div class="row clearfix">
        <div class="col-lg-12 ">
         
              
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>

          </div>
         
              
          @endif
        </div>
          <div class="col-lg-3 col-md-3">

            <input type="text" class="form-control d-none" name='projet_id'  value="{{ request()->route('id') }}"  >
            <input type="text" class="form-control d-none" name='membre_id' id = "membre_id"value=""  >
              <div class="form-group">
                  <label for="">Nom <span class="text-danger">*</span></label>                           

                  <input type="text" class="form-control" name='nom' id="nom" placeholder="Nom" >
              </div>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="">Prénom <span class="text-danger">*</span></label>                           

                <input type="text" class="form-control" name='prenom' id='prenom' placeholder="Prénom" >
            </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="form-group">
              <label for="">Date de naissance <span class="text-danger">*</span></label>                           

              <input type="date" class="form-control" name='date_naissance' id='date_naissance' placeholder="Date / Lieu de naissance" >
          </div>
          </div>

       <div class="col-lg-3 col-md-3">
          <div class="form-group">
            <label for=""> Lieu de naissance <span class="text-danger">*</span></label>                           

            <input type="text" class="form-control" name='lieu_naissance' id='lieu_naissance' placeholder="Adresse" >
           </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="form-group">
            <label for=""> Niveau D'Etude <span class="text-danger">*</span></label>                           

            <input type="text" class="form-control" name='niveau_etude' id='niveau_etude' placeholder="niveau étude" >
           </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="form-group">
            <label for=""> Résidence <span class="text-danger">*</span></label>                           

            <input type="text" class="form-control" name='residance'  id='residance' placeholder="résidance" >
           </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="form-group">
            <label for=""> Téléphone <span class="text-danger">*</span></label>                           

            <input type="phone" class="form-control" name='phone' id='phone' placeholder="téléphone" >
           </div>
        </div>

        <div class="col-lg-3 col-md-3">
          <div class="form-group">
            <label for=""> Email <span class="text-danger">*</span></label>                           

            <input type="email" class="form-control" name='email' id='email' placeholder="Email" >
           </div>
        </div>
 

      </div>
      <div class="d-flex justify-content-end m-2  ">
        <button type="submit" id="btn" class="  btn btn-primary ">Ajouter</button>
      
    </div>



  </fieldset>



</form>
  <div class="card p-4">
   
     
      <div class="body">
        <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Nom
              </th>
              <th class="th-sm">Prenom
              </th>
              <th class="th-sm">Date_Naissance
              </th>
              <th class="th-sm">Lieu_Naissance
              </th>
              <th class="th-sm">Niveau_Etude
              </th>
              <th class="th-sm">Résidance
              </th>
              <th class="th-sm">Telephone
              </th>
              <th class="th-sm">Email
              </th>
           
              <th class="th-sm">Actions
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projet->membres as $item)
             <tr>
            <td>{{ $item->nom }}</td>
            <td>{{ $item->prenom }}</td>
            <td>{{ $item->date_naissance }}</td>
            <td>{{ $item->lieu_naissance }}</td>
            <td>{{ $item->niveau_etude }}</td>
            <td>{{ $item->residance }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td> <a  onclick="getDetail({{ $item->id }})" data-toggle='tooltip' role="button" title="edit" data-placement="bottom" class="float-left btn btn-sm btn-warning ml-2 "><i class="fa fa-edit " ></i></a>
              <form class="float-left ml-2" action="{{ route('membre.delete',$item->id) }}" method="POST">
                  @csrf
                 
                  <a data-toggle='tooltip' title="delete" data-id="{{ $item->id }}"  data-placement="bottom" class="dltBtn btn btn-sm btn-danger text-white"><i class="fa fa-trash " ></i></a>

              </form></td>
          </tr>
            @endforeach
           
           
           
          </tbody>
        </table>
      
      
         
      </div>
          
      </div>
  </div>


</div>


@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

function getDetail(id)
    {
  console.log(id);
        var token="{{ csrf_token() }}";
        var path="{{ route('membre.show') }}";

        $.ajax({
            url:path,
            type:"GET",
            dataType:'JSON',
            data:{
                _token:token,
                id:id
            },
            success:function(data){
               $('#membre_id').val(data.membre.id);
               $('#nom').val(data.membre.nom);
               $('#prenom').val(data.membre.prenom);
               $('#date_naissance').val(data.membre.date_naissance);
               $('#lieu_naissance').val(data.membre.lieu_naissance);
               $('#niveau_etude').val(data.membre.niveau_etude);
               $('#residance').val(data.membre.residance);
               $('#phone').val(data.membre.phone);
               $('#email').val(data.membre.email);
               $('#btn').html('Update');


          
        
            
            }
        })
    }


</script>
<script src="{{ asset("js/jquery.min.js") }}"></script>

<script>
  
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