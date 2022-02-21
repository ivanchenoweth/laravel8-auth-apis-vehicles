<div class="box box-info padding-1">
    <div class="box-body">
            <li>Sedan Has 4 tires and 120HP</li>
            <li>Motorcycle Has 2 tires and 50HP</li>   
        <div class="form-group">
            {{ Form::label('brand') }}
            {{ Form::text('brand', $vehicle->brand, ['class' => 'form-control' . ($errors->has('brand') ? ' is-invalid' : ''), 'placeholder' => 'Brand']) }}
            {!! $errors->first('brand', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            {{ Form::select('type', array(
                'Sedan'=>'Sedan',
                'Motorcylcle'=>'Motorcycle'
            ),'Sedan') }}
            
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>