<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ session('userInfo.name') . '`s Dashboard' }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('')}}">Dashboard</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="{{ route(session('user_role') . '.dashboard') }}">Dashboard</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-9">
      <div class="text-right">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-dropdown-link>
        </form>
      </div>
      <div class="well">
        <?php //echo '<pre>';print_r(session()->all());die; ?>
        <h4>Welcome {{session('userInfo.name')}}</h4>
        <p>{{ucfirst(session('user_role'))}}</p>
      </div>

      @if (session('userInfo.role_id') !== 3)
      <div class="row">
        <div class="col-sm-3">
            <a href="{{ route(session('user_role') . '.users') }}">
                <div class="well">
                    <h4>Users</h4>
                    <!-- <p>1 Million</p> -->
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{ route(session('user_role') . '.companies') }}">
                <div class="well">
                    <h4>Companies</h4>
                    <!-- <p>1 Million</p> -->
                </div>
            </a>
        </div>
        @endif
        <div class="col-sm-3">
          <a href="{{ route(session('user_role') . '.generated-urls') }}">
            <div class="well">
              <h4>Generated URLs</h4>
              <!-- <p>1 Million</p> -->
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
