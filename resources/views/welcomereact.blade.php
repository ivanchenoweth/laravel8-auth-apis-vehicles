@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vehicle V1.1 2022 ') }}</div>
                <div class="card-body">
                 
                    <div id="app2"></div>
                    <!-- Load React. -->
                    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
                    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js" crossorigin></script>

                    <!-- Load our React component. -->
                    <script type="module" src="js/appreact.js"></script> 

                </div>
            </div>
        </div>
    </div>
</div>


@endsection