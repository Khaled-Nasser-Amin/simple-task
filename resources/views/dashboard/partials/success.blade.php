@if(session('success'))
    <script>
        $(function() {
            Swal.fire({
                'text': 'Thank You',
                'title': '{{session('success')}}',
                'type': 'success',
                'timer': 2500,
                showConfirmButton: false,
            })
           /* const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: 'success',
                title: '{__(\'text.deleted_successfully\')}}'
            });*/

        });
    </script>
@endif


