@extends('pages.user.layouts.master')
@section('content')
    <div class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width-thumbnail"></th>
                                        <th class="width-name">Product</th>
                                        <th class="width-price"> Price</th>
                                        <th class="width-quantity">Quantity</th>
                                        <th class="width-subtotal">Subtotal</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Auth::user())
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img
                                                            src="{{ asset('storage/' . $item->product->image) }}"
                                                            alt=""></a>
                                                </td>
                                                <td class="product-name">
                                                    <h5><a href="product-details.html">{{ $item->product->name }}</a>
                                                    </h5>
                                                </td>
                                                <td class="product-cart-price"><span
                                                        class="amount">{{ number_format($item->product->price) }}</span>
                                                </td>
                                                <td class="cart-quality">
                                                    <div class="product-quality">
                                                        <input
                                                            class="cart-plus-minus-box input-text qty text form-control quantity"
                                                            name="quantity" data-id="{{ $item->id }}"
                                                            value="{{ number_format($item->quantity) }}">
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    {{ number_format($item->product->price * $item->quantity) }}
                                                </td>
                                                <td class="product-remove">
                                                    <form action="{{ route('cart.destroy', ['id' => $item->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">x</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Subtotal</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                {{ $subtotal }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update btn-hover">
                                    <a href="{{ route('categories') }}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear-wrap">
                                    <div class="cart-clear btn-hover">
                                        <a class="" href="{{ route('checkout.index') }}">CheckOut</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('script')
    <script>
        $(function() {
            $(document).on('input', '.quantity', function() {
                let id = $(this).data('id');
                let quantity = parseInt($(this).val());
                let subtotalElement = $(this).closest('tr').find(
                    '.product-total'); // Temukan elemen subtotal

                $.post(`{{ url('/cart/update') }}/${id}`, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'quantity': quantity
                }, function(data) {
                    // Jika pembaruan berhasil, perbarui elemen subtotal
                    location.reload();
                });
            });
        });
    </script>
@endpush
