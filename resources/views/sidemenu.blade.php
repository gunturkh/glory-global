<div class="gototop js-top">
    @foreach($products as $product)
    <a href="{{ url('search-kategori/'.$product->slug)}}" alt="{{$product->slug}}" title="{{$product->name}}">
        <i class="icon {{$product->icon}}"></i>
    </a>
    @endforeach
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
