<?php

namespace App\Http\Requests;

use App\Models\File;

class StoreFolderRequest extends ParentFolderRequest
{

    //get the parent folder
    public ?File $parent = null;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->parent = File::query()->where('id','=',$this->input('parent_id'))->first();

        if($this->parent && !$this->parent->isRoot() && $this-> )

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','max:100'],

        ];
    }
}
