@extends('layouts.userLayout')

@section('head')
    <x-fixed.head
        description="test description"
        keywords="test keywords"
        title="Home"
    />
@endsection

@section('mainContent')

    <section id="cart-items" class="wrapper">


        <x-table.table  tableBodyId="tbody-checkout" :columnTitles="['Image', 'Title', 'Unit Price', 'Quantity', 'Price', 'Remove']" >
            @foreach($data['cart']->orderBooks() as $item)
                <x-table.checkout-row :item="$item" />
            @endforeach
        </x-table.table>


    <div id="empty" @if(!empty($data['cart']->orderBooks()))style="display:none" @endif>
        <p>The Cart Is Empty</p>
    </div>

    <div id="total-price-container">
        <p id="total-price">Total: ${{$data['total_amount']}}</p>
    </div>
    </section>

    <section class="sign-up-container wrapper" id="sign-up-form">

        <form id="delivery-form"  method="post" name="delivery-form" onsubmit="sendCheckoutData()" action="{{route('cart.submit')}}">
            @csrf
            @method('PUT')
            <h2>Address info</h2>

            <div id="checkout-address-container"  class="info-container-grid address-info-container-grid">

                <x-form.input
                    for="address-line-input-js"
                    idLabel="address-line-title"
                    classLabel="input-title"
                    label="Address line"
                    inputType="text"
                    inputName="address-line-input"
                    inputValue="{{old('address-line-input') != null ? old('address-line-input') : $data['addressInformation']['address_name']}}"
                    idInput="address-line-input-js"
                    classInput="address-line-input"
                    idError="address-line-error"
                    error="Please enter a valid address line."
                />

                <x-form.input
                    for="number-input-js"
                    idLabel="number-title"
                    classLabel="input-title"
                    label="Number"
                    inputType="text"
                    inputName="number-input"
                    inputValue="{{old('number-input') != null ? old('address-number-input') : $data['addressInformation']['address_number']}}"
                    idInput="number-input-js"
                    classInput="number-input"
                    idError="number-error"
                    error="Please enter a valid address number."
                />


                <x-form.select
                    for="delivery-input"
                    idLabel="delivery-title"
                    classLabel="input-title"
                    label="Delivery option"
                    selectName="delivery-input"
                    selectId="delivery-input"
                    selectClass=""
                    idError="delivery-error"
                    error="Please enter a valid delivery type option."
                >
                    @foreach($data['delivery_types'] as $deliveryType)
                        <option value="{{$deliveryType['id']}}" @if(old('delivery-input')==$deliveryType['id']){{'selected'}}@endif >{{$deliveryType['name']}}</option>
                    @endforeach
                </x-form.select>

                <x-form.input
                    for="city-input-js"
                    idLabel="city-title"
                    classLabel="input-title"
                    label="City"
                    inputType="text"
                    inputName="city-input"
                    inputValue="{{old('city-input') != null ? old('city-input') : $data['addressInformation']['city']}}"
                    idInput="city-input-js"
                    classInput="city-input"
                    idError="city-error"
                    error="Incorrect format (ex.  Los Angeles)"
                />

                <x-form.input
                    for="state-input-js"
                    idLabel="state-title"
                    classLabel="input-title"
                    label="State"
                    inputType="text"
                    inputName="state-input"
                    inputValue="{{old('state-input') != null ? old('state-input') : $data['addressInformation']['state']}}"
                    idInput="state-input-js"
                    classInput="state-input"
                    idError="state-error"
                    error="Incorrect format (ex.  California)"
                />

                <x-form.input
                    for="zip-code-input-js"
                    idLabel="zip-code-title"
                    classLabel="input-title"
                    label="Zip-code"
                    inputType="text"
                    inputName="zip-code-input"
                    inputValue="{{old('zip-code-input') != null ? old('zip-code-input') : $data['addressInformation']['zip_code']}}"
                    idInput="zip-code-input-js"
                    classInput="zip-code-input"
                    idError="zip-code-error"
                    error="Incorrect format (ex.  90001)"
                />

                <x-form.input
                    for="country-input-js"
                    idLabel="country-title"
                    classLabel="input-title"
                    label="Country"
                    inputType="text"
                    inputName="country-input"
                    inputValue="{{old('country-input') != null ? old('country-input') : $data['addressInformation']['country']}}"
                    idInput="country-input-js"
                    classInput="country-input"
                    idError="country-error"
                    error="Incorrect format (ex.  United States)"
                />
            </div>

            <div class="server-messages">
                @if($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><p class="error-message">{{ $error }}</p></li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success-msg'))
                    <p class="success-message">
                        {{ session('success-msg') }}
                    </p>
                @endif
            </div>

            <input type="submit" id="create-account-button" class="checkout-button" value="Submit">

        </form>
    </section>


@endsection
