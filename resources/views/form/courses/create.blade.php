@if(Session::has('success'))

  <div class="alert alert-success">
  {{ Session::get('success') }}
  {{ Session::forget('success') }}
 </div>


@endif

<form class="row g-3" action= "{{url('/courses')}}" method ="POST" enctype="multipart/form-data">

@csrf

  <div class="col-12">
    <label for="product_name" class="form-label">Product Name</label>
    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="">
  </div>

  <br/> <br/>

  <div class="col-12">
    <label for="product_price" class="form-label">Product price</label>
    <input type="text" name="product_price" class="form-control" id="product_price" placeholder="">
  </div>
  <br/> <br/>

  <div class="col-12">
  <label for="product_description" class="form-label">Product Description</label>
  <textarea name="product_description" class="form-control" id="product_description" rows="3"></textarea>
</div>

  <br/> <br/>
 


  <div class="form-group">
    <label for="image">Image :</label>
    <input type="file" name="image" class="form-control-file" id="image" accept="image/*">
  </div>

  <br/> <br/>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">New product</button>
  </div>

</form>