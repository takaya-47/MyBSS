<x-layout>
    <x-slot name="title">
        Edit Post - My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.show', $post) }}">Back</a>
    </div>
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="post">
        {{-- formタグはpatchに対応していないのでpostとしておき、下でhttpメソッドを指定してあげる --}}
        @method('patch')
        {{-- LaravelにおけるCSRF対策 --}}
        @csrf
        {{-- <input> を直接 <label> の内側に入れる場合は関連付けが明確なので、 for および id 属性は必要ないけど一応。 --}}
        <div class="form-group">
            <label for="title">
                Title
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            </label>
            {{-- // バリデーションに引っかかった時のエラーメッセージ --}}
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">
                Body
                <textarea name="body" id="body">{{ old('body', $post->body) }}</textarea>
            </label>
            {{-- // バリデーションに引っかかった時のエラーメッセージ --}}
            @error('body')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-button">
            <button>
                Update
            </button>
        </div>
    </form>
</x-layout>
