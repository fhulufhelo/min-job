

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                      
                       
                        <form class="p-5" action="{{ route('profile.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">name</label>
                                <input type="text" class="form-control" name="name" id="title"  value="{{ ( ! empty( $user->seekerprofile ) ) ?  $user->seekerprofile->name : '' }}" required>
                            </div>


                            <div class="form-group">
                                <label for="exp">year of Experince</label>
                                <input type="number" class="form-control" name="exp" id="exp" value="{{ ( ! empty( $user->seekerprofile ) ) ?  $user->seekerprofile->exp : 0 }}"  required>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-2">Update profile</button>
                            </div>
                        </form>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>



