@extends('main_template')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>{Entitynames}</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('{entitynames}.create') }}">Add {Entityname}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        @foreach ($list_objs as $model_obj)
            @if ($loop->first)
                <tr>
                    <th>ID</th>
                    @foreach (array_slice($model_obj->getFillable(), 0, 2) as $fieldname)
                        <th>{{ucfirst($fieldname)}}</th>
                    @endforeach
                    <th width="280px">Actions</th>
                </tr>
            @endif
            <tr>
                <td>{{ $model_obj->{$model_obj->getKeyName()} }}</td>
                @foreach (array_slice($model_obj->getFillable(), 0, 2) as $fieldname)
                    <td>{{ $model_obj->$fieldname }}</td>
                @endforeach
                <td>
                    <form action="{{ route('{entitynames}.destroy', $model_obj->{$model_obj->getKeyName()}) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('{entitynames}.show', $model_obj->{$model_obj->getKeyName()}) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('{entitynames}.edit', $model_obj->{$model_obj->getKeyName()}) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- ! ! $list_objs  ->  links() ! ! --}}

@endsection
