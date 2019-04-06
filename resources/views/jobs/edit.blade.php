@extends('layouts.app')

@section('content')


    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">Edit Job</div>
                       
                        <form class="p-5" action="{{ route('job.update', ['id' => $job->id]) }}" method="post">
                                @csrf @method('PUT')
                            <div class="form-group">
                                <label for="title">Job Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{$job->title}}" placeholder="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Job Description</label>
                                <textarea name="description" class="form-control" id="description" rows="3" placeholder="description">{{$job->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exp">Number of Experince</label>
                                <input type="number" class="form-control" name="exp" value="{{$job->exp}}" id="exp" placeholder="5">
                            </div>

                            <div class="form-group">
                                    <label for="categories">select Categories</label>
                                    <select class="form-control" name="categories[]" id="categories" multiple>
                                        @if (count($categories))
                                            
                                        @foreach ($categories as $category)
                                          
                                        <option value=" {{$category->id}} ">{{$category->name}}</option>
                                        
                                        @endforeach

                                        @endif
                                    </select>
                                  </div>

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
                                <button type="submit" class="btn btn-primary mb-2">Update job</button>
                            </div>
                        </form>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
