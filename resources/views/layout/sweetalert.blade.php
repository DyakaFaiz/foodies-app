<script>
    @if(session('success'))
        Swal.fire({
            toast: true,
            icon: 'success',
            title: '{{ session('success') }}',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                title: 'swal-title-lg'
            }
        });
    @elseif(session('error'))
        Swal.fire({
            toast: true,
            icon: 'error',
            title: '{{ session('error') }}',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                title: 'swal-title-lg'
            }
        });
    @endif
</script>

<style>
    .swal-title-lg {
        font-size: 1.25rem !important; /* atau 20px */
        font-weight: 600;
    }
</style>
