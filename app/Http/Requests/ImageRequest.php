<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file'=>'required|image|mimes:png,jpg,jpeg',
            'title'=>'nullable',
        ];
    }

    public function getData()
    {
        $data = $this->validated() + [
            'user_id' => 1 //$this->user()->id,
        ];

        if($this->hasFile('file')){
            $directory = Image::makeDirectory();
            $data['file'] = $this->file->store($directory);
            $data['dimension'] = Image::getDimension($data['file']);

        }

        if($title = $data['title']){
            $data['slug'] = $this->getSlug($title);
        }
        return $data;
    }

    protected function getSlug($title)
    {
        $slug = str($title)->slug();
        $numSlug = Image::where('slug','regexp',"^" . $slug . "(-[0-9])?")->count();

        if($numSlug > 0){
            return $slug . "-" . $numSlug + 1;
        }
        return $slug;

    }
}
