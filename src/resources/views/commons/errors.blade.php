@if ($errors->any())
    <ul class="alert">
        {{-- エラーは変数 $errors の中に自動的に格納される --}}
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
