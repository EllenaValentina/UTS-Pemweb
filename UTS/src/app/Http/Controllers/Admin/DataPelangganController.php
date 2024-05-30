<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDataPelangganRequest;
use App\Http\Requests\StoreDataPelangganRequest;
use App\Http\Requests\UpdateDataPelangganRequest;
use App\Models\DataPelanggan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DataPelangganController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('datapelanggan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datapelanggan = DataPelanggan::all();

        return view('admin.datapelanggans.index', compact('datapelanggan'));
    }

    public function create()
    {
        abort_if(Gate::denies('datapelanggan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datapelanggans.create');
    }

    public function store(StoreDataPelangganRequest $request)
    {
        $datapelanggan = DataPelanggan::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $datapelanggan->id]);
        }

        return redirect()->route('admin.datapelanggans.index');
    }

    public function edit(DataPelanggan $datapelanggan)
    {
        abort_if(Gate::denies('datapelanggan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datapelanggans.edit', compact('datapelanggan'));
    }

    public function update(UpdateDataPelangganRequest $request, DataPelanggan $datapelanggan)
    {
        $datapelanggan->update($request->all());

        return redirect()->route('admin.datapelanggans.index');
    }

    public function show(DataPelanggan $datapelanggan)
    {
        abort_if(Gate::denies('datapelanggan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datapelanggans.show', compact('datapelanggan'));
    }

    public function destroy(DataPelanggan $datapelanggan)
    {
        abort_if(Gate::denies('datapelanggan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datapelanggan->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataPelangganRequest $request)
    {
        $datapelanggans = DataPelanggan::find(request('ids'));

        foreach ($datapelanggans as $datapelanggan) {
            $datapelanggan->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('datapelanggan_create') && Gate::denies('datapelanggan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DataPelanggan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
