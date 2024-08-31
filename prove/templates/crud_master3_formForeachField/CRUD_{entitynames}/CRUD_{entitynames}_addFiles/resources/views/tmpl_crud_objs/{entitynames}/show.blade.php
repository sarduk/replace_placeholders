@extends('main_template')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Show {Entityname}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ID:</strong>
                {{  $model_obj->{$model_obj->getKeyName()} }}
            </div>
        </div>

    @foreach ($model_obj->getFillable() as $fieldname)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ucfirst($fieldname)}}:</strong>
                {{ $model_obj->$fieldname }}
            </div>
        </div>
    @endforeach
    </div>
@endsection
