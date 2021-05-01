@extends('layouts.app')
@section('content')
    <div class="card-body container">
        @if (session('status_success'))
            <p style="color: green"><b>{{ session('status_success') }}</b></p>
        @else
            <p style="color: red"><b>{{ session('status_error') }}</b></p>
        @endif
        <table class="table">
            <tr>
                <th>Maker</th>
                <th>Year</th>
                <th>Owner</th>
                <th style="text-align: center">Number of owners</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
            @foreach ($trucks as $truck)
                <tr>
                    <td>{{ $truck->truckmaker['name'] }}</td>
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
