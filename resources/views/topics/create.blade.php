<x-app-layout>
    <div x-data="{
        show: false,
        tags: [],
        newTag: '',
        
        addTag(newTag) {
            this.newTag = '';

            if(newTag.replace(/^\s+|\s+$/gm,'') === '') {
                return alert('tag cannot be empty');
            }

            for(tag of this.tags) {
                if(tag === newTag) {
                    return alert(newTag + ' tag already added!');
                }
            }
            this.tags.push(newTag.trim());
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
            <form action="{{ route('topics.store') }}" method="POST" class="new-topic-form" @submit.prevent>
                @csrf

                <div class="shadow rounded-md overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div>
                            <x-fields.label for="title" value="title" />

                            <x-fields.input type="text" class="w-full" id="title" name="title" :value="old('title')" placeholder="e.g. How to create a new Laravel application?" />

                            @error('title')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-fields.label for="body" value="body" />

                            <x-fields.textarea type="text" class="w-full h-64" id="body" name="body" :value="old('body')" placeholder="e.g. Provide further details about your topic?" />

                            @error('body')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-fields.label for="tags" value="Tags" />

                            <x-fields.input type="text" id="tags" class="w-full" placeholder="e.g. Laravel, Javascript, Mysql"
                                x-model="newTag"
                                @keydown.enter="addTag(newTag); $dispatch('submit.prevent')" />


                            <ul class="mt-4 flex items-center space-x-1">
                                <template x-for="tag in tags">
                                    <li class="bg-gray-100 p-2 font-bold space-x-1 rounded-md text-xs text-gray-700 text-opacity-70">
                                        <span x-text="tag"></span>
                                        <span class="cursor-pointer" @click.prevent="removeTag(tag);">&times;</span>
                                    </li>
                                </template>

                                <input id="tagsList" type="hidden" name="tags" x-model="tags">
                            </ul>
                        </div>

                        <div class="flex items-center justify-end space-x-2">
                            <x-buttons.secondary class="py-sm w-28"
                                x-text="show === true ? 'Hide Preview' : 'Show Preview'" @click="show = ! show" />

                            <x-buttons.primary class="py-sm w-28" value="post"
                                @click="document.querySelector('.new-topic-form').submit();" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="w-full lg:flex-1">
            <div class="relative">
                <!-- Template -->
                <div id="template" x-show="show" class="absolute w-full h-xl rounded-md shadow p-6" style="background: white;"></div>
    
                <!-- Preview Area -->
                <div class="flex items-center justify-center text-gray-700 text-opacity-60 border-2 border-gray-700 border-opacity-60 border-dashed rounded-md h-xl">
                    {{ __('Preview Topic Body') }}
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