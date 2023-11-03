@extends('layouts.dashboard')

@section('content')


<div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Projets Publiés Détails</h2>
    
</div>  

<div class=" p-4 container">

  <div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
          <div class="single_product_thumb">
              <div id="product_details_slider" class="carousel slide" data-ride="carousel" >
  
                  @php
                  $photos =explode(',',$orientation->photo);
                  @endphp
  
            
  
                  <div class="carousel-inner">
                      @foreach ($photos as $key=>$photo)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <a class="gallery_img" href="{{ $photo }}" title="{{ $orientation->title }}">
                                <img class="d-block  w-100 " height="400" src="{{ $photo }}" alt="{{ $orientation->title }}">
                            </a>
                            <!-- Product Badge -->
                         
                        </div>
                        @endforeach
                    </div>
                
  
                    <!-- Carosel Indicators -->
                    <ol class="carousel-indicators">
                      @php
                      $photos =explode(',',$orientation->photo);
                      @endphp
  
                  @foreach ($photos as $key=>$photo)
  
                        <li class="{{ $key == 0 ? 'active' : '' }}" data-target="#product_details_slider" data-slide-to="{{ $key }}" style="background-image: url({{ $photo }});">
                        </li>
                   @endforeach
                    </ol>
                </div>
            </div>
        </div>
  
        
  
        <!-- Single Product Description -->
        <div class="col-12 col-lg-6">
            <div class="single_product_desc">
                <h4 class="title mb-2">{{ $orientation->title }}</h4>
               
                
  
                <!-- Overview -->
                <div class="short_overview mt-4">
                    <h5>Description</h5>
                    <p>{{ $orientation->description }}</p>
                </div>

                @php
                $project = \App\Models\Project::with('links')->where('id',$orientation->project_id)->first();
               
            @endphp
  
                <div class="short_overview mt-4">
                  <h5>Liens</h5>
                  <ul>
                    @foreach ($project->links as $link)
                    <li><a href="{{ $link->link }}" target="_blank">{{ $link->link }}</a></li>
                        
                    @endforeach
                  </ul>
                  
              </div>
  
               
  
  
            
  
            
              
            </div>
        </div>
    </div>
  </div>
  
</div>
  

@endsection

