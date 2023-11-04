@extends('layouts.blog')

{{-- <p>test: {{ config('app.locale') }}</p> --}}

@section('content')
@include('commons.errors')
<form action="{{ route('articles.store') }}" method="post">
    @include('articles.form')
    <button type="submit">投稿する</button>
    <a href="{{ route('articles.index') }}">キャンセル</a>
</form>
@endsection()
