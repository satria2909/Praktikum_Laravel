<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nim'), 'has-success': fields.nim && fields.nim.valid }">
    <label for="nim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.nim') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nim" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nim'), 'form-control-success': fields.nim && fields.nim.valid}" id="nim" name="nim" placeholder="{{ trans('admin.mahasiswa.columns.nim') }}">
        <div v-if="errors.has('nim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nim') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nama'), 'has-success': fields.nama && fields.nama.valid }">
    <label for="nama" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.nama') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nama" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nama'), 'form-control-success': fields.nama && fields.nama.valid}" id="nama" name="nama" placeholder="{{ trans('admin.mahasiswa.columns.nama') }}">
        <div v-if="errors.has('nama')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nama') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gambar'), 'has-success': fields.gambar && fields.gambar.valid }">
    <label for="gambar" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.gambar') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gambar" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gambar'), 'form-control-success': fields.gambar && fields.gambar.valid}" id="gambar" name="gambar" placeholder="{{ trans('admin.mahasiswa.columns.gambar') }}">
        <div v-if="errors.has('gambar')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gambar') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('umur'), 'has-success': fields.umur && fields.umur.valid }">
    <label for="umur" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.umur') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.umur" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('umur'), 'form-control-success': fields.umur && fields.umur.valid}" id="umur" name="umur" placeholder="{{ trans('admin.mahasiswa.columns.umur') }}">
        <div v-if="errors.has('umur')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('umur') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('alamat'), 'has-success': fields.alamat && fields.alamat.valid }">
    <label for="alamat" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.alamat') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.alamat" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('alamat'), 'form-control-success': fields.alamat && fields.alamat.valid}" id="alamat" name="alamat" placeholder="{{ trans('admin.mahasiswa.columns.alamat') }}">
        <div v-if="errors.has('alamat')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('alamat') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.mahasiswa.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.mahasiswa.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>


