<x-layout>
    <x-slot name="title">
        {{ $post->title }} - My BBS
    </x-slot>
    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @method("DELETE")
            @csrf
            
            <button class="btn">[x]</button>
        </form>
    </h1>
    {{-- ****************************************************************************************************************** --}}
    {{-- bladeで改行を含むデータをHTMLに埋め込む場合の処理 --}}
    {{-- e()でhtmlタグを文字実態参照化し、改行があればnl2brでbrタグに変換し、!!でbrタグが文字実態参照化されるのを防ぐ --}}
    {{-- 文字実態参照とは：特殊文字(大なり小なり、アンパサンド等)をそのまま出力せずに変換すること --}}
    {{-- ****************************************************************************************************************** --}}
    <p>{!! nl2br(e($post->body)) !!}</p>
</x-layout>
