@extends('admin.layouts.master')
@section('main_content')
    <div class="row">
        <div class="col-xl-12 col-xxl-12 ">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6 col-lg-8 col-xxl-6" >
                            <h5 class="card-title mb-0">Submitted Abstract Record</h5>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th style="width: 5%;">S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Submitted File</th>
                        <th>Institute</th>
                        <th>Degree</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @if(!empty($abstractFile))
                        @foreach($abstractFile as $faculty)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $doctorTitle[$faculty->title]??null }} {{ $faculty->name??null }}</td>
                                <td> {{ $faculty->email??null }}</td>
                                <td> {{ $faculty->mobile??null }}</td>
                                <td>
                                    @if(!empty($faculty->abstract_file) && Storage::disk('public')->exists($faculty->abstract_file))
                                        <a href="{{ asset('storage/app/public/' . $faculty->abstract_file) }}" target="_blank" >Abstract File</a>
                                    @else

                                    @endif
                                </td>
                                <td>{{ $faculty->institute??null }}</td>
                                <td>{{ $faculty->degree??null }}</td>


                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
