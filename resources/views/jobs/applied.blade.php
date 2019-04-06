<table class="table">
    <thead>
        <tr>
            <th> Employee User</th>
            <th scope="col">Year of Experince </th>
            <th scope="col">Resume</th>
            <th scope="col">Accept</th>
            <th scope="col">Reject</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($job->usersApplied as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->ext}}</td>
                <td>
                    @if ( empty($user->document->path) )
                        User didn't upload CV
                    @else

                    <a 
                    href="#" 
                      onclick="event.preventDefault();
                          document.getElementById('download').submit();">
                      Download
                      </a>
                  <form  
                  id="download" 
                  action="{{ route('download', ['id' => $user->document->id]) }}" 
                  style="display: none;">
                  </form> 
                    
                    @endif
                </td>
                @if ($user->accept)
                <td> <a href="javascript:void(0)">Accept</a> </td>
                @else
                <td>Reject</td>
                @endif
            </tr>
        @endforeach

    </tbody>
</table>