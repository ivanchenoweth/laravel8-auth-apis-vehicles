@extends('layouts.app')

@section('template_title')
    Update vehicle
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="vehicled vehicled-default">
                    <div class="vehicled-header">
                        <span class="vehicled-title">Update vehicle</span>
                    </div>
                    <div class="vehicled-body">
                        <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('vehicle.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
