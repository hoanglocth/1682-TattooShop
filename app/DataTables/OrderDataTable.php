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
            ->addColumn('user', function ($row) {
                return $row->user->email;
            })
            ->editColumn('price', function ($row) {
                return "$" . $row->price;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    return 'Waiting';
                }
                if ($row->status == 2) {
                    return 'Confirm';
                }
                if ($row->status == 3) {
                    return 'Finish';
                }
                if ($row->status == 4) {
                    return 'Cancel';
                }
            })
            ->addColumn('payment_status', function ($row) {
                if ($row->payment_status == 0) {
                    return 'Not pay';
                }
                if ($row->payment_status == 1) {
                    return 'Paypal paid';
                }
                if ($row->payment_status == 2) {
                    return 'Money cash';
                }
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<div class="btn-group" role="group" >';
                $actionBtn .= '<a href="' . route('admin.order.detail', $row->id) . '" class="my-1 btn btn-primary btn-sm mr-1">View</a>';
                if ($row->status == 1) {
                    $actionBtn .= '<a href="' . route('admin.order.confirm', $row->id) . '" class="my-1 btn btn-primary btn-sm mr-1">Confirm</a>';
                }
                if ($row->status == 2) {
                    $actionBtn .= '<a href="' . route('admin.order.finish', $row->id) . '" class="my-1 btn btn-success btn-sm mr-1">Finish</a>';
                }
                if ($row->status != 3 && $row->status != 4) {
                    $actionBtn .= '<a href="' . route('admin.order.cancel', $row->id) . '" class="my-1 btn btn-danger btn-sm mr-1">Cancel</a>';
                }
                $actionBtn .= '</div>';

                return $actionBtn;
            })
            ->rawColumns(['action', 'price'])
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
            Column::make('user'),
            Column::make('date_booking'),
            Column::make('price'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('status'),
            Column::computed('payment_status'),
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