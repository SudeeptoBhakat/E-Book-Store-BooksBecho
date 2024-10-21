<?php namespace App\Controllers;

use App\Models\BookModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AddToCartController extends Controller
{
    public function showBooks()
    {
        $bookModel = new BookModel();
        $data['books'] = $bookModel->findAll();
        return view('books/index', $data);
    }

    public function addToCart($bookId)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please log in to add books to your cart.');
        }

        $userId = $session->get('user_id');
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        $cart = json_decode($user['cart'], true) ?? [];
        $bookModel = new BookModel();
        $book = $bookModel->find($bookId);

        if ($book) {
            if (!in_array($bookId, $cart)) {
                $cart[] = $bookId;
                $userModel->update($userId, ['cart' => json_encode($cart)]);
                return redirect()->to('/cart')->with('success', 'Book added to cart.');
            } else {
                return redirect()->to('/cart')->with('info', 'This book is already in your cart.');
            }
        } else {
            return redirect()->back()->with('error', 'Book not found.');
        }
    }

    public function viewCart()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please log in to view your cart.');
        }

        $userId = $session->get('user_id');
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        $cart = json_decode($user['cart'], true) ?? [];

        if (!empty($cart)) {
            $bookModel = new BookModel();
            $books = $bookModel->whereIn('id', $cart)->findAll();
        } else {
            $books = [];
        }

        return view('books/cart', ['books' => $books]);
    }

    public function removeFromCart($bookId)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please log in to remove books from your cart.');
        }

        $userId = $session->get('user_id');
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        $cart = json_decode($user['cart'], true) ?? [];

        if (($key = array_search($bookId, $cart)) !== false) {
            unset($cart[$key]);
            $userModel->update($userId, ['cart' => json_encode(array_values($cart))]);
            return redirect()->back()->with('success', 'Book removed from cart.');
        } else {
            return redirect()->back()->with('error', 'Book not found in cart.');
        }
    }

    public function submitOrder()
    {
        $session = session();
    
        // Check if the user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/user/login')->with('error', 'Please log in to view your cart.');
        }
    
        // Get the user ID and fetch the user data
        $userId = $session->get('user_id');
        $userModel = new UserModel();
        $user = $userModel->find($userId);
    
        // Decode the cart from the user's record
        $cart = json_decode($user['cart'], true) ?? [];
    
        // Initialize total amount and book details
        $totalAmount = 0;
        $bookDetails = [];
    
        if (!empty($cart)) {
            $bookModel = new BookModel();
    
            // Fetch details of each book in the cart
            foreach ($cart as $bookId) {
                $book = $bookModel->find($bookId);
    
                if ($book) {
                    $bookDetails[] = [
                        'name' => $book['title'],    // Book name
                        'author' => $book['author'], // Author name
                        'price' => $book['price'],  // Book price
                    ];
    
                    // Add to total amount
                    $totalAmount += $book['price'];
                }
            }
        }
    
        // Address details from the form
        $address = $this->request->getPost('address');
        $city = $this->request->getPost('city');
        $zipcode = $this->request->getPost('zipcode');
    
// Serialize the book details to store it as a string
$bookDetailsJson = json_encode($bookDetails);

// Redirect to payment page with book details and user info
return redirect()->to('/cart/payment')
    ->with('address', $address)
    ->with('city', $city)
    ->with('zipcode', $zipcode)
    ->with('total', $totalAmount)
    ->with('username', $session->get('username'))
    ->with('email', $session->get('email'))
    ->with('books', $bookDetailsJson); // Serialize book details

    }

    public function paymetView()
    {
        return view('books/payment');
    }

    public function aboutus()
    {
        return view('books/aboutus');
    }
}
?>