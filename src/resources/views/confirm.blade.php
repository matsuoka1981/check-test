@extends('layouts.app')

@section('title')
お問い合わせフォーム確認ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">

    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        {{ $contact['first_name']. '  '. $contact['last_name'] }}
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @switch($contact['gender'])
                        @case(1)
                        @php $genderText = '男性'; @endphp
                        @break

                        @case(2)
                        @php $genderText = '女性'; @endphp
                        @break

                        @case(3)
                        @php $genderText = 'その他'; @endphp
                        @break
                        @endswitch
                        {{ $genderText }}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__">
                        {{ $contact['tell'] }}
                        <input type="hidden" name="tell" value="{{ $contact['tell'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__">
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__">
                        {{ $contact['content'] }}
                        <input type="hidden" name="content" value="{{ $contact['content'] }}" readonly />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__">
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>

            </table>

        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <!-- <button type="submit" name='modify' value="modify">修正</button> -->
        <a href="/" class="modify">修正</a>
    </form>
</div>
@endsection