<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Jobs Listing</x-slot:heading>

    <div class="space-y-3 mb-3">
        @foreach ($jobs as $job)
            <a href="/job/{{ $job['id'] }}" class="block px-4 py-2 border border-gray-200 rounded-lg">
                <div class="text-blue-600 font-bold">{{ $job->employer->name }}</div>
                <strong>{{ $job['title'] }}</strong> Pays {{ $job['salary'] }} per year.    
            </a>
        @endforeach
    </div>
    {{ $jobs->links() }}
</x-layout>