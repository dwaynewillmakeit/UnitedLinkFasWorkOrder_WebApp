@extends('layouts.main')

@section('main-content')

    <br>
    {{-- <h3 class="text-center customRed"></h3> --}}

    <div class="card">
        <div class="card-header bg-cb">
            <h1 class="">Downloads</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive border rounded p-1">
                <table class="table">
                    <thead class="bg-navy">
                    <tr>
                        <th class="font-weight-bold ">App</th>
                        <th class="font-weight-bold ">Version</th>
                        <th class="font-weight-bold " style="width:20px">Description</th>
                        {{-- <th class="font-weight-bold "></th> --}}


                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><p><a href="{{asset('storage/apks/ChickenIn-v1.0.8.apk')}}" class="btn btn-primary btn-small">Mobile App</a></p></td>
                        <td> <p>0.0.0</p></td>
                        <td><p></p></td>
                        {{-- <td><a href="{{asset('storage/apks/ChickenIn-v1.0.1.apk')}}" class="btn btn-primary btn-small">Download</a></td> --}}
                    </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
