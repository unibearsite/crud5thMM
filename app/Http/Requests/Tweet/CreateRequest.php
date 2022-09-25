<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
      return true;
    }
    public function rules()
    {
      return [
        //バリデーション→必須で、140文字以内
        'tweet' => 'required|max:140'  
      ];
    }
    // Requestクラスのuser関数で今自分がログインしているユーザーが取得している
    public function userId(): int
    {
      return $this->user()->id;
    }
    public function tweet(): string
    {
      return $this->input('tweet');
    }
}
