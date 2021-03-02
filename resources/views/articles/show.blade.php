@extends('layout')
@section('header-wrapper')
    <div id="header-featured">
        <div id="banner-wrapper">
            <div id="banner" class="container">
                <h2>Maecenas luctus lectus</h2>
                <p>This is <strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
                <a href="#" class="button">Etiam posuere</a> </div>
        </div>
    </div>
@endsection

@section('welcome')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>{{$articles->title}}</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span> </div>
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            <p>{{$articles->excerpt}}</p>
            @foreach($articles->tags as $tag)
            <p><a href="/articles?tag={{$tag->tag_name}}">
            {{$tag->tag_name}} 
            </a></p>
            @endforeach
        </div>
        <a class="button" href="{{$articles->id}}/edit">EDIT</a>
    </div>
</div>
@endsection
