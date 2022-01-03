<div class="modal fade" id="view-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title product-name"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="btn p-1" style="background: red;color:#fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-3">
             	<div class="images">
                <img src="" style="width: 100%" class="image">
              </div>
       		</div>
       		<div class="col-md-3">
     			  <ul class="list-group">
              <li class="list-group-item">Price : ৳<span class="text-danger discount-price-modal" style="background: red; border-radius:5px; padding:3px; margin:5px 10px; color: #fff;"></span><span id="price" class="price"></span></li>
              <li class="list-group-item">Category : <span class="category"></span></li>
              <li class="list-group-item">Brand : <span class="brand"></span></li>
              <li class="list-group-item">Product Code : <span class="code"></span></li>
              <li class="list-group-item">Stock : <span class="stock"></span></li>
            </ul>
       		</div>
       		<div class="col-md-2">
             
                <div class="form-group color-group">
                  <label for="color"> Select Color:</label>
                  <select name="color" id="color" class="form-control color" style="margin:10px 0;"></select>
                </div>
                <div class="form-group size-group">
                  <label for="size"> Select Size:</label>
                    <select name="size" id="size" class="form-control size" style="margin:10px 0;"></select>
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-label label-quantity">Quantity:
                    </label>
                    <input type="number" class="form-control quantity" value="1" id="quantity" min="1" name="quantity">
                </div>
                <div class="form-group">
                  <input type="hidden" class="product-id" name="product_id" value="" id="product-id">
                  <button type="submit" class="btn btn-danger product-cart-btn btn-block" onclick="addToCart()">Add To Cart</button>
                </div>
              
       		</div>
       	</div>
       </div>
      </div>
    </div>
  </div>
</div>

