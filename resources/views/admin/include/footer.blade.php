<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <a href="#">
            <b>Version</b> 1.0.0
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
