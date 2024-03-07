<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Address;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\DeliveryType;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Cart extends StandardController
{
    public function add(Request $request)
    {

        try {
            DB::beginTransaction();
            $user = Auth::user();

            $userCartDatabase = $user->unfinishedOrder()->bookOrders;

            $userCartCookie =  json_decode($request->cookie('cart'));
            $userCartDatabase = iterator_to_array($userCartDatabase);

            $cookieCartIds = array_column($userCartCookie, "id");
            $databaseCartIds = array_column($userCartDatabase, "book_id");
            $itemsToDelete = array_diff($databaseCartIds, $cookieCartIds);

            BookOrder::deleteBookOrder($user->unfinishedOrder(), $itemsToDelete);

            $itemsToInsertIds = array_diff($cookieCartIds,$databaseCartIds);

            $booksToInsert = [];
            foreach ($userCartCookie as $book) {
                if (in_array($book->id, $itemsToInsertIds)) {
                    $booksToInsert[] = ['book'=>Book::find($book->id), 'quantity'=>$book->quantity];
                }
            }
            BookOrder::insertBooksIntoCart($user->unfinishedOrder()['id'],$booksToInsert);

            $itemsToUpdateIds = array_intersect($cookieCartIds,$databaseCartIds);

            $booksToUpdate = [];
            foreach ($userCartCookie as $book) {
                if (in_array($book->id, $itemsToUpdateIds)) {
                    $booksToUpdate[] = ['book'=>Book::find($book->id), 'quantity'=>$book->quantity];
                }
            }

            BookOrder::updateBooksInsideCart($user->unfinishedOrder()['id'],$booksToUpdate);

            $totalAmount = (BookOrder::getTotalAmount($user->unfinishedOrder()['id']) == null ? '0.00' : BookOrder::getTotalAmount($user->unfinishedOrder()['id']));

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['success' => true,'message' => 'Cart updated successfully!', 'totalAmount' => $totalAmount]);
    }

    public function checkout(Request $request){

        $user = Auth::user();
        $this->data['cart'] = $user->unfinishedOrder();
        $this->data['total_amount'] = (BookOrder::getTotalAmount($user->unfinishedOrder()['id']) == null ? '0.00' : BookOrder::getTotalAmount($user->unfinishedOrder()['id']));
        $this->data['delivery_types'] = DeliveryType::all();

        $addressName = "";
        $addressNumber = "";
        $city = "";
        $state = "";
        $zipCode = "";
        $country = "";
        if(isset($user->address)){
            $addressName = $user->address['address_name'];
            $addressNumber = $user->address['address_number'];
            $city = $user->address['city'];
            $state = $user->address['state'];
            $zipCode = $user->address['zip_code'];
            $country = $user->address['country'];
        }

        $this->data['addressInformation'] = ['address_name' => $addressName, 'address_number' => $addressNumber, 'city' => $city, 'state' => $state, 'zip_code'=>$zipCode,'country'=>$country];

        return view('pages.checkout' , ['data' => $this->data]);
    }

    public function submit(CheckoutRequest $request){
        try {

            DB::beginTransaction();
            $user = Auth::user();

            $order = $user->unfinishedOrder();

            $address = Address::firstOrCreateAddress($request->input('address-line-input'), $request->input('number-input'), $request->input('city-input'), $request->input('state-input'), $request->input('zip-code-input'), $request->input('country-input'));

            $totalAmount = (BookOrder::getTotalAmount($user->unfinishedOrder()['id']) == null ? '0.00' : BookOrder::getTotalAmount($user->unfinishedOrder()['id']));
            $order->updateOrder($totalAmount, $address['id'], $request->input('delivery-input'));

            $cartData = [];
            $cookie = cookie('cart', json_encode($cartData), 120,null,null,null,false);

            Order::createOrderForAUser($user);

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error-msg', 'An error has occurred, please try again later.');
        }

        return back()->with('success-msg', "Congratulations! Your checkout form has been successfully submitted. Thank you for your order!")->withCookie($cookie);
    }
}
