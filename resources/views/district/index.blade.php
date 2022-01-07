@extends('layouts.app')

@section('content')


{{ Form::open(array('action' => 'DistrictController@index', 'method' => 'get')) }}

{{Form::token()}}
    <div class="bg-light p-4 rounded">
        <h2>Search</h2>
        <div class="row mb-3">
            <div class="col-4 themed-grid-col">
                <div class="mb-3">
                    <label for="name" class="form-label">District name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="District">
                </div>

            </div>
            <div class="col-4 themed-grid-col">

                <label for="province" class="form-label">Province</label>
                <input class="form-control" list="datalistOptions" id="province" name="province" placeholder="Type to search...">
                        <datalist id="datalistOptions">

                             @foreach ($province_lists as $key => $province_list)
                                <option value="{{$province_list->id}}"> {{$province_list->name}} </option>
                             @endforeach
                        
                    </datalist>
            </div>
        </div>

        <div class="row">
            <div class="col-auto">
                {{Form::submit('Search', array('class' => 'btn btn-danger mb-3'))}} 
            </div>
            
        </div>

    </div>

{{ Form::close() }}


    <div class="bg-light p-4 rounded">
        <h2>District</h2>

        <div class="lead">
            Manage your district here.
            <a href="{{ route('district.create') }}" class="btn btn-primary btn-sm float-right">Add District</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">@sortablelink('id', 'No.',  ['joe' => 'doe', 'jane' => 'doe'], ["class" => "dropdown-toggle"] )</th>
             <th>@sortablelink('name', 'Name',  ['joe' => 'doe', 'jane' => 'doe'], ["class" => "dropdown-toggle"] )</th>
             <th>@sortablelink('province_id', 'Province',  ['joe' => 'doe', 'jane' => 'doe'], ["class" => "dropdown-toggle"] )</th>
             <th>@sortablelink('created_at', 'Created At',  ['joe' => 'doe', 'jane' => 'doe'], ["class" => "dropdown-toggle"] )</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($districts as $key => $district)
            <tr>
                <td>{{ $district->id }}</td>
                <td>{{ $district->name }}</td>
                <td>{{ $district->provinces->name }}</td>
                <td>{{ $district->created_at }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('district.show', $district->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('district.edit', $district->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['district.destroy', $district->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {{-- {!! $districts->links() !!} --}}
            {!! $districts->appends(request()->except('page'))->render() !!}
        </div>

    </div>
@endsection