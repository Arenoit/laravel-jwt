@extends('users.app')
@section('content')
    <section class="m-0 py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="section-header">
                <h2 class="title mb-2"><span class="text--base">Persona</span></h2>
            </div>
            <!-- End Page Header -->
<?php
    $id = request()->id;
    $mascota = \App\Models\Mascotas::find($id); // o usar where si necesitas más control
?>

    <form class="js-validate" action="{{ route('edit-1mascota') }}" method="post" enctype="multipart/form-data"
        id="form-id">
        @csrf
        @method('PUT')
        <div class="card __card mb-3">
            <div class="card-header">
                <h5 class="card-title">
                    <svg width="20" x="0" y="0" viewBox="0 0 460.8 460.8" xml:space="preserve" class="store-svg-logo">
                        <g>
                            <g>
                                <g>
                                    <g>
                                        <path d="M230.432,239.282c65.829,0,119.641-53.812,119.641-119.641C350.073,53.812,296.261,0,230.432,0
                                        S110.792,53.812,110.792,119.641S164.604,239.282,230.432,239.282z"
                                            fill="#020202" data-original="#000000" class=""></path>
                                        <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784
                                        c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555
                                        c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943
                                        c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167
                                        c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02
                                        c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898
                                        C436.8,341.682,437.322,338.024,435.755,334.89z" fill="#020202"
                                            data-original="#000000" class=""></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg> Editar Persona
                </h5>
            </div>
            <div class="card-body p-4">
                <input type="hidden" name="id" value="{{ $mascota->id }}">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <div class="form-group">
                                <label class="input-label" for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control __form-control"
                                    placeholder="Nombre de la Mascota" value="{{ $mascota->nombre }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <div class="form-group">
                                <label class="input-label" for="especie">Especie</label>
                                <input type="text" id="especie" name="especie" class="form-control __form-control"
                                    placeholder="Nombre de la Especie" value="{{ $mascota->especie }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <div class="form-group">
                                <label class="input-label" for="raza">Raza</label>
                                <input type="text" id="raza" name="raza" class="form-control __form-control"
                                    placeholder="Nombre de la Raza" value="{{ $mascota->raza }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <div class="form-group">
                                <label class="input-label" for="nombre">Edad</label>
                                <input type="text" id="edad" name="edad" class="form-control __form-control"
                                    placeholder="Edad de la Mascota" value="{{ $mascota->edad }}" required>
                            </div>
                        </div>
                    </div>
                    <?php
                        $personas=\App\Models\Personas::get();
                    ?>
                        <div class="form-group mb-4">
                            <label class="input-label" for="persona_id">Persona</label>
                            <select name="persona_id" id="persona_id" required
                                class="form-control __form-control js-select2-custom js-example-basic-single"
                                data-placeholder="Selecciona zona">
                                <option value="" selected disabled>Selecciona la Persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}" {{ $mascota->persona_id == $persona->id ? 'selected' : '' }}>
                                        {{ $persona->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end pt-3">
            <a href="{{ route('mascotas') }}" class="cmn--btn rounded-md border-0 text-white px-3 py-2" style="background-color: #6c757d;">Regresar</a>
            <button type="submit" class="cmn--btn rounded-md border-0 outline-0" style="background:var(--base-2)">Editar</button>
        </div>
    </form>
        </div>
        {!! Toastr::message() !!}
    </section>

    @endsection
    

