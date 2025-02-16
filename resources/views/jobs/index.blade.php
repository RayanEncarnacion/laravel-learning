<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>
        <div class="flex items-center justify-between">
            <span>Jobs Listing</span>
            <a href="/jobs/create" class="pointer-events-auto rounded-md px-3 py-2 text-[0.8125rem]/5 font-semibold text-gray-500 border shadow-sm border-gray-200 hover:bg-[#fcfcfc]">Create Job</a>
        </div>
    </x-slot:heading>

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