<?php

namespace App\DataTables;
 
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleDataTable extends DataTable
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
            ->addColumn('action', function($item){
                $user = Auth()->user(); 
                $btn = '<a class="btn btn-xs btn-info" href="'.route('roles.show',$item->id).'">Show</a>';
               if($user->can('role-edit')){
                $btn .= '<a class="btn btn-xs btn-primary" href="'.route('roles.edit',$item->id).'">Edit</a>';   
            }        
                if($user->can('role-delete')){ 
                    $btn .=    '<form  action="'. route('roles.destroy',$item->id).'" method="POST" class="d-inline" >
                    '.csrf_field().' '.method_field("DELETE").' <button type="submit"  class="btn btn-xs btn-danger" 
                    onclick="return confirm(\'Do you need to delete this Location\');"> 
                    <i class="fa fa-trash-alt"></i></button>  
                    </form>';
                    }
                    return $btn;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RoleDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {    
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('roledatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
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
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(260)
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
        return 'Role_' . date('YmdHis');
    }
}
