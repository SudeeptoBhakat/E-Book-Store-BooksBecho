<?php
    namespace App\Controllers;
    use App\Models\BookModel;
    use CodeIgniter\Controller;
    
    class BookController extends Controller {
        public function admin() {
            $model = new BookModel();
            $data['books'] = $model->findAll();
            return view('books/admin', $data);
        }
    
        public function create() {
            return view('books/create');
        }
    
        public function store()
        {
            $model = new BookModel();
            
            // Get form data
            $data = [
                'title'       => $this->request->getPost('title'),
                'author'      => $this->request->getPost('author'),
                'genre'       => $this->request->getPost('genre'),
                'price'       => $this->request->getPost('price'),
                'description' => $this->request->getPost('description'),
            ];
            
            // Handle file upload
            $file = $this->request->getFile('book_image');
            
            // Check if the file was uploaded
            if ($file->isValid() && !$file->hasMoved()) {
                // Set the new file name and move the file to the uploads folder
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                
                // Store the image file name in the database
                $data['image'] = $newName;
            }
            
            // Insert the data into the database
            $model->insert($data);
            
            // Redirect to the books list
            return redirect()->to('/admin');
        }
    
        public function edit($id) {
            $model = new BookModel();
            $data['book'] = $model->find($id);
        
            if (!$data['book']) {
                return redirect()->to('')->with('error', 'Book not found');
            }
        
            return view('books/edit', $data);
        }        
    
        public function update($id){
            $model = new BookModel();
            $book = $model->find($id);
        
            if (!$book) {
                return redirect()->to('/admin')->with('error', 'Book not found');
            }
        
            // Get form data
            $data = [
                'title'       => $this->request->getPost('title'),
                'author'      => $this->request->getPost('author'),
                'genre'       => $this->request->getPost('genre'),
                'price'       => $this->request->getPost('price'),
                'description' => $this->request->getPost('description'),
            ];
        
            // Handle image upload
            $file = $this->request->getFile('book_image');
            
            // Check if a new file is uploaded
            if ($file->isValid() && !$file->hasMoved()) {
                // Remove the old image if it exists
                if ($book['image'] && file_exists('uploads' . $book['image'])) {
                    unlink('uploads' . $book['image']);
                }
        
                // Move the new file to the uploads directory
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                $data['image'] = $newName;  // Update the image in the data array
            }
        
            // Update the book in the database
            $model->update($id, $data);
        
            // Redirect back to the books list with a success message
            return redirect()->to('/admin')->with('success', 'Book updated successfully');
        }
        
    
        public function delete($id)
        {
            $model = new BookModel();
            $book = $model->find($id);
        
            if (!$book) {
                return redirect()->to('')->with('error', 'Book not found');
            }
        
            // Delete the book image from the 'uploads' directory if it exists
            if ($book['image'] && file_exists('uploads/' . $book['image'])) {
                unlink('uploads/' . $book['image']);
            }
        
            // Delete the book from the database
            $model->delete($id);
        
            // Redirect to the books list with a success message
            return redirect()->to('/admin')->with('success', 'Book deleted successfully');
        }
        
    }  
?>