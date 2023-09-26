{{-- @props(['post'])
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl mx-8 my-4']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {!! $post->title !!}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold"><a
                                href="/authors/ {{ $post->author->username }}">{{ $post->author->name }}</a></h5>

                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article> --}}

@props(['post'])
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl mx-8 my-4']) }}>

    <div>
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="/images/lary-avatar.svg" alt="User Image">
                    <span class="username"><a href="/authors/ {{ $post->author->username }}"></a>{{ $post->author->username }}</span>

                </div>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">
                <img class="img-fluid pad" src="/images/illustration-3.png" alt="Photo">
                <p class="mt-2"><a href="/posts/{{ $post->slug }}">
                        {!! $post->title !!}
                    </a></p>
                <button type="button" class="btn btn-default btn-sm">
                    <x-category-button :category="$post->category" />
                </button>
            </div>

            <div class="card-footer card-comments" style="display: block;">
                <div class="card-comment">
                    <div class="comment-text">

                        {!! $post->excerpt !!}

                    </div>

                    <button type="button" class="btn btn-default btn-sm">
                        <a href="/posts/{{ $post->slug }}">Read More</a>
                    </button>
                </div>

            </div>

        </div>

    </div>
</article>
