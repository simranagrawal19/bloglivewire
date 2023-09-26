<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>


</head>
<style>
    .caret {
        display: none !important;
    }

    .dropdown-toggle {
        width: 19rem;

    }

    .dropdown-menu {
        width: 19rem;

    }

    .btn-primary {
        width: 12rem;

    }
</style>

<body>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"
        style="margin:26px;border-bottom:1px solid rgba(0,0,0,.5); margin-left:18rem; padding:12px; color:rgba(0,0,0,.5);justify-content:space-between; padding-top:1rem;">

        <ul class="navbar-nav" style="padding-right:68rem">

            <li class="nav-item d-none d-sm-inline-block" style="margin-right:12px">
                @auth
                    <a href="/" class="nav-link">Welcome {{ auth()->user()->name }}</a>

                    @if (auth()->user()->can('admin'))
                <li class="nav-item d-none d-sm-inline-block" style="margin-right:12px">
                    <a href="/admin/posts/create" class="nav-link">New post</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block" style="margin-right:12px">
                    <a href="/admin/posts" class="nav-link">Dashboard</a>
                </li>
                @endif
                </li>

                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6"
                    style="padding-top:1rem">
                    @csrf
                    <li class="nav-item d-none d-sm-inline-block">
                        <button type="submit" class="nav-link">Log Out</button>
                    </li>
                </form>
            @else
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/register" class="nav-link">Register</a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/login" class="nav-link">Login</a>
                </li>
            @endauth

        </ul>
    </nav>


    <div class="container">

        <form action="/admin/posts" method="GET">

            <div class="row pb-3">
                <div class="col-md-3">
                    <label for="">Filter by Date</label>
                    <input type="date" name="date" id=""
                        value={{ Request::get('date') ?? date('Y-m-d') }} class="form-control">
                </div>

                <div class="col-md-3">
                    <label for="">Filter by Category</label><br>
                    <select type="checkbox" name="category_id[]" id="multiple-checkboxes"
                        class="form-control selectpicker" multiple data-live-search="true">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-1 pt-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered data-table" id="records">
            <tbody>

                {!! $dataTable->table() !!}

            </tbody>

        </table>
    </div>

    {!! $dataTable->scripts() !!}

</body>

</html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script>
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });
</script>
