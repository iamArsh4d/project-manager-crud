<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;

        }
    </style>
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
                <div class="content-wrapper">
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

                    <script>
                        // Wait for the DOM to be ready
                        document.addEventListener('DOMContentLoaded', function () {
                            // Initialize the toast
                            var toastEl = document.getElementById('alert-toast');
                            var toast = new bootstrap.Toast(toastEl, { delay: 2000 }); // 2 seconds delay
                            toast.show();
                        });
                    </script>


                    <div class="div_center">
                        <h2 class="text-warning pt-40 h1">Add Category</h2>
                        <form action="{{url('/addCategory')}}" class="form" method="POST">
                            @csrf
                            <!-- <div class="mb-3 "> -->
                            <input type="text" class="text-dark" name="category" placeholder="Enter Category">
                            <input class="btn btn-outline-success mt-2" type="submit" name="submit"
                                value="Add Category"></input>
                            <!-- </div> -->

                        </form>
                    </div>
                    <table class="table table-stripped mx-auto border border-success mt-3">
                        <tr class="bg-dark text-white text-center">
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $data)
                            <tr class="text-center">
                                <td> {{$data->C_name}} </td>
                                <td>
                                    <a href="{{url('delete_category', $data->id)}}" class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.footer')
    <!-- container-scroller -->
    @include('admin.js')
    <!-- End custom js for this page -->
</body>

</html>