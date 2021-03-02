
@foreach($alists as $alist)
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>{{$alist->title}}</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span> </div>
            <a href="articles/{{$alist->id}}"><p><img src="{{public_path('images/banner.jpg')}}" alt="" class="image image-full" height="50px"  width="70px" /> </p></a>
            <a href="articles/{{$alist->id}}"><p>{{$alist->excerpt}}</p></a>
        </div>

    </div>
</div>
@endforeach