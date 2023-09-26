<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query)
    {
        $dataTables = datatables()->eloquent($query);
        $dataTables->addIndexColumn();
        $dataTables->addColumn('action', function ($row) {

                $action = '';
                
                $action .= '<a class="btn btn-info btn-sm m-2"    
                href="/admin/posts/' . $row->id . '/edit"><i class="fas fa-pencil-alt"></i>Edit</a>';
                                
                $action .= '<a class="btn btn-danger btn-sm"    
                href="/admin/posts/' . $row->id . '/delete"><i class="fas fa-trash">
                </i>Delete</a>';
            
                $action .= '<a class="btn btn-info btn-sm m-2"    
                href="/admin/posts/' . $row->id . '/view">View</a>';
                    
                return $action;
        })
        ->editColumn('created_at', function (Post $post) {
            return \Carbon\Carbon::parse($post->created_at )->isoFormat('DD-MM-YYYY');
        })
        ->editColumn('title', function (Post $post) {
            return ucfirst($post->title);
        });
        
            $dataTables->setRowId('id');
            $dataTables->rawColumns(['action']);
            return $dataTables;
    }

    /**
     * Get the query source of dataTable.
     */
    
    public function query(PostDataTable $model)
    {
        $model = Post::select('posts.*');

        if (request()->date) {
            $model->where('created_at', request()->date);
        }

        if (request()->category_id) {
            $model->whereIn('category_id', request()->category_id);
        }

        return $model;

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('post-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            'title',
            'created_at',
            'action',
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Post_' . date('YmdHis');
    }

}
