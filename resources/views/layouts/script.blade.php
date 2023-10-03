<!-- Javascript -->
<script src="{{ asset('dist/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('dist/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('dist/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('dist/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('dist/assets/bundles/c3.bundle.js') }}"></script>
<!-- page js file -->
<script src="{{ asset('dist/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success_message'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success_message') }}'
        });
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'error',
                title: 'Error!',
                html: '{{ $error }}'
            });
        </script>
    @endforeach
@endif

@if (Session::has('error_message_update_details'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('error_message_update_details') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif

@if (Session::has('error_message_not_found'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('error_message_not_found') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif

@if (Session::has('error_message_delete'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ Session::get('error_message_delete') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif

@if (Session::has('success_message_create'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ Session::get('success_message_create') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif

@if (Session::has('success_message_update'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ Session::get('success_message_update') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif

@if (Session::has('success_message_delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ Session::get('success_message_delete') }}",
            showConfirmButton: false,
            timer: 3000 // milliseconds
        });
    </script>
@endif
