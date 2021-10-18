@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?id={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-3">Want to participate?</h2>
            </header>
            <div class="mt-6">
                                <textarea
                                    class="w-full text-sm focus:outline-none focus:ring"
                                    name="body" id="body"
                                    rows="5"
                                    placeholder="Quick, think of something to say!"
                                    required></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to leave a comment!
    </p>
@endauth
