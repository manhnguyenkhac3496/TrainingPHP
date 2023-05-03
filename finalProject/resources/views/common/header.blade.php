<style>
    .heading {
        width: 100%;
        height: 20%;
        background-color: #badbcc;
    }

    ul li {
        display: inline;
    }
    li {
        background-color: #babbbc;
        width: 30px;
        height: 20px;
    }
    .search {
        text-align: right;
    }

    .search form {
        display: flex;
        align-items: center;
    }

    .search input[type="text"] {
        border: none;
        padding: 8px;
        font-size: 16px;
        margin-right: 4px;
        border-radius: 4px;
    }

    .search button[type="submit"] {
        background-color: #fff;
        color: #333;
        border: none;
        padding: 8px 16px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

</style>

@section('header')
    <header>
        <nav class="heading"><a class="navbar-brand" href="#">TRAINING PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a></li>
                    <li><a class="nav-link" href="#">Introduce</a></li>
                    <li><a class="nav-link" href="#">Task</a></li>
                    <li><a class="nav-link" href="#">Menu</a></li>
                </ul>
            </div>
            <div class="search">
                <form>
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>
            </div>
        </nav>    <!-- ./ end of navbar -->
    </header>
@show
