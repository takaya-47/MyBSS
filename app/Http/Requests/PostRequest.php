<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// リクエストに対する共通処理を行うクラス
class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // ユーザー認証機能は使っていないのでtrueにしておく
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3', // 必須。最低3文字以上。
            'body'  => 'required', // 必須
        ];
    }

    /**
     * バリデーションメッセージの変更
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // エラーメッセージをデフォルトからオリジナルに変更
            'title.required' => 'タイトルは必須です',
            'title.min'      => ':min 文字以上で入力してください',
            'body.required' => '本文は必須です',
        ];
    }
}
