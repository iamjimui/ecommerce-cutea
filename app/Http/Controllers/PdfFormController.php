<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfFormController extends Controller
{   
    public function show(){
        return view('pdf/generatePdf');
    }

    public function getForm()
    {
        return view('my.form');
    }

    public function postForm(Request $request)
    {
        $array = array();

        $command = $request->get('command');
        $created_at = $request->get('created_at');
        $product_name = $request->get('product_name');
        $product_price = $request->get('product_price');
        $quantity = $request->get('quantity');
        $product_sizes_name = $request->get('product_sizes_name');
        $product_sizes_price = $request->get('product_sizes_price');
        $toppings_name = $request->get('toppings_name');
        $toppings_price = $request->get('toppings_price');
        $sugar_quantity = $request->get('sugar_quantity');
        $bbt_price = $request->get('bbt_price');

        $max = count($request->product_name);

        for ($x = 0; $x < $max; $x ++){
            $array[$x]['product_name']= $product_name[$x];
            $array[$x]['product_price']= $product_price[$x];
            $array[$x]['quantity'] = $quantity[$x];
            $array[$x]['product_sizes_name'] = $product_sizes_name[$x];
            $array[$x]['product_sizes_price'] = $product_sizes_price[$x];
            $array[$x]['toppings_name'] = $toppings_name[$x];
            $array[$x]['toppings_price'] = $toppings_price[$x];
            $array[$x]['sugar_quantity'] = $sugar_quantity[$x];
            $array[$x]['bbt_price'] = $bbt_price[$x];
        }

        $pdf = PDF::loadView('pdf/generatePdf', [
            'command' => $command,
            'created_at' => $created_at,
            'total_price' => $request->total_price,
            'array' => $array,
        ]);
        return $pdf->download('signed_form.pdf');
    }
}
