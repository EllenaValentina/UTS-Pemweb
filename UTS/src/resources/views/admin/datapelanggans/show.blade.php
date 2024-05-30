@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.datapelanggan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datapelanggans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.datapelanggan.fields.id') }}
                        </th>
                        <td>
                            {{ $datapelanggan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datapelanggan.fields.nama') }}
                        </th>
                        <td>
                            {!! $datapelanggan->nama !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datapelanggan.fields.email') }}
                        </th>
                        <td>
                            {!! $datapelanggan->email !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datapelanggan.fields.no_telp') }}
                        </th>
                        <td>
                            {!! $datapelanggan->no_telp !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datapelanggans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection