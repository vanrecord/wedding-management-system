<?php
namespace App\DataTables;
 
use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
 
class UserInfosDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->setRowId('id')
        ->addColumn('action', function ($row) {
            if( !empty(auth()->user()) ) {
                $editUrl = route('userinfo.edit', $row->id);
                $deleteUrl = route('userinfo.destroy', $row->id);

                return view('UserInfo/datatables_actions', compact('editUrl', 'deleteUrl', 'row'));
            }
            
        });
    }
    public function query(UserInfo $model): QueryBuilder
    {
        return $model->newQuery();
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    // ->minifiedAjax()
                    ->minifiedAjax(route('userinfo.index'))
                    ->orderBy(1)
                    // ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ]);
    }
 
    public function getColumns(): array
    {
        $columns =  [
            Column::make('code')
            ->addClass('text-center'),
            Column::make('name')
            ->addClass('text-center'),
            Column::make('go_with')
            ->addClass('text-center'),
            Column::make('address')
            ->addClass('text-center'),
            Column::make('reil')
            ->orderable(false)
            ->addClass('text-center'),
            Column::make('usd')
            ->orderable(false)
            ->exportable(false)
            ->printable(false)
            ->width(120)
            ->addClass('text-center'),
        ];
        if( !empty(auth()->user()) ) {
            $columns[] = Column::computed('action');
        }
        return $columns;
    }
 
    protected function filename(): string
    {
        return 'Userinfos_'.date('YmdHis');
    }
}