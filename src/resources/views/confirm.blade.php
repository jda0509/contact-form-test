@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<main>
    <div class="confirm-form__content">
        <div class="confirm-form__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="/thanks" method="POST">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender" value="{{ $contact['gender_label'] }}" readonly />
                            <input type="hidden" name="gender" value="{{ $contact['gender_label'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                            <input type="hidden" name="email" value="{{ $contact['email'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input type="tel" name="first_phone" value="{{ $contact['tel'] }}" readonly />
                            <input type="hidden" name="first_phone" value="{{ $contact['tel'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                            <input type="hidden" name="address" value="{{ $contact['address'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                            <input type="hidden" name="building" value="{{ $contact['building'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            {{ $contact['category_label'] ?? '未設定' }}
                            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__text">
                            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
                <button type="button" class="form__button-return" onclick="history.back()">修正</button>
            </div>
        </form>
    </div>
</main>
@endsection