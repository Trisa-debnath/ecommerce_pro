@extends('admin.dashboard')

@section('title', 'Create product')

@section('admin_layout')
      <div class="message">
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
        <div class="message-success">
       @if(session('success'))
       <h3 class="mb-4">{{session('success')}}</h3>
        @endif
        </div>
        <!-- seller product Form -->
        <div class="row">
						<div class="col-12 col-lg-8  ">
							<div class="card shadow-lg">
								<div class="card-header bg-primary text-bg-white"
                          >
									<h5 class=" card-title mb-2 ">Add product</h5>
								</div>
                                
      <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label>Category</label>
    <select name="category_id" id="category" class="form-control">
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
   <!-- <div class="form-group">
    <label>Subcategory</label>
    <select name="subcategory_id" id="subcategory" class="form-control">
        <option value="">Select Subcategory</option>
        @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
        @endforeach
    </select>
</div> -->
<div class="form-group">
    <label>Subcategory</label>
    <select name="subcategory_id" id="subcategory" class="form-control">
        <option value="">Select Category First</option>
        </select>
</div>

            <!--  product name -->
            <div class="mb-3" >
                <label for="name" class="form-label fw-bold text-dark" >Give name of your Product</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="add product name" >
            </div> 
<!--  description -->
             <div class="mb-3" >
                <label for="description" class="form-label fw-bold text-dark" >Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
              <!--  Images -->
                  <div class="mb-3" >
                <label for="image" class="form-label fw-bold text-dark" >Uplode your Product Images</label>
                <input type="file" name="image" multiple>
            </div>
            <!--  slug -->
             <div class="mb-3" >
                <label for="slug" class="form-label fw-bold text-dark" >Slug</label>
                <input type="text" name="slug" id="slug" class="form-control"  placeholder="sumM12" >
            </div>
              <!-- 	status  -->
               <div class="mb-3" >
                <label for="status" class="form-label fw-bold text-dark" >Slug</label>
                <select name="status" class="form-control mb-2">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
     </div>
           
   <!-- 	regular_price  -->
<div class="mb-3" >
                <label for="price" class="form-label fw-bold text-dark" >Product Regular Price</label>
                <input type="number" name="price" id="price" class="form-control"  >
            </div> 
             <!-- 	discounted_percent -->
<div class="mb-3">
    <label for="discount_price" class="form-label fw-bold text-dark">Discount Percent (if any)</label>
    <input type="number" name="discount_price" id="discount_percent" class="form-control" min="0" max="100">
</div>

             <!-- 	stock_quantity  -->
              <div class="mb-3" >
                <label for="quantity" class="form-label fw-bold text-dark" >Satock Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control"  >
            </div>
          
               <!-- Category & Subcategory 
                <div class="mb-3">
         <livewire:category-subcategory/>
                </div>-->
              <div class="text-end">
                    <button type="submit" class="btn btn-success w-100 px-4">Add Product</button>
                </div>
        </form>
       </div>
    </div>




    <input type="file" name="image" class="form-control mb-2">

    <select name="status" class="form-control mb-2">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>

    <button class="btn btn-primary">Create Product</button>
</form>



       </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/admin/get-subcategories/' + categoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').empty();
            }
        });
    });
</script>



@endsection