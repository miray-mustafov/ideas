<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search By Comments</h5>
    </div>
    <div class="card-body">
        <form action="{{route('dashboard')}}" method="get">
            <input name="search" value='{{request('search','')}}' placeholder="..." class="form-control w-100" type="text">
            <button class="btn btn-dark mt-2"> Search</button>
        </form>
    </div>
</div>
