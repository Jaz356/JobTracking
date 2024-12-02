@extends('layouts.app')

@section('content')
        <div class="tableWork">
            <table class="table table-striped table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Work Apply</th>
                        <th scope="col">Company</th>
                        <th scope="col">Offer End</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{ $work->id}}</td>
                            <td>{{ $work->created_at->format("d/m/y")}}</td>
                            <td>{{ $work->updated_at->format("d/m/Y")}}</td>
                            <td>{{ $work->company}}</td>
                            <td>{{ $work->workapply}}</td>
                            <td>
                                <ul>
                                    @forelse ($work->follows as $follow)
                                        <li>{{$follow->id}} - {{ $follow->news }}</li>
                                    @empty
                                        <li>❌❌❌❌❌❌❌❌❌</li>
                                    @endforelse
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection