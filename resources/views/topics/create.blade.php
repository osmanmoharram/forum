<x-app-layout>
    <div x-data="{
        show: false,
        tags: [],
        newTag: '',
        
        addTag(newTag) {
            this.newTag = '';
            for(tag of this.tags) {
                if(tag === newTag) {
                    return alert('this tag already added!');
                }
            }
            this.tags.push(newTag);
        },

        removeTag(newTag){
            let filtered = this.tags.filter((tag) => {
                return tag !== newTag;
            });
            this.tags = filtered;
        },

        preview() {
            const code = document.getElementById('body').value;	
            const template = document.getElementById('template');

            template.innerHTML = md.render(code);
        }
    }" class="flex flex-col space-y-8 lg:space-y-0 lg:flex-row lg:space-x-8 items-start">

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
                                <textarea   id="body"
                                            name="body"
                                            @blur.prevent="preview"
                                            class="p-2 text-gray-700 text-opacity-90 shadow-sm focus:ring-4 focus:ring-blue-200 focus:border-blue-500 mt-1 block w-full h-64 sm:text-sm border border-gray-300 rounded-md transition duration-200 ease-in-out placeholder-gray-300"
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
                                            <span class="cursor-pointer" @click.prevent="removeTag(tag);">&times;</span>
                                            <input type="text" class="hidden" name="tags[]" value="tag">
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-2">
                            <x-buttons.secondary x-text="show === true ? 'Hide Preview' : 'Show Preview'"
                                                    @click="show = ! show"
                                                    class="py-sm w-28 text-sm" />

                            <x-buttons.primary class="py-sm w-28" @click="document.querySelector('form').submit()">
                                {{ __('Post') }}
                            </x-buttons.primary>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full lg:flex-1">
            <div class="relative">
                <!-- Template -->
                <div id="template" x-show="show" class="absolute w-full" style="display: none"></div>
    
                <!-- Preview Area -->
                <div class="flex items-center justify-center text-gray-700 text-opacity-60 border-2 border-gray-700 border-opacity-60 border-dashed rounded-md h-xl">
                    {{ __('Preview code') }}
                </div>
            </div>

            <div class="mt-6 flex items-center text-gray-700 text-opacity-60 text-sm space-x-6">
                <span class="block">
                    {{ __('**') }}<strong>{{ __('Bold') }}</strong>{{ __('**') }}
                </span>
                <div class="flex items-center">
                    <span class="block">{{ __('```') }}</span>
                    <span class="mt-1 inline-block text-xs px-2 py-1 rounded-md border bg-gray-50 shadow-sm"><code>{{ __('code') }}</code></span>
                    <span class="block mt-1">{{ __('```') }}</span>
                </div>
                <span class="block">
                    {{ __('*') }}<i>{{ __('Italic') }}</i>{{ __('*') }}
                </span>
                <span class="block"> {{ __('>quote') }} </span>
            </div>
        </div>
    </div>
</x-app-layout>