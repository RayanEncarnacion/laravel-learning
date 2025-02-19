<x-layout>
    <x-slot:title>Create job</x-slot:title>
    <x-slot:heading>Create Job</x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="pb-4">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We need a few key details to create a job.</p>
            
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 {{ $errors->has('title') ? "outline-red-500 focus-within:outline-red-500" : "focus-within:outline-indigo-600"}}">
                                <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    class="block min-w-0 grow py-1.5 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                                    placeholder="Team Lead" 
                                    value="{{ old('title') }}"
                                    required>
                            </div>
                            @error('title')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 {{ $errors->has('salary') ? "outline-red-500 focus-within:outline-red-500" : "focus-within:outline-indigo-600"}}">
                                <input 
                                    type="text" 
                                    name="salary" 
                                    id="salary" 
                                    class="block min-w-0 grow py-1.5 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                                    placeholder="$30,000 per year" 
                                    value="{{ old('salary') }}"
                                    required>
                            </div>
                        </div>
                        @error('salary')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                </div>
            </div>
        </div>
      
        <div class="mt-4 flex items-center gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
</x-layout>