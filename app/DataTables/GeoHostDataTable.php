<?php

namespace App\DataTables;

use App\Models\GeoHost;
use Form;
use Yajra\Datatables\Services\DataTable;
use DB;
use Illuminate\Support\Facades\Auth;

class GeoHostDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'geoHosts.datatables_actions')
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
            $user_id = Auth::user()->id;
            $geoHosts = GeoHost::query()->join('users', 'users.geohost_id', '=', 'geo_hosts.geohost_id')->where("users.id", $user_id);
        }
        else {
            $geoHosts = GeoHost::query();
        }

        return $this->applyScopes($geoHosts);
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
//                    'create',
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
            'firstname' => ['name' => 'firstname', 'data' => 'firstname'],
            'lastname' => ['name' => 'lastname', 'data' => 'lastname'],
            'payment_type' => ['name' => 'payment_type', 'data' => 'payment_type'],
            'country' => ['name' => 'country', 'data' => 'country']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'geoHosts';
    }
}
