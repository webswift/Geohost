<?php

namespace App\DataTables;

use App\Models\Statement;
use Form;
use Yajra\Datatables\Services\DataTable;
use Auth;

class StatementDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('full_name', function ($row) {
                return $row->firstname . ' ' . $row->lastname; })
            ->addColumn('action', 'statements.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        // If not admin, limit by geohost_id
        if(!Auth::user()->admin) {
            $geohost_id = Auth::user()->geohost_id;
            $statements = Statement::query()->where('geohost_id', $geohost_id)
                            ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'statements.geohost_id')
                            ->select([
                                'statements.*',
                                'geo_hosts.firstname',
                                'geo_hosts.lastname'
                            ]);
        }
        else {
            $statements = Statement::query()
                            ->leftJoin('geo_hosts', 'geo_hosts.id', '=', 'statements.geohost_id')
                            ->select([
                                'statements.*',
                                'geo_hosts.firstname',
                                'geo_hosts.lastname'
                            ]);
        }

        if (!Statement::isShowAll())
            $statements = $statements->where('payment_id', 0);

        return $this->applyScopes($statements);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'create',
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ]
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'short_description',
            'amount',
            'currency',
            'full_name'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'statements';
    }
}
