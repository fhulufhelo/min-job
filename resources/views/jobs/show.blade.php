@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Candidate Applied </div>

                <div class="card-body">

                    @if ( count($job->usersApplied))

                        @include('jobs.applied')
                    @else

                    <p>No one have applied to <strong> {{$job->title}} </strong> post yet</p>
                    
                        
                    @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
