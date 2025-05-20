<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $prefectures = ['東京都','北海道','大阪府','愛知県','福岡県','神奈川県','埼玉県','千葉県','栃木県','群馬県','茨城県'];

        $firstPhones = ['080','090','070'];

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->numberBetween(0,2),
            'email' => $this->faker->unique()->safeEmail,
            'first_phone' => $this->faker->randomElement($firstPhones),
            'second_phone' => $this->faker->numberBetween(1000,9999),
            'third_phone' => $this->faker->numberBetween(1000,9999),
            'address' => $this->faker->randomElement($prefectures) . $this->faker->city . $this->faker->streetAddress,
            'building' => $this->faker->optional()->secondaryAddress,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'detail' => $this->faker->randomElement([
                '商品の使い方について教えてください。',
                '返品方法を教えていただけますか？',
                'サイトの表示が崩れています。',
                '請求金額に誤りがあります。',
                '配送がまだ届いていません。状況を教えてください。'
            ]),
            ];
    }
}
