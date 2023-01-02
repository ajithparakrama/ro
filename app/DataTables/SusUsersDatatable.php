<?php

namespace App\DataTables;
 
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SusUsersDatatable extends DataTable
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
            ->addColumn('roles',function($item){
                $res = '';
                foreach($item->getRoleNames() as $v){ 
                        $res .= '<label class="badge badge-success">'.$v.' </label>';
                        };
                        return $res;
            })
            ->addColumn('action', function ($users) { 
                $btn ='<a href="'.route('users.activate',$users->id).'" class="btn btn-xs btn-success" title="activate" data-toggle="tooltip"><i class="fa fa-undo"></i></a>';
                return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\usersDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->where('active','=',0)->newQuery()->with('Roles');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                 //       Button::make('export'),
                        Button::make('print'),
                     //   Button::make('reset'),
                        Button::make('reload')
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
            Column::make('name'), 
            Column::make('email'), 
            Column::make('roles'), 
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(160)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'users_' . date('YmdHis');
    }
}
