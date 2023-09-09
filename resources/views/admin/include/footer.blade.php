<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <a href="#">
            Devcoreweb
        </a>
    </div>
    <strong>
        Copyright &copy; {{ Carbon\Carbon::now()->format('Y') }}
        <a href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>.
    </strong>
    All rights reserved.
</footer>
