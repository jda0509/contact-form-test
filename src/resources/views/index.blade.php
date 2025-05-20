@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<main>
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form class="form" action="/confirm" method="post">
            @csrf
            <div class="form__group">
                <dt class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </dt>
                <dd class="form__group-content">
                    <div style="display: flex; gap: 4%;">
                        <div class="form__input--last_name">
                            <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
                        </div>
                        <div class="form__error">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form__input--fist_name">
                            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}"/>
                        </div>
                        <div class="form__error">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </dd>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <input type="radio" name="gender" value="0" checked="checked">男性
                        <input type="radio" name="gender" value="1">女性
                        <input type="radio" name="gender" value="2">その他
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <dt class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </dt>
                <dd class="form__group-content">
                    <div style="display: flex; align-items: center;">
                        <div class="form__input--first_phone">
                            <input type="tel" name="first_phone" placeholder="080" value="{{ old('first_phone') }}" />
                        </div>
                        <span class="hyphen">-</span>
                        <div class="form__input--second_phone">
                            <input type="tel" name="second_phone" placeholder="1234" value="{{ old('second_phone') }}" />
                        </div>
                        <span class="hyphen">-</span>
                        <div class="form__input--third_phone">
                            <input type="tel" name="third_phone" placeholder="5678" value="{{ old('third_phone') }}">
                        </div>
                        <div class="error">
                            @error('tel')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </dd>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                    </div>
                    <div class="error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}" />
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--select">
                        <select name="category_id" >
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>
                                    {{ $category->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </div>
                </div>
                <div class="error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</main>
@endsection