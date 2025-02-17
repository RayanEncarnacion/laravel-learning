<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job {{ $job->id }}</x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $job->title }}</h2>
    <p class="mb-6">Pays {{ $job->salary }} per year</p>

    <a href="/jobs/{{ $job->id }}/edit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
</x-layout>