<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<br>
<div class="container">
<section class="container">
<form action="/articles/{{$asrticle->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="input @error('title') border border-danger @enderror form-control" id="exampleFormControlInput1" name="title" placeholder="type heading..." value="{{$asrticle->title}}" >
    @error('title')
    <p class="text-danger">{{$errors->first('title')}}</p>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="excerpt" rows="3" placeholder="type your notes here...">{{$asrticle->excerpt}}</textarea>
    @error('excerpt')
    <p class="text-danger">{{$errors->first('excerpt')}}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3" placeholder="type your notes here...">{{$asrticle->body}}</textarea>
    @error('excerpt')
    <p class="text-danger">{{$errors->first('body')}}</p>
    @enderror
  </div>
  
  <button class="btn btn-primary" type="submit">update</button>
</form>
</section>
</div>