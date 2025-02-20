<div>
    <h1>{{ $job->title }}</h1>
    <p>Congrats, your job is now live in our website.</p>

    <p>
        <a href="{{ url('/jobs/' . $job->id) }}">View your job listing</a>
    </p>
</div>