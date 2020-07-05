<aside class="menu">
    <p class="menu-label">
        CATEGORIES
    </p>
    <ul class="menu-list">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('frontend.product.by.category', $category) }}">
                    {{ $category->name }}
                    <span class="tag bd-mini-tag is-primary">{{ $category->products->count() }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</aside>