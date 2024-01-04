<x-app-layout>
   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($branches as $branch)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
		        @if ( $branch->name == $active_branch[0]->active ) 
                             <p class="mt-4 text-lg text-gray-900"><b>* {{ $branch->name }}</b></p>
			@else
			     <p class="mt-4 text-lg text-gray-900">{{ $branch->name }}</p>
			@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>