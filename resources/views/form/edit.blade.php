@if(Session::has('success'))

  <div class="alert alert-success">
  {{ Session::get('success') }}
  {{ Session::forget('success') }}
 </div>


@endif

<form class="row g-3" action= "{{url('/courses/{{$product->id}}/update')}}" method ="POST">

@csrf

<!-- JAI CONFIANCE -->

  <div class="col-12">
    <label for="product_name" class="form-label" >Product Name</label>
    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="" value='{{$product->product_name}}'>
  </div>

  <br/> <br/>

  <div class="col-12">
    <label for="product_price" class="form-label">Product price</label>
    <input type="text" name="product_price" class="form-control" id="product_price" placeholder="" value='{{$product->product_price}}'>
  </div>
  <br/> <br/>

  <div class="col-12">
  <label for="product_description" class="form-label">Product Description</label>
  <textarea name="product_description"  value='' class="form-control" id="product_description" rows="3">
  {{$product->product_description}}
  </textarea>
</div>

  <br/> <br/>
 
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Update product</button>
  </div>
</form>