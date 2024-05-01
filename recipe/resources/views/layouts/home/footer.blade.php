<!-- Remove the container if you want to extend the Footer to full width. -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<footer class="text-white text-center text-lg-start bg-dark">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">About company</h5>

                <p>
                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                    voluptatum deleniti atque corrupti.
                </p>

                <p>
                    Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                    molestias.
                </p>

                <div class="mt-4">
                    <!-- Facebook -->
                    <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
                    <!-- Dribbble -->
                    <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
                    <!-- Twitter -->
                    <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
                    <!-- Google + -->
                    <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
                    <!-- Linkedin -->
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 pb-1">Search something</h5>

                <div class="form-outline form-white mb-4">
                    <form action="{{ route('search') }}" method="GET" class="nav-search-form">
                        <input type="text" name="query" id="formControlLg" class="form-control form-control-lg" />
                        <button type="submit" class="btn btn-primary nav-search-button">
                            Search
                        </button>
                    </form>
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Subscribe to Newsletter</h5>

                <p>
                    Stay updated with our latest news and promotions by subscribing to our newsletter.
                </p>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                    @csrf
                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email" id="newsletterEmail" class="form-control form-control-lg"
                            placeholder="Your email address" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © @php echo date("Y") @endphp Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
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
