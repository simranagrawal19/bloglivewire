<div x-data="{ show: false }" @click.away="show = false">
    <button @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold">
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
    </button>
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl overflow-auto max-h-52"
        style="display:none">
        <a href="/" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">
            All
        </a>
        @foreach ($categories as $category)
            <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300 
            {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'bg-gray-300' : '' }}">{{ ucwords($category->name) }}</a>
        @endforeach
    </div>
</div>
