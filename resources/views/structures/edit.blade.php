@extends('layouts.dashboard')

@section('content')


<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Ajouter Utilisateur</h2>
    
</div> 
</div>
<div class="card p-4">
  
  
    <div class="top">
      <div class="col-lg-12">
        @include('layouts.notification')
    </div>

    </div>
    <div class="row ">
        <div class="col-md-8">
           
               

               
                    <form method="POST" action="{{ route('structure.update',$user->id) }}">
                        @csrf
                        @method('patch')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      

                        <div class="row mb-3">
                            <label for="structure" class="col-md-4 col-form-label text-md-end">{{ __('Structure') }}</label>

                            <div class="col-md-6">
                              <select name="structure_id"  class="form-control show-tick">
                                <option value="" >-- Selectionner Structure --</option>
                                @foreach ($structures as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $user->structure->id  ? 'selected' : ''}} > {{ $item->name }}</option>
                                    
                                @endforeach
                             
                            </select>
                            </div>
                           
                           
                        </div>

                      

                        <div class="row mb-0" >
                            <div class="col-md-4 offset-md-8 ">
                                <button type="submit" id="reg" class="btn btn-primary ">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                
           
        </div>
    </div>
</div>













@endsection