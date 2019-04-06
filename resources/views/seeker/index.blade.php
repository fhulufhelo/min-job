@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Welcome back  - {{ $user->name }} </div>

                <div class="card-body">

                      @if (empty($user->document))
                      @include('seeker.resume')

                      @else

                      <a 
                      href="#" 
                      class="btn btn-primary" 
                        onclick="event.preventDefault();
                            document.getElementById('download').submit();">
                        Download
                        </a>
                    <form  
                    id="download" 
                    action="{{ route('download', ['id' => $user->document->id]) }}" 
                    style="display: none;">
                    </form> 



                      <a 
                      href="#" 
                      class="btn btn-danger" 
                      onclick="event.preventDefault();document.getElementById('destroy').submit();">
                        remove resume 
                      </a>

                      <form method="POST" id="destroy" action="{{ route('resume.destroy', ['id' => $user->document->id]) }}" style="display: none;">
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
                <div class="card-header"> Update Profile </div>

                <div class="card-body">

                    @include('seeker.profile')

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Keywords </div>
    
                    <div class="card-body">

                        <div class="">

                                <form class="p-5" action="{{ route('keywords') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                                <label for="keywords">select keywords</label>
                                                <select class="form-control" name="keywords[]" id="keywords" multiple>
                                                    @if (count($keywords))
                                                        
                                                    @foreach ($keywords as $keyword)
                                                      
                                                    <option value=" {{$keyword->id}} ">{{$keyword->name}}</option>
                                                    
                                                    @endforeach
            
                                                    @endif
                                                </select>
                                              </div>


                                              <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mb-2">Update Keywords</button>
                                                </div>
                                       
                                    </form>

                        </div>

                        <div class="mt-3">
                                @if ( count($user->keywords) )
                            
                                @foreach ($user->keywords as $item)
                                <span class="badge badge-secondary"> {{$item->name}} </span>
                                @endforeach
                                
                                @else
                                    
                                @endif

                        </div>
    

    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
