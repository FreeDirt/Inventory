<div class="jumbotron">
    <div class="container">
        <h1>Welcome to our Dashboard</h1>

        <div id="clock">
            <div class="clock__hands">
            <div class="clock__hand clock__hand--hour" id="hh"></div>
            <div class="clock__hand clock__hand--minute" id="mh"></div>
            <div class="clock__hand clock__hand--second" id="sh"></div>
            </div>
            <div id="meridiem"></div>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
        <p class="lead">This is just a sample text for the dashboard text</p>
    </div>
</div>