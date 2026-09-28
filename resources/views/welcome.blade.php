@extends('layouts.app')

@section('title', 'wellcome page')

@section('content')

    <body>
        <a href="{{ route('books.index') }}">books</a>
        <a href="{{ route('categories.index') }}">categories</a>
        <a href="{{ route('members.index') }}">members</a>
        <a href="{{ route('loans.index') }}">loans</a>
    </body>

@endsection
