<table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Applied</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>

            @foreach ($user->jobs as $job)

                <tr>
                    <td> {{$job->title}} </td>
                    <td>  <a href=" {{ route('job.show', ['id' => $job->id]) }}"> {{ count($job->usersApplied) }}  </a> </td>
                    <td>
                        <a class="btn btn-primary" href=" {{ route('job', ['id' => $job->id]) }} "> view </a>

                        <a class="btn btn-warning" href=" {{ route('job.edit', ['id' => $job->id]) }} "> edit </a>

                        <a href="#" class="btn btn-danger" 
                            onclick="event.preventDefault();
                                    document.getElementById('destroy').submit();">
                            delete
                        </a>

                        <form method="POST" id="destroy" action="{{ route('job.destroy', ['id' => $job->id]) }}" style="display: none;">
                                @csrf
                                {{ method_field('DELETE') }}
                            </form>
                    </td>
                    
                  </tr>
                
            @endforeach


         
        </tbody>
      </table>