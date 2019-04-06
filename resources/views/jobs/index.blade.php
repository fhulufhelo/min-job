@extends('layouts.app')

@section('content')



    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> All Job List </div>
        
                        <div class="card-body">

                           @if ( count($jobs) )
                               @include('jobs.list')
                           @else
                           <p>No Job have been posted yet</p>
                           @endif
        
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
