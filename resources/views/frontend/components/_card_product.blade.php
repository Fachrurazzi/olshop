<div class="column is-2">
    <div class="card">
        <div class="card-image">
            <figure class="image is-2by3">
            <img src="{{ $product->getImage() }}" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-content">
                    <p class="title is-6"><a href="{{ route('frontend.product.show', $product) }}">{{ $product->name }}</a></p>
                </div>
            </div>

            <div class="content">
                <p class="has-text-danger">{{ $product->getPrice() }}</p>
                <a href="{{ route('cart.add.item', $product) }}" class="button is-primary">Add to Cart</a>
            </div>
        </div>
    </div>
</div>