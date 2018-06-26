@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>RAMENIST</h1>
                @if (!Auth::check())
                    <a href="{{ route('signup.get') }}" class="btn btn-default btn-lg">新規登録</a>
                @endif
            </div>
        </div>
    </div>
@endsection    
    
@section('content')
    test
@endsection