<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Jobs Listing</x-slot:heading>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/job/{{ $job['id'] }}" class="text-blue-700 hover:underline">
                    <strong>{{ $job['title'] }}</strong> Pays {{ $job['salary'] }} per year.    
                </a>
            </li>   
        @endforeach
    </ul>
</x-layout>