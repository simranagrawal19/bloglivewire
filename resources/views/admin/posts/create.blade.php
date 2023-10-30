<x-layout>
{{-- create post --}} 
    <section class="py-8 max-w-sm mx-auto">
        <h1 class="text-lg font-bold mb-4 text-center">Publish new post</h1>
        <x-panel class="" style="width:50rem; margin-left:-10rem;">
        <form action="/admin/posts" method= "post" enctype="multipart/form-data">
        @csrf
          <x-form.input name="title"/>
          <x-form.input name="slug"/>
          <x-form.input name="thumbnail" type="file"/>
          <x-form.textarea name="excerpt"/>


          <div class="mb-6">
            <label for="body" class="block mb-2 uppercase font-bold  text-xs text-gray-700">Body</label>
            <textarea
              class="border border-gray-400 p-2 w-full" name="body" id="body" required>
              {{ old('body') }}
            </textarea>

              @error('body')
              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            
          </div>

          <div class="mb-6">
            <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">category</label>
            <select class= "form-select form-select-lg mb-3" name="category_id" id="category_id">
             
                @foreach (\App\Models\Category::all() as $category)

                <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    
                @endforeach
            </select>

              @error('category')
              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            
          </div>
        
            <x-submit-button>Publish</x-submit-button>
      
    </form>
</x-panel>
    </section>
</x-layout>