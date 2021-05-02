@extends('layouts.app')
@section('content')
    <div class="card-body container">
        <div style="margin-bottom: 32px;" class="card-body">
            <form class="form-inline" action="{{ route('trucks.index') }}" method="GET">
                <select style="margin-right: 20px;" name="truckmaker_id" id="" class="form-control">
                    <option value="" selected disabled>Choose a truck to filter by</option>
                    @foreach ($truckmakers as $truckmaker)
                        <option value="{{ $truckmaker->id }}" @if ($truckmaker->id == app('request')->input('truckmaker_id')) selected="selected" @endif>{{ $truckmaker->truck_name }}
                        </option>
                    @endforeach
                </select>
                <button style="margin-right: 10px;" type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-success" href={{ route('trucks.index') }}>Show All</a>
            </form>
        </div>
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>@sortablelink('truckmaker_id', 'Maker')</th>
                <th>@sortablelink('year')</th>
                <th>@sortablelink('name', 'Owner')</th>
                <th style="text-align: center">@sortablelink('owners_count', 'Number Of Owners')</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
            @foreach ($trucks as $truck)
                <tr>
                    <td>{{ $truck->truckmaker['truck_name'] }}</td>
                    <td>{{ $truck->year }}</td>
                    <td>{{ $truck->name }}</td>
                    <td style="text-align: center">{{ $truck->owners_count }}</td>
                    <td>{{ $truck->comments }}</td>
                    <td>
                        <form action="{{ route('trucks.destroy', $truck->id) }}" method="POST">
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('trucks.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
