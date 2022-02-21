@extends('layouts.app')

@section('template_title')
    {{ $vehicle->name ?? 'Show Vehicle' }}
@endsection

@section('content')
    <section class="content container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="vehicled">
                    <div class="vehicled-header">
                        <div>
                            <span class="vehicled-title">Show Vehicle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vehicles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="vehicled-body">  
                        <div class="form-group">
                            <strong>Brand:</strong>
                            {{ $vehicle->brand }}
                        </div>
                        <div class="form-group">
                            <strong>Type:</strong>
                            {{ $vehicle->type }}
                        </div>

                        <div class="form-group">
                            <strong>Tires:</strong>
                            {{ $vehicle->tires }}
                        </div>

                        <div class="form-group">
                            <strong>Powermotor:</strong>
                            {{ $vehicle->powermotor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
