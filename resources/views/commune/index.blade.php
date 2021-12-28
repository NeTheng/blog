@extends('layouts.app')

@section('content')

    <div class="bg-light p-4 rounded">
        <h2>Commune</h2>
        <div class="lead">
            Manage your commune here.
            <a href="{{ route('commune.create') }}" class="btn btn-primary btn-sm float-right">Add Commune</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($communes as $key => $commune)
            <tr>
                <td>{{ $commune->id }}</td>
                <td>{{ $commune->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('commune.show', $commune->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('commune.edit', $commune->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['commune.destroy', $commune->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $communes->links() !!}
        </div>

    </div>
@endsection