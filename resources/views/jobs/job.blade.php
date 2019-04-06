@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> posted by  - {{ $job->user->name }} </div>

                <div class="card-body">
                    <h5 class="card-title"> <strong>Job: </strong> {{$job->title}} </h5>

                    @if ( ! empty($job->description) )
                    <p>  <strong>Description: </strong> </p>
                    <p class="card-text"> {{$job->description}} </p> 
                    @endif

                    @if ( ! empty($job->exp) )
                    <p class="card-text">  <strong>Experience: </strong> {{$job->exp}} </p> 
                    @endif


                    @if ( count($jobIds) && $currentUserId !== $job->user->id)

                        @if (in_array($job->id, $jobIds))
                        <span class="btn btn-secondary disabled" >  Applied </span>
                        @endif

                    
                    @else

                    @if ($currentUserId !== $job->user->id)
                    <a href="#" class="btn btn-primary" 
                    onclick="event.preventDefault();
                            document.getElementById('apply').submit();">
                        Appy
                    </a>
                    <form method="POST" id="apply" action="{{ route('job.apply', ['id' => $job->id]) }}" style="display: none;">
                        @csrf
                    </form> 
                        
                    @endif

                    
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
