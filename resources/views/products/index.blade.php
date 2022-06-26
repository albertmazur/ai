@extends('layouts.app')

@section('content')
<div class="container">
    @include('helpers.flash-messages')
    <div class="row">
        <div class="col-6">
            <h1><i class="fas fa-clipboard-list"></i> {{ __('shop.product.index_title') }}</h1>
        </div>
        <div class="col-6">
            <a class="float-right" href="{{ route('products.create') }}">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
            </a>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('shop.product.fields.name') }}</th>
                <th scope="col">{{ __('shop.product.fields.description') }}</th>
                <th scope="col">{{ __('shop.product.fields.amount') }}</th>
                <th scope="col">{{ __('shop.product.fields.price') }}</th>
                <th scope="col">{{ __('shop.product.fields.category') }}</th>
                <th scope="col">{{ __('shop.columns.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }}</td>
                    <td>@if($product->hasCategory()){{ $product->category->name }}@endif</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">
                            <button class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
                        </a>
                        <a href="{{ route('products.edit', $product->id) }}">
                            <button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    <div>
        <form class="mt-5 row-md-4 order-md-1 row-lg-3 sidebar-filter2" action="{{route("products.index")}}">
            <h6 class="text-uppercase font-weight-bold mb-3">{{ __('shop.welcome.categories') }}</h6>
            @foreach($categories as $category)
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="filter[categories][]" id="category-{{ $category->id }}" value="{{ $category->id }}">
                        <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                </div>
            @endforeach
            <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
            <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">{{ __('shop.welcome.price') }}</h6>
            <div class="price-filter-control">
                <input type="number" class="form-control w-50 pull-left mb-2" placeholder="50" name="filter[price_min]" id="price-min-control">
                <input type="number" class="form-control w-50 pull-right" placeholder="150" name="filter[price_max]" id="price-max-control">
            </div>
            <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
            <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
            <button class="btn btn-lg btn-block btn-primary mt-5" id="filter-button2"><i class="fas fa-search"></i> {{ __('shop.welcome.filter') }}</button>
        </form>
    </div>
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('products') }}/";
    const confirmDelete = "{{ __('shop.messages.delete_confirm') }}";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
