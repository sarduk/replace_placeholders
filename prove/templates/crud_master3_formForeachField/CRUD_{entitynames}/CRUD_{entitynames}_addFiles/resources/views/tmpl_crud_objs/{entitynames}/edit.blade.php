@extends('main_template')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Edit {Entityname}</h3>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('{entitynames}.update', $model_obj->{$model_obj->getKeyName()}) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
			{{-- @foreach (array_slice($model_obj->getFillable(), 0, 2) as $fieldname) --}}
			@foreach ($model_obj->getFillable() as $fieldname)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ucfirst($fieldname)}}:</strong>
                    <input type="text" name="{{ $fieldname }}" value="{{ $model_obj->$fieldname }}" class="form-control">
                </div>
            </div>
			@endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </form>
@endsection
