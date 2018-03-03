@extends('layouts.news.main')

@section('col-center')
    <div id="news__search">
        <div><i class="fa fa-search" aria-hidden="true"></i></div>
        <textarea id="news__search__textarea" rows="1" placeholder="Найти"></textarea>
    </div>

    {{ csrf_field() }}

    @include('post')
@endsection