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
                  <h5 class="card-title">Edit an Advertisement</h5>
              </div>
              <div class="card-body">
                  <form action="{{ route('publicity.update',$orientation->id)}}" method="POST">
                    @csrf
                    @method('patch')
                      <div class="form-group">
                          <label for="project">Select Project:</label>
                          <select id="project" name="project_id" class="form-control" disabled>
                            <option value="">-- Selectionner Projet --</option>


                       
                               <option value="{{ $project->id}}" {{ $project->id == $orientation->project_id  ? 'selected' : ''}}>{{ $project->projet }}</option>
                              
                         
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="headline">Headline:</label>
                          <input type="text" id="headline" name="title" class="form-control" value="{{ $orientation->title }}">
                      </div>

                      <div class="form-group">
                          <label for="description">Description:</label>
                          <textarea id="description" name="description" rows="4" class="form-control" >{{ $orientation->description }}</textarea>
                      </div>


                      <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $orientation->photo }}">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>

                    </div>
                    <div class="form-group">
                    <div id="link-container">
                        <div class="form-group">
                          @foreach ($project->links as $link)
                          <label for="link">Link {{ $loop->iteration }}:</label>
                          <input type="text" name="links[]" class="form-control mb-2" value="{{ $link->link }}">
                          @endforeach
                           
                           
                        </div>
                        
                    </div>
               
                    
                  
                </div>
                      <button type="submit" class="btn btn-primary float-right ">Editer</button>
                    
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


    







    });
  
   

</script>
   
