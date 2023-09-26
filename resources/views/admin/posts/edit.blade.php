<x-layout>
    <section class="py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4 text-center">Edit post</h1>
        <x-panel style="width:50rem; margin-left:-10rem;">
            <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $post->id }}" />
                <x-form.input name="title" :value="old('title', $post->title)" />
                <x-form.input name="slug" :value="old('slug', $post->slug)" />
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                <x-form.textarea name="excerpt">{{ old('excerpt', strip_tags($post->excerpt)) }}</x-form.textarea>
                <x-form.textarea name="body">{{ old('body', strip_tags($post->body)) }}</x-form.textarea>

                @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="category_id"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700">category</label>
                    <select name="category_id" id="category_id" class="form-select form-select-lg mb-3">

                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <x-submit-button>Update</x-submit-button>

                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
