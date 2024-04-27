<!-- Remove the container if you want to extend the Footer to full width. -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function copyLink() {
        navigator.clipboard.writeText("Website Link");
        Swal.fire({
            icon: 'success',
            title: 'Link Copied!',
            text: 'Website link has been copied to your clipboard!',
            timer: 3000
        });
    }

    @if (session('subscribed'))
        Swal.fire({
            icon: 'success',
            title: 'Subscribed!',
            text: 'You have successfully subscribed to our newsletter!',
            timer: 3000
        });
    @endif

    @php
        $errorMessage = session('error_message');
    @endphp

    @if ($errorMessage)
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errorMessage }}'
        });
    @endif
</script>
<!-- End of .container -->
