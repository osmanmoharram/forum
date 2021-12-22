<x-app-layout>
    <div x-data="data()" class="flex flex-col lg:flex-row items-start space-y-8 lg:space-y-0 lg:space-x-8">

        <div class="w-full lg:flex-1">
            <form action="{{ route('topics.store') }}" method="POST" @submit.prevent>
                @csrf

                <div class="shadow rounded-md overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3">
                                <label for="title" class="block text-sm font-medium text-gray-700 text-opacity-60">{{ __('Title') }}</label>
                                <div class="rounded-md shadow-sm">
                                    <x-input type="text"
                                                id="title"
                                                name="title"
                                                :value="old('title')"
                                                placeholder="e.g. How to create a new Laravel application?"
                                                class="p-2 text-gray-700 text-opacity-90 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full rounded-md sm:text-sm border border-gray-300 transition duration-200 ease-in-out placeholder-gray-300" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="body" class="block text-sm font-medium text-gray-700 text-opacity-60">{{ __('Body') }}</label>
                            <div class="mt-1">
                                <textarea id="body"
                                            name="body"
                                            rows="10"
                                            class="p-2 text-gray-700 text-opacity-90 shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md transition duration-200 ease-in-out placeholder-gray-300"
                                            placeholder="Provide further details about the topic ..."></textarea>
                            </div>
                        </div>

                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-700 text-opacity-60">{{ __('Tags') }}</label>
                            <div class="mt-1">
                                <div class="rounded-md shadow-sm">
                                    <x-input type="text"
                                                id="tags"
                                                placeholder="e.g. Laravel, Javascript, Mysql"
                                                class="p-2 text-gray-700 text-opacity-90 focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full rounded-md sm:text-sm border border-gray-300 transition duration-200 ease-in-out placeholder-gray-300"
                                                x-model="newTag"
                                                @keydown.enter="addTag(newTag); $dispatch('submit.prevent')" />
                                </div>
                                <ul id="tagsList" class="mt-4 flex items-center space-x-1">
                                    <template x-for="tag in tags">
                                        <li class="bg-gray-100 p-2 font-bold space-x-1 rounded-md text-xs text-gray-700 text-opacity-70">
                                            <span x-text="tag"></span>
                                            <span class="cursor-pointer" @click="removeTag(tag)">&times;</span>
                                            <input type="text" class="hidden" name="tags[]" value="tag">
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>

                        <div class="text-right space-x-1">
                            <button type="button"
                                    @click="show = ! show;"
                                    x-text="show === true ? 'Hide Preview' : 'Show Preview'"
                                    class="py-2 w-28 text-sm font-medium rounded-md text-gray-700 text-opacity-60 bg-gray-200 bg-opacity-70 hover:bg-gray-200 transition duration-200 ease-in-out"></button>

                            <button type="button" @click="submit" class="py-2 w-24 text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 transition duration-200 ease-in-out">
                                {{ __('Post') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full lg:flex-1">
            <div>
                <div x-ref="template"
                    x-show="show"
                    class="bg-white p-6 shadow rounded-md space-y-6"
                    style="display: none">
    
                    <section class=""></section>
                </div>
    
                <div x-show="! show" class="flex items-center justify-center text-gray-700 text-opacity-60 border-2 border-gray-700 border-opacity-60 border-dashed rounded-md h-96">
                    {{ __('Preview code')}}
                </div>
            </div>
            <div class="mt-6 flex items-center text-gray-700 text-opacity-60 text-sm space-x-6">
                <span class="block">
                    **<strong>Bold</strong>**
                </span>
                <div class="flex items-center">
                    <span class="block">```</span>
                    <span class="mt-1 inline-block text-xs px-2 py-1 rounded-md border bg-gray-50 shadow-sm"><code>code</code></span>
                    <span class="block mt-1">```</span>
                </div>
                <span class="block">
                    *<i>Italic</i>*
                </span>
                <span class="block">
                    >quote
                </span>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
@endpush