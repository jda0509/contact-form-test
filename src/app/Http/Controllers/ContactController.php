<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index',['categories' => $categories]);
    }

    public function confirm(ContactRequest $request)
    {
        $tel =  $request->input('first_phone') . '-' .
                $request->input('second_phone') . '-' .
                $request->input('third_phone') ;

        $contact = $request->only(['last_name','first_name','gender','email',
                                    'first_phone','second_phone','third_phone',
                                    'address','building','category_id','detail']);

        $contact['tel'] = $tel;

        $genderLabels = [0 => '男性', 1 => '女性', 2 => 'その他'];
        $contact['gender_label'] = $genderLabels[$contact['gender']];

        $contact['category_id'] = $request->input('category_id');
        $category = Category::find($contact['category_id']);
        $contact['category_label'] = $category ? $category->type : '不明';

        return view('confirm',['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $tel =  $request->input('first_phone') . '-' .
                $request->input('second_phone') . '-' .
                $request->input('third_phone') ;

        $categoryId = $this->getCategoryIdFromType($request->input('contact_type'));

        $genderLabels = [0 => '男性', 1 => '女性', 2 => 'その他'];
        $contact['gender_label'] = $genderLabels[$contact['gender']];

        $contact = $request->only(['last_name','first_name','gender','email',
                                    'first_phone','second_phone','third_phone',
                                    'address','building','category_id','detail']);

        Contact::create($contact);

        return view('thanks');
    }
}
