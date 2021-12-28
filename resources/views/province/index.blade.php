@extends('layouts.app')

@section('content')

    <div class="bg-light p-4 rounded">
        <h2>Province</h2>
        <div class="lead">
            Manage your province here.
            <a href="{{ route('province.create') }}" class="btn btn-primary btn-sm float-right">Add Province</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">@sortablelink('id', 'No.', )</th>
             <th>@sortablelink('name', "Name")</th>
             <th>@sortablelink('created_at', "Created At")</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($provinces as $key => $province)
            <tr>
                <td>{{ $province->id }}</td>
                <td>{{ $province->name }}</td>
                <td>{{ $province->created_at }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('province.show', $province->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('province.edit', $province->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['province.destroy', $province->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {{-- {!! $provinces->links() !!} --}}
            {!! $provinces->appends(request()->except('page'))->render() !!}
        </div>

    </div>
@endsection