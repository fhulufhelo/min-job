<div>
    <form action="/" class="mb-5">
            <input type="search" name="search" class="form-control form-control-flush search" placeholder="Search">
    </form>
</div>


<table class="table">
        <thead>
            <tr>
                <th> Job </th>
                <th>Employer </th>
                <th>Experience </th>
                <th>Date posted</th>
                <th>Appy</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->title}}</td>
                    <td>{{$job->user->name}}</td>
                    <td>{{$job->exp}}</td>
                    <td>{{ \Carbon\Carbon::parse($job->updated_at)->diffForHumans()}}</td>

                    @if ( in_array($job->id, $jobIds))
                    <td><a class="btn btn-primary" href=" {{ route('job', ['id' => $job->id]) }} "> Applied </a></td>
                    @else
                    <td><a class="btn btn-primary" href=" {{ route('job', ['id' => $job->id]) }} "> view </a></td>
                    @endif

                    
                </tr>
            @endforeach
    
        </tbody>
    </table>