<x-layout>
    <x-slot name="title">
        Add New Post - My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>Add New Post</h1>
    <form action="" method="post">
        {{-- LaravelにおけるCSRF対策 --}}
        @csrf
        {{-- <input> を直接 <label> の内側に入れる場合は関連付けが明確なので、 for および id 属性は必要ない --}}
        <label for="title">
            Title
            <input type="text" name="title" id="title">
        </label>
        <label for="body">
            <textarea name="body" id="body"></textarea>
        </label>
        <button>
            Add
        </button>
    </form>
</x-layout>
