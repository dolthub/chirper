<x-app-layout>
   <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($branches as $branch)
                <div class="p-6 flex space-x-2">
		    @if ( $branch->name == $active_branch[0]->active )
		    <div class="flex-1">
		        <div>
		            <span class="text-gray-800"><b>* {{ $branch->name }}</b></span>
	                </div>
		        <div>
		        </div>
		    </div>
		    @else
                    <div class="flex-1">
		        <div class="flex justify-between items-center">
			    <div>
			        <span class="text-gray-800">{{ $branch->name }}</span>
			    </div>
			    <div>
			     <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                 </x-slot>
                                 <x-slot name="content">
				     <form method="POST" action="{{ route('branches.destroy', $branch) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('branches.destroy', $branch)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                     </form>
				     <form method="POST" action="{{ route('branches.update', $branch) }}">
                                            @csrf
                                            @method('patch')
                                            <x-dropdown-link :href="route('branches.update', $branch)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Use') }}
                                            </x-dropdown-link>
			             </form>
                                 </x-slot>                                
                            </x-dropdown>
			    </div>
			</div>
                    </div>
		    @endif
                </div>
            @endforeach
        </div>
	<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('branches.store') }}">
                @csrf
                <textarea
                name="branch_name"
                placeholder="{{ __('Name your new branch') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
            <x-primary-button class="mt-4">{{ __('Create new branch') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>