@extends('layouts.dashboard')

@section('content')


<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Dashboard </h2>
    
</div> 

</div>


<div class="row">

  <div class="col-md-4 col-xl-3">
    <div class="card bg-c-blue order-card ">
        <div class="card-block">
            <h6 class="m-b-20">Projets</h6>
            
            <div class="d-flex justify-content-between ">
              <img src="{{ asset("img/pro.png") }}" alt="" width="50" height="40">
            <h2 class="text-right"><span>{{ count($projets) }}</span></h2>
            </div>

            @php
             $part = 0 ;
                foreach ($projets as $key => $value) {
                  $part += $value->nombre_participants;
                }
            @endphp
         

            <p class="m-b-0">Nombre de Participants<span class="f-right">{{ $part }}</span></p>
        </div>
    </div>
  </div>

  <div class="col-md-4 col-xl-3">
    <div class="card bg-c-green order-card">
        <div class="card-block">
            <h6 class="m-b-20">Projets Orientés</h6>

            <div class="d-flex justify-content-between">
              <img src="{{ asset("img/orn.png") }}" alt="" width="50" height="40">
              <h2 class="text-right"><span>{{ count($projets_orientes) }}</span></h2>
            </div>
           
            <p class="m-b-0">Non orientés<span class="f-right">{{ count($projets) -  count($projets_orientes)}}</span></p>
        </div>
    </div>
  </div>

  <div class="col-md-4 col-xl-3">
    <div class="card bg-c-yellow order-card">
        <div class="card-block">
            <h6 class="m-b-20">Projets Validés</h6>
          
            <div class="d-flex justify-content-between">
              <img src="{{ asset("img/val.png") }}" alt="" width="50" height="40">
              <h2 class="text-right"><span>{{ count($projets_valides) }}</span></h2>
            </div>
           
            <p class="m-b-0">Non validés<span class="f-right">{{ count($projets) -  count($projets_valides)}}</span></p>
        </div>
    </div>
  </div>

  <div class="col-md-4 col-xl-3">
    <div class="card bg-c-pink order-card">
        <div class="card-block">
            <h6 class="m-b-20">Projets Publiés</h6>
            
            <div class="d-flex justify-content-between">
              <img src="{{ asset("img/pub.png") }}" alt="" width="50" height="40">
              <h2 class="text-right"><span>{{ count($projets_pub) }}</span></h2>
            </div>
            <p class="m-b-0">Non publiés<span class="f-right">{{ count($projets) -  count($projets_pub)}}</span></p>
        </div>
    </div>
  </div>

</div>










@endsection