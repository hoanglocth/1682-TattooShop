<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->addColumn('status', function($row){
                if($row->status == 1){
                return 'Waiting';
                }
                if($row->status == 2){
                    return 'Confirm';
                }
                if($row->status == 3){
                    return 'Finish';
                }
                if($row->status == 3){
                    return 'Cancel';
                }
            })
            ->addColumn('action', function($row){
                $actionBtn = '';
                if($row->status == 1){
                    $actionBtn .= '<div class="btn-group" role="group" >                
                    <a href="'. route('admin.order.confirm', $row->id) .'" class="edit btn btn-primary btn-sm mr-1">Confirm</a>
                    </div>';
                }
                if($row->status == 2){
                    $actionBtn .= '<div class="btn-group" role="group" >                
                    <a href="'. route('admin.order.finish', $row->id) .'" class="edit btn btn-primary btn-sm mr-1">Finish</a>
                    </div>';
                }
                if($row->status != 3){
                    $actionBtn .= '<div class="btn-group" role="group" >                
                    <a href="'. route('admin.order.cancel', $row->id) .'" class="edit btn btn-primary btn-sm mr-1">Cancel</a>
                    </div>';
                }
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model): QueryBuilder
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
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('price'),
            Column::make('date_booking'),
            Column::make('user_id'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('status'),
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
        return 'Order_' . date('YmdHis');
    }
}
