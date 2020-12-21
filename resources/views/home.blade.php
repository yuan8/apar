@extends('layouts.front.master')


@section('header-content')
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/select2/dist/css/bt4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">

  <script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    @include('layouts.front.search')

@stop
@section('content')
<style type="text/css">

</style>

<div class="container">


    <div class="row">
        <div class="col-md-8">
        <div class="row">
            <div class="col-md-12" id="container-items-apartemen">
           
            </div>
       </div>
    </div>
    <div class="col-md-4">
        <div class='card'>
            <div class="card-body">
               
               

               
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $.post('{{route('api.unit.list')}}',{page:1},function(res){
    $('#container-items-apartemen').append(res);
  });


  $('#search_list').select2({
    theme: "bootstrap4",
    width:'auto',
    placeholder:'Search..',
    dropdownAutoWidth: true,
    allowClear: true,
    ajax: {
      headers: {
          "Authorization" : "Bearer {{Auth::User()?Auth::User()->api_token:'aca34353443'}}",
          "Content-Type" : "application/json",
      },
      url: '{{route('api.search.list')}}',
      dataType: 'json',
      delay: 250,
      data: function (params) {
        var query = {
          q: params.term,
        }

        // Query parameters will be ?search=[term]&type=public
        return query;
      },
       processResults: function (data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        return {
          results: data.items
        };

      }
      // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
    }
  });
</script>


@stop
