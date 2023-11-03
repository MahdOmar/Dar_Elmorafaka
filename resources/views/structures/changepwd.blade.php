@extends('layouts.dashboard')

@section('content')


<div class="row ">
  <div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Changer Mot de Passe</h2>
    
</div> 
</div>
<div class="card p-4">
  
  
   
    <div class="row ">

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

        <div class="col-md-8">
           
               

               
                    <form method="POST" action="{{ route('structure.changer') }}">
                        @csrf

                        <div class="row mb-3">
                          <label for="currentpassword" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="currentpassword" type="password" class="form-control " name="current_password" required autocomplete="new-password">

                          
                          </div>
                      </div>


                    

                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New_Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">

                               
                            </div>
                        </div>

                        <div class="row mb-3">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      

                        <div class="row mb-0" >
                            <div class="col-md-4 offset-md-8 ">
                                <button type="submit" id="reg" class="btn btn-primary ">
                                    {{ __('Changer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                
           
        </div>
    </div>
</div>













@endsection