@extends('layouts.app')

@section('template_title')
    Create Vehicle
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="vehicled vehicled-default">
                    <div class="vehicled-header">
                        <span class="vehicled-title">Create vehicle</span>
                    </div>
                    <div class="vehicled-body">
                        <form method="POST" action="{{ route('vehicles.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('vehicle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
