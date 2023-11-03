@extends('layouts.dashboard')

@section('content')


<div class="col-lg-6 col-md-8 col-sm-12">
    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Projets Publiés</h2>
    
</div>  
   
   
    <div class="container-fluid mt-4">
      
        <div class="row">
            @if (count($orientations) == 0)

          
                    <div class="alert alert-secondary w-100 alert-dismissible fade show" id="alert" role="alert">
                        Pas de Projets Publiés
                   
                    </div>
                
            @endif
            @foreach($orientations as $item)

            @php
            $photos =explode(',',$item->photo);
            @endphp

            <div class="col-md-3 mb-4">
                <div class="card project">
                    <img src="{{ $photos[0]}}" class="card-img-top" alt="Project Image"  height="250">
                    <hr>
                    <div class="card-body cnt">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{  Illuminate\Support\Str::limit($item->description, 40, '...')}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('publicity.show',$item->id) }}" class="btn btn-primary">Voir plus</a>
                        <a href="{{ route('publicity.edit',$item->id) }}" class="btn btn-warning">Editer</a>
                        <form action="{{ route('publicity.delete',$item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           
                            <button data-toggle='tooltip' title="delete" data-id="{{ $item->id }}"  data-placement="bottom" class="dltBtn btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
<script src="{{ asset("js/jquery.min.js") }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>


    
  $(document).on('click','.dltBtn',function(e)
  {
       console.log('flksd,fdslk');
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