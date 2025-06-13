<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rule;


class MascotasController extends Controller
{
    protected $validateMessages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.unique' => 'El nombre ya está registrado.',
        'email.required' => 'El email es obligatorio.',
        'email.email' => 'Debe ser un email válido.',
        'email.unique' => 'El email ya está registrado.',
        'fecha_n.required' => 'La fecha de nacimiento es obligatoria.',
        'fecha_n.date' => 'Debe ser una fecha válida.',
    ];

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'edad' => 'required',
            'persona_id' => 'required|exists:personas,id',
        ], [
            'nombre.required' => 'El nombre de la mascota es obligatorio.',
            'persona_id.required' => 'Debe seleccionar una persona.',
            'persona_id.exists' => 'La persona seleccionada no existe.',
        ]);

        if ($validator->fails()) {
            Toastr::error('Hay errores en el formulario.');
            return back()->withErrors($validator)->withInput();
        }

        MascotaS::create([
            'nombre' => $request->input('nombre'),
            'especie' => $request->input('especie'),
            'raza' => $request->input('raza'),
            'edad' => $request->input('edad'),
            'persona_id' => $request->input('persona_id'),
        ]);

        Toastr::success('Mascota guardada correctamente.');
        return back();
    }
    public function edit(Request $request)
    {
        $id = $request->id;

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'especie' => 'nullable|string|max:100',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|integer|min:0',
            'persona_id' => 'required|exists:personas,id',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'persona_id.required' => 'Debe seleccionar una persona.',
            'persona_id.exists' => 'La persona seleccionada no existe.',
        ]);

        if ($validator->fails()) {
            Toastr::error('Hay errores en el formulario.');
            return back()->withErrors($validator)->withInput();
        }

        $mascota = Mascotas::findOrFail($id);

        $mascota->update([
            'nombre' => $request->input('nombre'),
            'especie' => $request->input('especie'),
            'raza' => $request->input('raza'),
            'edad' => $request->input('edad'),
            'persona_id' => $request->input('persona_id'),
        ]);

        Toastr::success('Mascota actualizada correctamente.');
        return back();
    }
    public function delete($id){
        $formProvince = Mascotas::findOrFail($id);
        $formProvince->delete();
        Toastr::success('Mascota eliminada.');
        return back();
    }
}
