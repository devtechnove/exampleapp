@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Usuario</label>
                            <select name="" id="user_id" class="form-control">
                                <option value="">Seleccione</option>
                                @foreach ($users as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">

                            <label for="">Correo</label>
                            <input type="text" id="user_email" class="form-control">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(document).ready(function() {

            $('#user_id').unbind('change');//borro evento click
            $('#user_id').on("change", function(e) { //asigno el evento change u otro
            console.log($('#user_id').val())
            user = e.target.value;

            $.ajax({url: "/user/"+user+"/datos",
            method: 'GET',
            //data: {'estados_id': estados_id}
          }).then(function(result) {
            console.log(result);

            $('#municipio_id').html('<option value="0"> Seleccione </option>');


            $(result).each(function( index, element ) {

              $('#user_email').val(element.email);

            });
          })
          .catch(function(err) {
              console.error(err);
          });

            });


        });

    </script>

    </script>
@endpush

