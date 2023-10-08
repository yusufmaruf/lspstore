<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            @if (Auth::user())
                <ul>

                    @foreach ($cart as $item)
                        <li>
                            <div class="cart-img">
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt=""
                                    style="width: 98px; height: 112px">
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">{{ $item->product->name }}</a></h4>
                                <span> {{ $item->quantity }} × {{ number_format($item->product->price) }} </span>
                            </div>
                            <div class="cart-delete">
                                <script>
                                    console.log("{{ $item->id }}")
                                </script>
                                <form action="{{ route('cart.destroy', ['id' => $item->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">x</button>
                                </form>
                            </div>
                        </li>
                    @endforeach




                </ul>
                <div class="cart-total">
                    <h4>Subtotal: <span>{{ $subtotal }}</span></h4>
                </div>
                <div class="cart-btn btn-hover">
                    <a class="theme-color" href="{{ route('cart.index') }}">view cart</a>
                </div>
                <div class="checkout-btn btn-hover">
                    <a class="theme-color" href="{{ route('checkout.index') }}">checkout</a>
                </div>
            @endif
        </div>
    </div>
</div>
