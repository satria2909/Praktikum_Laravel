<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Mahasiswa\BulkDestroyMahasiswa;
use App\Http\Requests\Admin\Mahasiswa\DestroyMahasiswa;
use App\Http\Requests\Admin\Mahasiswa\IndexMahasiswa;
use App\Http\Requests\Admin\Mahasiswa\StoreMahasiswa;
use App\Http\Requests\Admin\Mahasiswa\UpdateMahasiswa;
use App\Models\Mahasiswa;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MahasiswaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMahasiswa $request
     * @return array|Factory|View
     */
    public function index(IndexMahasiswa $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Mahasiswa::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['nim', 'nama', 'gambar', 'umur', 'alamat', 'email'],

            // set columns to searchIn
            ['nim', 'nama', 'gambar', 'alamat', 'email']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.mahasiswa.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.mahasiswa.create');

        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMahasiswa $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMahasiswa $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Mahasiswa
        $mahasiswa = Mahasiswa::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/mahasiswas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/mahasiswas');
    }

    /**
     * Display the specified resource.
     *
     * @param Mahasiswa $mahasiswa
     * @throws AuthorizationException
     * @return void
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $this->authorize('admin.mahasiswa.show', $mahasiswa);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Mahasiswa $mahasiswa
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $this->authorize('admin.mahasiswa.edit', $mahasiswa);


        return view('admin.mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMahasiswa $request
     * @param Mahasiswa $mahasiswa
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMahasiswa $request, Mahasiswa $mahasiswa)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Mahasiswa
        $mahasiswa->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/mahasiswas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/mahasiswas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMahasiswa $request
     * @param Mahasiswa $mahasiswa
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMahasiswa $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMahasiswa $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMahasiswa $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Mahasiswa::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
