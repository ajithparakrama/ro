<?php

namespace App\DataTables;

use App\Models\Point;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class newPointsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn() 
            ->addColumn('status',function($item){
                switch($item->status){
                    case(10):      return '  <span class="badge badge-warning">Pending</span>';                  break;
                    case(5): return '<span class="badge badge-danger">Cancel</span>'; break;
                    case(1): return '<span class="badge badge-success">Approved</span>'; break;
                    default: return ''; break;
                }

            })
            ->addColumn('action', function($item){
                return ' <a href="'.route('points.show',$item->id).'" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>';
            })
            ->rawColumns(['action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\newPoint $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Point $model)
    {
      //  $points = point::where()->paginate(20); 
        return $model->SELECT('users.name','points.*')->where('status','=','10')->with('user')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('newpoints-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                   //     Button::make('create'),
                   //     Button::make('export'),
                        Button::make('print'),
                  //      Button::make('reset'),
                  //      Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            Column::make('user.name')->title('Member'),
            Column::make('event'),
            Column::make('event_date'),            
            Column::make('point'),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(120)
            ->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'newPoints_' . date('YmdHis');
    }
}
