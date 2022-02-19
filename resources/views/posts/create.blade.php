<x-layout>
    <x-slot name="title">
        Add New Post - My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>Add New Post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        {{-- LaravelにおけるCSRF対策 --}}
        @csrf
        {{-- <input> を直接 <label> の内側に入れる場合は関連付けが明確なので、 for および id 属性は必要ないけど一応。 --}}
        <div class="form-group">
            <label for="title">
                Title
                <input type="text" name="title" id="title">
            </label>
            {{-- // バリデーションに引っかかった時のエラーメッセージ --}}
            @error('title')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">
                Body
                <textarea name="body" id="body"></textarea>
            </label>
            {{-- // バリデーションに引っかかった時のエラーメッセージ --}}
            @error('body')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-button">
            <button>
                Add
            </button>
        </div>
    </form>
</x-layout>
