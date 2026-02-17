<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{env('APP_ROOT')}}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content product-category">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="row category-section">
                    @foreach ($categories as $category)
                        <div class="col-sm-3 text-center">
                            <!-- <a href="{{env('APP_ROOT')}}sub-category-component"><img src="{{env('APP_ROOT')}}assets/images/bellissima.jpg" alt="roses" class="waves-effect waves-light category-img"></a> -->
                            <a href="{{env('APP_ROOT')}}sub-category-component/{{$category->name}}">
                                <img src="{{ asset('storage'.env('IMG_STORAGE').$category->picUrl) }}" alt="{{ $category->name }}" class="waves-effect waves-light category-img">
                            </a>
                            <!-- <div>{{ $category->name }}</div> -->

                            <img src="{{ asset('storage'.env('IMG_STORAGE').$category->nameUrl) }}" class="waves-effect waves-light categoty-name">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
