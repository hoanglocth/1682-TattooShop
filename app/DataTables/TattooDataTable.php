<?php

namespace App\DataTables;

use App\Models\Tattoo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TattooDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('img', function ($image) {
                return '<img src=' . $image->img . ' border="0" width="100" class="img-rounded" align="center" />';
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="btn-group" role="group" >                
                <a href="' . route('admin.tattoo.edit', $row->id) . '" class="edit btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>
                <a href="' . route('admin.tattoo.remove', $row->id) . '" class="delete btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>
                </div>';
                return $actionBtn;
            })
            ->addColumn('category', function ($row) {
                return $row->category->name;
            })
            ->addColumn('artist', function ($row) {
                return $row->artists->name;
            })
            ->rawColumns(['action', 'img'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tattoo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tattoo $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tattoo-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('img'),
            Column::make('name'),
            Column::make('price'),
            Column::make('describes'),
            Column::make('category'),
            Column::make('artist'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Tattoo_' . date('YmdHis');
    }
}