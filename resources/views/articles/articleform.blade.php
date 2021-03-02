<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<br>
<div class="container">
<section class="container">
<form action="/articles" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="input @error('title') border border-danger @enderror form-control" id="exampleFormControlInput1" name="title" placeholder="type heading..." value="{{old('title')}}" >
    @error('title')
    <p class="text-danger">{{$errors->first('title')}}</p>
    @enderror
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">description</label>
    <textarea class="input @error('excerpt') border border-danger @enderror form-control" id="exampleFormControlTextarea1" name="excerpt" rows="3" placeholder="type your notes here...">{{old('excerpt')}}</textarea>
    @error('excerpt')
    <p class="text-danger">{{$errors->first('excerpt')}}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Body</label>
    <textarea class="input @error('body') border border-danger @enderror form-control" id="exampleFormControlTextarea1" name="body" rows="3" placeholder="type here..." >{{old('body')}}</textarea>
    @error('body')
    <p class="text-danger">{{$errors->first('body')}}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tags</label>
    <select name="tags[]" multiple>
      @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
       @endforeach
    </select>
    @error('tags')
    <p class="text-danger">{{$errors->first('tags')}}</p>
    @enderror
  </div>
  <button class="btn btn-primary" type="submit">save</button>
</form>
</section>
</div>