@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Well done!
        </h4>
        <p>
            Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
            so
            that you can see how spacing within an alert works with this kind of content.

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    </div>
@endif
