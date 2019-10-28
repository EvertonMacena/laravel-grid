<?php

namespace App\Http\Controllers;

use App\Category;
use App\Table\Table;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
            ->model(Category::class)
            ->columns([
                [
                    'label' => 'Nome',
                    'name' => 'name',
                    'order' => 'asc'
                ]
            ])
            ->filters([
                [
                    'name' => 'name',
                    'operator' => 'like',
                ],
                [
                    'name' => 'products.name',
                    'operator' => 'like'
                ]
            ])
            ->addEditAction('categories.edit')
            ->addDeleteAction('categories.destroy')
            ->paginate(6)
            ->search();

        return view('categories.index', [
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "exluir: ".$id;
    }
}
