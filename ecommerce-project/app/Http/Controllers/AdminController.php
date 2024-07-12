<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use Barryvdh\DomPDF\Facade\Pdf;
use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{
    public function category()
    {

        return view('admin.category');
    }

    public function add_category(Request $request)
    {

        $category = new Category;

        $category->category = $request->category;

        $category->save();

        toastr()->closeButton()->info('category added successfully.');

        return redirect()->back();
    }


    public function animation()
    {
        return view('admin.animation');
    }

    public function allcategory()
    {
        $category = category::all();

        return view('admin.allcategory', compact('category'));
    }


    public function delete_data($id)
    {

        $category = category::findOrFail($id);


        $category->delete();


        return redirect()->back();
    }



    public function edit_data($id)
    {
        $category = Category::find($id);
        return view('admin.editcategory', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = category::findorFail($id);

        $category->category = $request->category;

        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    public function product()
    {
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function Add_product(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
        } else {
            // Handle file upload error if needed
            return redirect()->back()->with('error', 'Invalid file or file upload error.');
        }

        // Create a new instance of Product model
        $product = new Product;

        // Assign form input values to the Product model attributes
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->image = $imageName; // Assign the uploaded image filename

        // Save the Product model instance to the database
        $product->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully.');
    }


    public function show_product()
    {
        $product = product::paginate(5);
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {

        $product = product::findOrFail($id);

        $image_path = public_path('images/' . $product->image);
        if (fileExists($image_path)); {
            unlink($image_path);
        }


        $product->delete();

        toastr()->closeButton()->info('product deleted successfully.');
        return redirect()->back();
    }


    public function edit_product($id)
    {
        $product = product::findorFail($id);
        return view('admin.edit_product', compact('product'));
    }


    public function update_product(Request $request, $id)
    {
        // Validate form inputs


        try {
            // Find the product by ID or fail with 404 error
            $product = Product::findOrFail($id);

            // Handle image upload if a new image is provided
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete the previous image if it exists
                if ($product->image) {
                    $image_path = public_path('images') . '/' . $product->image;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }

                // Upload the new image
                $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images'), $imageName);
                $product->image = $imageName;
            }

            // Update product attributes
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category = $request->category;

            // Save the Product model instance to the database
            $product->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            // Handle any errors that occur during the update process
            return redirect()->back()->with('error', 'Failed to update product. ' . $e->getMessage());
        }
    }

    public function search_product(Request $request)
    {
        $search = $request->search;


        $product = Product::where('title', 'like', '%' . $search . '%')->paginate(3);

        return view('admin.show_product', compact('product'));
    }

    public function order(){

        $order=Order::all();
        return view('admin.orders',compact('order'));
    }


    public function on_the_way($id){

        $order=Order::find($id);

        $order->status='on the way';

        $order->save();

        return redirect()->back();
    }


    
    public function delivered($id){

        $order=Order::find($id);

        $order->status='delivered';

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id){
        $order=Order::find($id);
    $pdf = Pdf::loadView('admin.invoice',compact('order'));
    return $pdf->download('invoice.pdf');
    }
}
