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
            <div class="main-panel">
                <div class="content-wrapper table-responsive">
                    @if(session()->has('message'))
                        <div class="toast-container position-fixed bottom-0 end-0 p-3">
                            <div class="toast align-items-center text-white bg-success border-0" role="alert"
                                aria-live="assertive" aria-atomic="true" id="alert-toast">
                                <div class="d-flex">
                                    <div class="toast-body">
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <table class="table table-hover table-dark text-white">
                        <tr class="bg-warning text-center">
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount Price</th>
                            <th scope="col">Update</th>
                            <th scope="col">Remove</th>
                        </tr>
                        @foreach ($product as $product)

                            <tr class="text-center">
                                <!-- <td>1</td> -->
                                <td>{{$product->title}}</td>
                                <!-- <td>
                                                                                                            <img "/product/{{$product->image}}">
                                                                                                        </td> -->
                                <td>
                                    <img src="/product/{{$product->image}}" alt="Product Image"
                                        style="width: 100px; height: auto;">
                                </td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount_price}}</td>
                                <td> <a href="{{url('update_product', $product->id)}}"
                                        class="btn btn-outline-info">Update</a>
                                </td>
                                <td> <a href="{{url('remove_product', $product->id)}}" class="btn btn-outline-danger"
                                        onclick="return confirm('You want to Remove')">Remove</a></td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.js')
    <!-- End custom js for this page -->
</body>

</html>