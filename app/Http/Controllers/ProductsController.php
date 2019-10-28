<?php

namespace App\Http\Controllers;

use App\Product;
use App\Table\Table;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $table;
    /**
     * CategoriesController constructor.
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->table
            ->model(Product::class)
            ->columns([
                [
                    'label' => 'Nome',
                    'name' => 'name',
                    'order' => 'asc'
                ],
                [
                    'label' => 'Estoque',
                    'name' => 'stock',
                    'order' => 'asc'
                ]
            ])
            ->filters([
                [
                    'name' => 'name',
                    'operator' => 'like',
                ],
                [
                    'name' => 'categories.name',
                    'operator' => 'like'
                ]
            ])
            ->addEditAction('categories.edit')
            ->addDeleteAction('categories.destroy')
            ->paginate(6)
            ->search();

        return view('products.index', [
            'table' => $this->table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
