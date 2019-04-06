@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3> Welcome back {{$user->name}} </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if (empty($user->logo))
                    <div class="card-header">Upload Company Logo</div>

                    @include('employer.logo')

                
                    @else
                    <div class="card-header">Change Company Logo</div> 
                    <div class="media">
                            <img src=" {{asset('/storage'. '/' . $user->logo->path)}} " class="align-self-start mr-3">
                            
                          </div>
                         

                          <p><a href="#" class="btn btn-danger" 
                            onclick="event.preventDefault();
                                    document.getElementById('destroy').submit();">
                            remove logo
                        </a></p>

                          <form method="POST" id="destroy" action="{{ route('logo.destroy', ['id' => $user->logo->id]) }}" style="display: none;">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                    @endif

                    


                    

    
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><a href=" {{ route('job.create') }} " class="btn btn-info">Add Job</a></div>
        
                        <div class="card-body">

                            @if (count($user->jobs))

                            @include('employer.joblist')
                            
                            @else
                            <p> You haven't post any job yet</p>
                            @endif
                           
        
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
