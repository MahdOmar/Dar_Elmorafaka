

@extends('layouts.dashboard')

@section('content')

<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Update</h2>
    
</div>  


<div class="col-lg-12 col-md-12 col-sm-12  ">
 


  <div class="card p-4">
     
      <div class="body">

          <form action="{{ route('projet.update',$projet->id) }}" method="POST">
              @csrf
              @method("patch")
            {{-- <fieldset  class="form-group  p-3" style="border:2px solid #dee2e6 ">
                <legend class="w-auto px-2"><b>Informations Personnels</b></legend>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nom <span class="text-danger">*</span></label>                           
  
                            <input type="text" class="form-control" name='title' placeholder="Nom" >
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="form-group">
                          <label for="">Prénom <span class="text-danger">*</span></label>                           
  
                          <input type="text" class="form-control" name='title' placeholder="Prénom" >
                      </div>
                  </div>
  
                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="">Date de naissance <span class="text-danger">*</span></label>                           
  
                        <input type="date" class="form-control" name='title' placeholder="Date / Lieu de naissance" >
                    </div>
                    </div>
  
                 <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Lieu de naissance <span class="text-danger">*</span></label>                           
  
                      <input type="text" class="form-control" name='title' placeholder="Adresse" >
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Niveau D'Etude <span class="text-danger">*</span></label>                           
  
                      <input type="text" class="form-control" name='title' placeholder="Adresse" >
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Résidence <span class="text-danger">*</span></label>                           
  
                      <input type="text" class="form-control" name='title' placeholder="Adresse" >
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Téléphone <span class="text-danger">*</span></label>                           
  
                      <input type="phone" class="form-control" name='title' placeholder="Adresse" >
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Email <span class="text-danger">*</span></label>                           
  
                      <input type="email" class="form-control" name='title' placeholder="Email" >
                     </div>
                  </div>
           
  
                </div>
  


            </fieldset> --}}
             
          <fieldset  class="form-group  p-3" style="border:2px solid #dee2e6 ">
            <legend class="w-auto px-2"> <b>Projet</b> </legend>
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

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                      <label for=""> Projet <span class="text-danger">*</span></label>                           
  
                     <textarea  class="form-control" name="projet" id="" cols="3" rows="5" value="">
                      {{ $projet->projet }}
                     </textarea>
                     </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> Lieu <span class="text-danger">*</span></label>                           
  
                      <input type="text" class="form-control" name='lieu_projet' placeholder="" value="{{ $projet->lieu_projet }}">
                     </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> Type de Projet<span class="text-danger">*</span></label>                           
  
                      <input type="text" class="form-control" name='type_projet' placeholder="" value="{{ $projet->type_projet }} ">
                     </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> Nombre de Participants <span class="text-danger">*</span></label>                           
  
                      <input type="number" class="form-control" name='nombre_participants' placeholder="" value="{{ $projet->nombre_participants }}">
                     </div>
                  </div>
           

            </div>




          </fieldset>
         
          
              


          <fieldset  class="form-group   p-3" style="border:2px solid #dee2e6 ">
            <legend class="w-auto px-2"><b>Détails Projet</b> </legend>
            <div class="row clearfix">

                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> But de Projet <span class="text-danger">*</span></label>                           
  
                     <textarea  class="form-control" name="but_projet" id="" cols="3" rows="5" value="">
                      {{ $projet->but_projet }}
                     </textarea>
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                      <label for=""> Domain d'Apllication <span class="text-danger">*</span></label>                           
  
                      <textarea  class="form-control" name="domaine" id="" cols="3" rows="5" value="">
                        {{ $projet->domaine }}
                      </textarea>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> La Catégorie cible du projet<span class="text-danger">*</span></label>                           
  
                      <textarea  class="form-control" name="categorie" id="" cols="3" rows="5" value="">
                        {{ $projet->categorie }}
                      </textarea>
                     </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> La concurrence sur le marché du projet <span class="text-danger">*</span></label>                           
  
                      <textarea  class="form-control" name="concurrence" id="" cols="3" rows="5" value="">
                        {{ $projet->concurrence }}
                      </textarea>
                     </div>
                  </div>


                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> Conditions de Réalisation du projet<span class="text-danger">*</span></label>                           
  
                      <textarea  class="form-control" name="conditions" id="" cols="3" rows="5" value="">{{ $projet->conditions }}</textarea>
                     </div>
                  </div>

                  <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                      <label for=""> Bénéfices attendus du projet<span class="text-danger">*</span></label>                           
  
                      <textarea  class="form-control" name="benifices" id="" cols="3" rows="5" value="">{{ $projet->benifices }}</textarea>
                     </div>
                  </div>

           

            </div>




          </fieldset>



           
              <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="submit" class="btn btn-outline-secondary">Cancel</button>
              </div>

          </form> 

          </div>
          
      </div>
  </div>
</div>

@endsection


