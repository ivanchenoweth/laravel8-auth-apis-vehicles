@extends('layouts.app')

@section('template_title')
    Vehicles
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="vehicle">
                    <div class="vehicle-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="vehicle_title">
                                {{ __('Vehicles') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="vehicled-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Brand</th>
										<th>Type</th>
                                        <th>Tires</th>
										<th>Powermotor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $vehicle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $vehicle->brand }}</td>
											<td>{{ $vehicle->type }}</td>
                                            <td>{{ $vehicle->tires }}</td>
											<td>{{ $vehicle->powermotor }}</td>

                                            <td>
                                               <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('vehicles.show',$vehicle->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    @csrf
                                                     <!-- 
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $vehicles->links() !!}
            </div>
        </div>
    </div>
@endsection
