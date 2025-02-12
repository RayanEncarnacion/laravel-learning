<x-layout>
    <x-slot:title>Jobs</x-slot:title>
    <x-slot:heading>Job {{ $job['id'] }}</x-slot:heading>

    <h2 class="font-bold text-2xl">{{ $job['title'] }}</h2>
    <p>Pays {{ $job['salary'] }} per year</p>
</x-layout>