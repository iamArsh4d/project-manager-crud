<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <!-- main-panel ends -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container text-center mb-3">
                        <h1 class="text-warning h1">Add Products</h1>

                        <!-- Form Start -->
                        <form class="mx-auto" style="max-width: 500px;" action="{{url('/saveProduct')}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Product Title</label>
                                <input type="text" name="title" placeholder="Write a Title for Product"
                                    class="form-control bg-dark text-light" Required="">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Product Description</label>
                                <input type="text" name="description" placeholder="Write a Description for Product"
                                    class="form-control bg-dark text-light" Required="">
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Product Quantity</label>
                                <input type="number" name="quantity" placeholder="Write a quantity for Product" min="0"
                                    class="form-control bg-dark text-light" Required="">
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Product Category</label>
                                <select name="category" required class="form-control bg-dark text-light">
                                    <option value="" selected>Add a category</option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->C_name }}">{{ $category->C_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Product Price</label>
                                <input type="number" name="price" placeholder="Write a Price for Product"
                                    class="form-control bg-dark text-light" Required="">
                            </div>

                            <div class="mb-3">
                                <label for="d_price" class="form-label">Discount Price</label>
                                <input type="number" name="d_price" placeholder="Write a Discount Price for Product"
                                    class="form-control bg-dark text-light">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" placeholder="Select Image for Product"
                                    class="form-control bg-dark text-light">
                            </div>

                            <button type="submit" class="btn btn-warning mt-3">Add Product</button>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>

        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
    <!-- End custom js for this page -->
</body>

</html>