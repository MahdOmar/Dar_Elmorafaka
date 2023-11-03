@extends('layouts.dashboard')

@section('content')

<div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Publicité</h2>
    
</div>  

<div class="container mt-5">
  <div class="row">

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



      <div class="col-md-6 mx-auto">
          <div class="card">
              <div class="card-header">
                  <h5 class="card-title">Créer Publication</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('publicity.store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                          <label for="project">Projet:</label>
                          <select id="project" name="project_id" class="form-control">
                            <option value="">-- Selectionner Projet --</option>

                          @foreach ($projects as $item)
                              <option value="{{ $item->id }}">{{ $item->projet }}</option>
                          @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="headline">Titre:</label>
                          <input type="text" id="headline" name="title" class="form-control" >
                      </div>

                      <div class="form-group">
                          <label for="description">Description:</label>
                          <textarea id="description" name="description" rows="4" class="form-control" ></textarea>
                      </div>


                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                    </div>
                    <div class="form-group">
                    <div id="link-container">
                        <div class="form-group">
                            <label for="link">Lien 1:</label>
                            <input type="text" name="links[]" class="form-control mb-2" >
                           
                        </div>
                        
                    </div>
                    <button id="add-link" class="btn btn-success"><i class="fa fa-plus " ></i></button>
                    <button id="remove-link" class="btn btn-danger"><i class="fa fa-trash " ></i></button>
                    
                    
                  
                </div>
                      <button type="submit" class="btn btn-primary float-right ">Publier</button>
                    
                  </form>
                 
             
          </div>
      </div>
  </div>
</div>





@endsection


<script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/popper.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
  
<script>

     
$(document).ready(function () {
    $('#lfm').filemanager('image');


       // Add input field for a new link
       document.getElementById("add-link").addEventListener("click", function () {
        var container = document.getElementById("link-container");
        var linkCount = container.getElementsByTagName("input").length + 1;

        var linkInput = document.createElement("div");
        linkInput.classList.add("form-group");
        linkInput.innerHTML = `
            <label for="link">Lien ${linkCount}:</label>
            <input type="text" name="links[]" class="form-control" required>
        `;

        container.appendChild(linkInput);
    });

    // Remove the last input field
    document.getElementById("remove-link").addEventListener("click", function () {
        var container = document.getElementById("link-container");
        var linkInputs = container.getElementsByTagName("input");
        if (linkInputs.length > 1) {
            container.removeChild(linkInputs[linkInputs.length - 1].parentElement);
        }
    });











    });
  
   

</script>
   
