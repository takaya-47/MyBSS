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
        <form action="{{ route('posts.destroy', $post) }}" method="post" id="delete_post">
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

    <h2>Comments</h2>
    <ul>
        <li>
            <form action="{{ route('comments.store', $post) }}" method="post" class="comment-form">
                @csrf

                <input type="text" name="body">
                <button>Add</button>
            </form>
        </li>
        @foreach ($post->comments()->latest()->get()
    as $comment)
            <li>
                {{ $comment->body }}
                <form action="{{ route('comments.destroy', $comment) }}" method="post" class="delete-comment">
                    @method('DELETE')
                    @csrf

                    <button class="btn">[x]</button>
                </form>
            </li>
        @endforeach
    </ul>

    <script>
        'use strict'; {
            document.getElementById("delete_post").addEventListener('submit', (e) => {
                // ページ遷移などを防ぐためpreventDefaultを使う
                e.preventDefault();

                if (!confirm("本当に削除しますか？")) {
                    // 「キャンセル」を選んだ時は処理をキャンセル
                    return;
                }
                // 「OK」を選択したときは削除処理に進む
                e.target.submit();
            });

            document.querySelectorAll('.delete-comment').forEach(form => {
                form.addEventListener('submit', (e) => {
                    e.preventDefault();

                    if (!confirm("本当に削除しますか？")) {
                        return;
                    }
                    form.submit();
                })
            });
        }
    </script>
</x-layout>
