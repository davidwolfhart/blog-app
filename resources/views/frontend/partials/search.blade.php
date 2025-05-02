<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search post" id="search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit"><i
                            class="bi bi-search me-1"></i>Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
