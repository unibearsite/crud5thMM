<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }
    public function tweet(): string
    {
      return $this->input('tweet');
    }
    public function id(): int
    {
      return (int) $this->route('tweetId');
    }
}
