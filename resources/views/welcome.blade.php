{!!Form::open(['url' => 'updateProduct', 'method' => 'POST', 'class' =>'form-horizontal'])!!}
        {{ csrf_field() }}

        <div class="form-group">
            {{Form::label('', 'Product Name')}}
            {{Form::text('product_name', '', ['placeholder' => 'Product Name','class' => 'form-control'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('', 'Product Price')}}
            {{Form::number('product_price', '', ['placeholder' => 'Price', 'class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('', 'Product description')}}
           
            {{Form::textarea('product_description', '', ['id'=> 'editor','placeholder' => 'Product description', 'class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::file('product_image')}}
        </div>

        {{Form::submit('Add Product', ['class' => 'btn btn-primary'])}}

{!!Form::close()!!}

<!-- Un commentaire test-->