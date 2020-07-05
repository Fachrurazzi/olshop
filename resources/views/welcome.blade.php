@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-2">
            <aside class="menu">
                <p class="menu-label">
                    CATEGORIES
                </p>
                <ul class="menu-list">
                    <li><a href="">Category 1</a></li>
                    <li><a href="">Category 2</a></li>
                    <li><a href="">Category 3</a></li>
                </ul>
            </aside>
        </div>
        <div class="column is-10">
            <div class="columns is-multiline">
                @for ($i = 1; $i <= 12; $i++)
                    <div class="column is-2">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by5">
                                    <img src="https://bulma.io/images/placeholders/480x600.png" alt="">
                                </figure>
                            </div>

                            <div class="card-content">
                                <div class="content">
                                    Lorem ipsum dolor sit amet.
                                </div>

                                <a href="" class="button is-primary">
                                    <span class="icon is-small">
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                    <span>Add to Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection